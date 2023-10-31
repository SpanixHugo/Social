<?php

session_start();

require_once("../config/db.php");
require_once("../utils/functions.php");
require_once("../utils/errors.php");
require_once("../store/user.php");

// CREATING POST
if (isset($_POST['post'])) {
  try {
    $content = sanitizeInput($_POST['content']);
    $medias = $_FILES['medias'];

    // UPLOAD THE MEDIA
    $uploads = [];
    for ($count = 0; $count < count($medias['name']); $count++) {

      // Check error
      if ($medias['error'][$count]) throw new AppException("Error uploading file");
      // Check filesize

      $MAX_SIZE = 10 * 1024 * 1024; // 10mb
      if ($medias['size'][$count] > $MAX_SIZE) throw new AppException("File too large");

      // File
      $name = $medias['name'][$count];

      // Rename file
      $timestamp = time();
      $name = $timestamp . $name;

      // Upload the file
      $destination = "../post_uploads/";
      $temp_location = $medias['tmp_name'][$count];

      if (move_uploaded_file($temp_location, $destination . $name)) {
        $upload_item = [
          "file" => $name,
          "type" => explode("/", $medias['type'][$count])[0]
        ];

        array_push($uploads, $upload_item);
      }
    }

    $post_id = uniqid("pst_");
    $user_id = $_SESSION['SOCIAL_LOGGED_USER'];

    $uploads = json_encode($uploads);

    // INSERT TO DB
    $result = makeQuery("INSERT INTO post (post_id, user_id, media, content) VALUES ('$post_id', '$user_id', '$uploads', '$content')");

    // CHECK RESULT
    if (!$result) throw new AppException("Error inserting post");

    // SHOW ALERT AND REDIRECT
    setAlert("Post uploaded");
    redirect("../newsfeed");
  } catch (AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../newsfeed");
  }
}

if (isset($_POST['like'])) {
  try {
    $id = $_POST['like'];
    $userId = $_SESSION['SOCIAL_LOGGED_USER'];
    $likeId = uniqid("lyk_");
    $notify = sanitizeInput($_POST['notify']);

    $result = makeQuery("INSERT INTO likes(like_id, user_id, post_id) VALUES ('$likeId', '$userId', '$id')");

    if (!$result) throw new AppException("Failed to like post");
    
    $not_id = uniqid("Not_");
    $not_message = "Liked your post";
    if($userId != $notify){
      $result = makeQuery("INSERT INTO notification(not_id, post_id, notifier, not_type, not_message, notified) VALUES ('$not_id', '$id', '$userId', 'Post like', '$not_message', '$notify')");
    }

    setAlert("Post liked!");
    redirect("../newsfeed");
  } catch (AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../newsfeed");
  }
}

// Send a Notification
// if(isset($_POST['like'])){
//   try {
    
//     $not_id = uniqid("Not_");
//     $notify = $_POST['notify'];
//     $not_message = $user['firstname'] . " " . $user['lastname'] . " Liked your post";
//     if($userId != $notify){
//       $result = makeQuery("INSERT INTO notification(not_id, notifier, not_type, not_message, notified) VALUES ('$not_id', '$userId', 'Post like', '$not_message', '$notify')");
//     }
//   } catch (AppException $e) {
//     setAlert($e->message, $e->type);
//     redirect("../newsfeed");
//   }
// }

// UNLIKE
if (isset($_POST['unlike'])) {
  try {
    $id = $_POST['unlike'];
    $userId = $_SESSION['SOCIAL_LOGGED_USER'];

    $result = makeQuery("DELETE FROM likes WHERE user_id = '$userId' AND post_id = '$id'");

    if (!$result) throw new AppException("Failed to unlike post");

    setAlert("Post unliked!");
    redirect("../newsfeed");
  } catch (AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../newsfeed");
  }
}


// COMMENT
if(isset($_POST['comment'])) {
  try {
    $message = sanitizeInput($_POST['message']);
    $post_id = $_POST['comment'];
    $comment_id = uniqid("cmt_");
    $user_id = $_SESSION['SOCIAL_LOGGED_USER'];
    $notify = sanitizeInput($_POST['notify']);

    $result = makeQuery("INSERT INTO comments(comment_id, post_id, user_id, message) VALUES ('$comment_id', '$post_id', '$user_id', '$message')");

    if(!$result) throw new AppException("Failed to post comment!");

    $not_id = uniqid("Not_");
    $not_message = "Commented on your post";
    if($user_id != $notify){
      $result = makeQuery("INSERT INTO notification(not_id, notifier, not_type, not_message, notified) VALUES ('$not_id', '$user_id', 'Comment like', '$not_message', '$notify')");
    }

    setAlert("Comment posted!");
    redirect("../newsfeed");
  } catch (AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../newsfeed");
  }
}
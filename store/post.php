<?php  

function getAllPosts () {
  global $connect;
  $query = "SELECT * FROM post INNER JOIN users ON post.user_id = users.user_id ORDER BY date DESC";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getAllMyPosts ($id) {
  global $connect;
  $query = "SELECT * FROM post Where user_id='$id' ORDER BY date DESC";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getPostLikes ($postId) {
  global $connect;
  $query = "SELECT * FROM likes INNER JOIN users ON likes.user_id = users.user_id WHERE post_id = '$postId'";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getUserPostLike ($postId, $userId) {
  global $connect;
  $query = "SELECT * FROM likes WHERE post_id = '$postId' AND user_id = '$userId'";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_assoc($result);
}

function getPostComments($postId) {
  global $connect;
  $query = "SELECT * FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE post_id = '$postId'";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
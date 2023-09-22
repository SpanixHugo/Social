<?php 
session_start();

require_once("../config/db.php");
require_once("../utils/functions.php");
require_once("../utils/errors.php");
require_once("../store/user.php");


// SENDING FRIEND REQUEST
if(isset($_POST['add-friend'])) {
  try {
    $personId = $_POST['add-friend'];
    $userId = $_SESSION['SOCIAL_LOGGED_USER'];

    // CHECK IF REQUEST IS ALREDY SENT
    $checkQuery = makeQuery("SELECT * FROM friend_request WHERE sender = '$userId' AND user_id = '$personId'");
    if(mysqli_num_rows($checkQuery)) throw new AppException("Friend request already sent");
  
    $result = makeQuery("INSERT INTO friend_request (sender, user_id) VALUES ('$userId', '$personId')");

    if(!$result) throw new AppException("Failed to send friend request");
    setAlert("Friend request sent");
    redirect("../friend-request");
  }
  catch(AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../friend-request");
  }
}

// ACCEPTING FRIEND REQUEST
if(isset($_POST['confirm'])) {
  try {
    $requestId = $_POST['req_id'];
    $personId = $_POST['confirm'];
    $userId = $_SESSION['SOCIAL_LOGGED_USER'];

    // CHECK IF USER IS ALREADY IN FRIEND LIST
    $resultCheck = makeQuery("SELECT * FROM friends WHERE user_id = '$userId' AND person_id = '$personId'");
    if(mysqli_num_rows($resultCheck)) throw new AppException("Friend already exists!");

    // ADD THE PERSON TO USER'S {LOGGED_IN} FRIEND LIST [TABLE]
    $result = makeQuery("INSERT INTO friends (user_id, person_id) VALUES ('$userId', '$personId')");
    if(!$result) throw new AppException("Error adding friend");

    // ADD THE USER TO THE PERSON'S FRIEND LIST
    $result = makeQuery("INSERT INTO friends (user_id, person_id) VALUES ( '$personId', '$userId')");
    if(!$result) throw new AppException("Error adding friend");

    // DELETE THE FRIEND REQUEST
    $result = makeQuery("DELETE FROM friend_request WHERE request_id = '$requestId'");
    if(!$result) throw new AppException("Error deleting friend request");

    setAlert("Friend request accepted!");
    redirect("../friend-request");
  }
  catch(AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../friend-request");
  }

}

// DELETING FRIEND REQUEST
if(isset($_POST['delete'])) {
  try {
    $id = $_POST['delete'];

    $result = makeQuery("DELETE FROM friend_request WHERE request_id = '$id'");
    if(!$result) throw new AppException("Failed to delete friend request");

    setAlert("Friend request deleted");
    redirect("../friend-request");
  } catch(AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../friend-request");
  }
}


<?php 
session_start();

require_once("../config/db.php");
require_once("../utils/functions.php");
require_once("../utils/errors.php");


// DELETE
if(isset($_POST['delete'])) {
  try {
    $id = $_POST['delete'];

    $result = makeQuery("DELETE FROM comments WHERE comment_id = '$id'");
    if(!$result) throw new AppException("Error deleting comment");

    setAlert("Comment Deleted!");
    redirect("../newsfeed");
  }
  catch(AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../newsfeed");
  }
}

// UPDATE
if(isset($_POST['update'])) {
  try {
    $id = $_POST['update'];
    $message = sanitizeInput($_POST['message']);

    $result = makeQuery("UPDATE comments SET message = '$message' WHERE comment_id = '$id'");
    if(!$result) throw new AppException("Failed to update comment");

    setAlert("Comment updated");
    redirect("../newsfeed");
  } catch (AppException $e) {

    setAlert($e->message, $e->type);
    redirect("../newsfeed");
  }
}
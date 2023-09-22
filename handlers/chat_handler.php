<?php 

session_start();

require_once("../config/db.php");
require_once("../utils/functions.php");
require_once("../utils/errors.php");
require_once("../store/user.php");


if(isset($_POST['send'])) {
  try {
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $message = sanitizeInput($_POST['message']);
    $chatId = uniqid("chat_");

    if(!$message) throw new AppException("Please enter a message");

    $result = makeQuery("INSERT INTO `chat`(`chat_id`, `sender_id`, `receiver_id`, `message`) VALUES ('$chatId','$sender','$receiver','$message')");

    if(!$result) throw new AppException("Failed to send message");

    setAlert("Message sent");
    redirect("../chat?user=$receiver");
  }
  catch (AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../chat?user=$receiver");
  }
}
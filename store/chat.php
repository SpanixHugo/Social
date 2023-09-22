<?php 


function getConversation ($reciever, $sender) {
  global $connect;

  $query = "SELECT * FROM chat WHERE receiver_id IN ('$reciever', '$sender') AND sender_id IN ('$reciever', '$sender') ORDER BY date ASC";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getLastConversation ($reciever, $sender) {
  global $connect;

  $query = "SELECT * FROM chat WHERE receiver_id IN ('$reciever', '$sender') AND sender_id IN ('$reciever', '$sender') ORDER BY date DESC LIMIT 1";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_assoc($result);
}

function getUserUnreadMessageCount ($reciever, $sender) {
  global $connect;

  $query = "SELECT * FROM chat WHERE receiver_id = '$reciever' AND sender_id = '$sender' AND is_read = 0";
  $result = mysqli_query($connect, $query);
  return mysqli_num_rows($result);
}

function getSenders($reciever) {
  global $connect;
  $query = "SELECT * FROM chat WHERE receiver_id = '$reciever'";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
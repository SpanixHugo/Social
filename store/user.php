<?php 

function getUserByEmail ($email) {
  global $connect;

  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($connect, $query);

  return mysqli_fetch_assoc($result);
}

function getUserById ($id) {
  global $connect;

  $query = "SELECT * FROM users WHERE user_id = '$id'";
  $result = mysqli_query($connect, $query);

  return mysqli_fetch_assoc($result);
}

function getUsersFriends ($userId) {
  global $connect;

  $query = "SELECT * FROM friends WHERE user_id = '$userId'";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
<?php

function sanitizeInput($input)
{
  global $connect;
  return mysqli_real_escape_string($connect, htmlspecialchars(trim($input)));
}

function setAlert($message, $type = "success")
{
  $_SESSION['SOCIAL_ALERT'] = json_encode([
    "message" => $message,
    "type" => $type
  ]);
}

function makeQuery($sql)
{
  global $connect;
  return mysqli_query($connect, $sql);
}

function redirect($url, $refresh = NULL)
{
  if ($refresh) return header("Refresh = $refresh, url= $url");
  return header("Location: $url");
}

function uploadFile($medias, $destination, $MAX_SIZE_LIMIT = 2)
{
  // Check error
  if ($medias['error']) throw new AppException("Error uploading file");
  // Check filesize

  $MAX_SIZE = $MAX_SIZE_LIMIT * 1024 * 1024; // 10mb
  if ($medias['size'] > $MAX_SIZE) throw new AppException("File too large");

  // File
  $name = $medias['name'];

  // Rename file
  $timestamp = time();
  $name = $timestamp . $name;

  // Upload the file
  $temp_location = $medias['tmp_name'];
  // print_r($temp_location);
  
  if (move_uploaded_file($temp_location, $destination . $name)) return $name;
  return false;
}
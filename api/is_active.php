<?php 

require_once("../config/db.php");
require_once("../utils/functions.php");
require_once("../utils/errors.php");

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if($_SERVER["REQUEST_METHOD"] === "POST") {
  try {
    $userID = $_REQUEST['userID'];
    $status = $_REQUEST['status'];

    $result = makeQuery("UPDATE users SET is_active = $status WHERE user_id = '$userID'");
    if(!$result) throw new AppException("Failed to update status");

    echo json_encode([
      "error" => null,
      "success" => true,
      "data" => "Status updated"
    ]);
  }
  catch(AppException $e) {
    echo json_encode([
      "error" => $e->message,
      "success" => false,
      "data" => null
    ]);
  } 
}
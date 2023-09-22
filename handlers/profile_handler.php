<?php 
session_start();

require_once("../config/db.php");
require_once("../utils/functions.php");
require_once("../utils/errors.php");

if(isset($_POST["profile-info"])) {
  try {
    $firstname = sanitizeInput($_POST['firstname']);
    $lastname = sanitizeInput($_POST['lastname']);
    $username = sanitizeInput($_POST['username']);
    $city = sanitizeInput($_POST['city']);
    $gender = sanitizeInput($_POST['gender']);
    $dob = sanitizeInput($_POST['dob']);
    $state = sanitizeInput($_POST['state']);
    $address = sanitizeInput($_POST['address']);
    $country = sanitizeInput($_POST['country']);
    $maritalStatus = sanitizeInput($_POST['marital-status']);

    $user_id = $_SESSION['SOCIAL_LOGGED_USER'];

    // Check if there's any uploaded image
    $profile = $_POST['prev-pic'];
    if($_FILES['profile']["name"]) {
      $uploadResult = uploadFile($_FILES['profile'], "../profile_pic/");
      if($uploadResult) $profile = $uploadResult;
    }

    $result = makeQuery("UPDATE `users` SET `firstname`='$firstname', `lastname`='$lastname', `username`='$username', `profile_pic`='$profile', `state`='$state',`city`='$city',`country`='$country',`dob`='$dob',`gender`='$gender',`marital_status`='$maritalStatus',`address`= '$address' WHERE user_id = '$user_id'");

    if(!$result) throw new AppException("Failed to update user!");

    setAlert("User updated!");
    redirect("../profile-edit");
  }
  catch(AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../profile-edit");
  }
}
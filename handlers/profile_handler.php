<?php 
session_start();

require_once("../config/db.php");
require_once("../utils/functions.php");
require_once("../utils/errors.php");
require_once("../store/user.php");

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

    $check_username = getUserByUsername($username);
    if($check_username) throw new AppException("Username Already Exists", "warning");
    

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

// Change Password
if(isset($_POST['change_password'])){
  try {
    $id = sanitizeInput($_POST['user_id']);
    $old_password = sanitizeInput($_POST['old_password']);
    $new_password = sanitizeInput($_POST['new_password']);
    $confirm_new_password = sanitizeInput($_POST['confirm_new_password']);

    $user_id = getUserById($id);
    // print_r($user_id);
    // die();
    if(!$user_id || empty($id)) throw new AppException("No user found", "error");

    if(!password_verify($old_password, $user_id['password'])) throw new AppException("Old Password Does Not match in Database", "warning");
    // if($old_password != $user_id['password']) throw new AppException("Old Password Does Not match in Database", "warning");

    if(password_verify($new_password, $user_id['password'])) throw new AppException("New Password Cannot be Old password", "warning");
    
    if($new_password != $confirm_new_password) throw new AppException("New password and Verify Password do not match!!", "warning");
    
    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    $query = makeQuery("UPDATE users SET `password`='$password_hash' where `user_id`='$id'");

    if(!$query) throw new AppException("Failed to Update password!", "error");

    setAlert("Password Updated Successfuly");
    redirect("../profile-edit");    

  } catch (AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../profile-edit");
  }
}

if(isset($_POST['c-submit'])){
  try {
    $id = sanitizeInput($_POST['c-id']);
    $number = sanitizeInput($_POST['c-num']);
    $email = sanitizeInput($_POST['c-email']);

    $user_id = getUserById($id); 
    if(!$user_id || empty($id)) throw new AppException("No ID found", "error");

    $query = makeQuery("UPDATE users SET `phone`='$number', `email`='$email' WHERE user_id='$id'");

    if(!$query) throw new AppException("Failed to Update Contact Information!", "error");

    setAlert("Updated Successfully");
    redirect("../profile-edit");   

  } catch (AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../profile-edit");
  }
}
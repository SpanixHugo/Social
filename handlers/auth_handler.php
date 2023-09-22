<?php

session_start();

require_once("../config/db.php");
require_once("../utils/functions.php");
require_once("../utils/errors.php");
require_once("../store/user.php");


// REGISTRATION
if (isset($_POST["register"])) {
  try {
    // Sanitize the input
    $firstname = sanitizeInput($_POST['firstname']);
    $lastname = sanitizeInput($_POST['lastname']);
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);

    // Check if email already
    $nums = getUserByEmail($email);

    if($nums) throw new AppException("Email already exists", "warning");
                                                
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $user_id = uniqid("usr_");

    // Insert the user
    $result = makeQuery("INSERT INTO users(user_id, firstname, lastname, email, password) VALUES ('$user_id', '$firstname', '$lastname', '$email', '$hashed_password')");

    // Set alert
    if (!$result) throw new AppException("Registration failed");

    setAlert("Registration successful");
    redirect("../");

  } catch (AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../sign-up");
  }
}

// LOGIN
if(isset($_POST['login'])) {
  try {
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    
    // Check if the user 
    $user = getUserByEmail($email);
    if(!$user) throw new AppException("User does not exist!");

    // Verify if the passwords match
    if(!password_verify($password, $user['password'])) throw new AppException("Incorrect Credientials");

    // Session for the logged user 
    $_SESSION['SOCIAL_LOGGED_USER'] = $user['user_id'];

    // Set success alert
    setAlert("Log in success");

    // Redirect
    redirect("../newsfeed");
  }
  catch(AppException $e) {
    setAlert($e->message, $e->type);
    redirect("../");
  }
}


// LOGOUT
if(isset($_POST['logout'])) {
  session_destroy();
  redirect("../");
}
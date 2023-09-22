<?php
session_start();

require_once("./config/db.php");
require_once("./utils/functions.php");
require_once("./store/user.php");
require_once("./store/post.php");
require_once("./store/chat.php");

if (!isset($_SESSION['SOCIAL_LOGGED_USER'])) redirect("./");

define("EMPTY_CHAT_TEXT", "Messages are end-to-end encrypted");

$USER = getUserById($_SESSION['SOCIAL_LOGGED_USER']);
$POSTS = getAllPosts();

// print_r($POSTS);


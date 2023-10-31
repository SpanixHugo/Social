<?php
session_start();

require_once("./config/db.php");
require_once("./utils/functions.php");
require_once("./store/user.php");
require_once("./store/post.php");
require_once("./store/chat.php");
require_once("./store/friends.php");
require_once("./store/notifications.php");
require_once("./store/request.php");


if (!isset($_SESSION['SOCIAL_LOGGED_USER'])) redirect("./");

define("EMPTY_CHAT_TEXT", "Messages are end-to-end encrypted");

$FRIENS_REQUESTS = getRequestById($_SESSION['SOCIAL_LOGGED_USER']);
$USER = getUserById($_SESSION['SOCIAL_LOGGED_USER']);
$POSTS = getAllPosts();
$My_POSTS = getAllMyPosts($_SESSION['SOCIAL_LOGGED_USER']);
$ALL_FRIENDS = getAllFriends($_SESSION['SOCIAL_LOGGED_USER']);
$NOTIFICATIONS = getNotifications($_SESSION['SOCIAL_LOGGED_USER']);
// print_r($POSTS);


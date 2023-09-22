<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "social";


$connect = mysqli_connect($host, $user, $password, $db_name);

if(!$connect) die("Error" . mysqli_connect_error());
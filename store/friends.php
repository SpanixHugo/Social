<?php

function getAllFriends($userId){
    global $connect;

    $friends = "SELECT * FROM friends WHERE `user_id`='$userId'";
    $result = mysqli_query($connect, $friends);
    return mysqli_fetch_all($result);

}
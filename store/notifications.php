<?php

// function getNotifications($id){
//     global $connect;

//     $query = "SELECT * FROM `notification` WHERE notified='$id'";
//     $result = mysqli_query($connect, $query);
//     return mysqli_fetch_all($result, MYSQLI_ASSOC);
// }
function getNotifications($id){
    global $connect;

    $query = "SELECT * FROM `notification` INNER JOIN `users` ON users.user_id=notification.notifier WHERE notified='$id' ORDER BY `time` DESC";
    $result = mysqli_query($connect, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
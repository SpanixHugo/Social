<?php 

function getRequestById ($userId) {
  global $connect;
  $query = "SELECT * FROM friend_request WHERE user_id = '$userId'";
  $result = mysqli_query($connect, $query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getPeopleYouMayKnow($userId) {
  global $connect;
  // GET ALL USERS
  $queryUsers = "SELECT * FROM users WHERE user_id != '$userId'";
  $filterUsers = mysqli_fetch_all(mysqli_query($connect, $queryUsers), MYSQLI_ASSOC);

  // FILTER OUT THE FRIENDS OF THE USER 
  $queryFriends = "SELECT * FROM friends WHERE user_id = '$userId'";
  $userFriends = mysqli_fetch_all(mysqli_query($connect, $queryFriends), MYSQLI_ASSOC);

  $returnValue = [];
  if(count($userFriends)) {
    foreach($filterUsers as $user) {
      $userFriendsId = array_column($userFriends, "person_id");
      if(!in_array($user["user_id"], $userFriendsId)) {
        array_push($returnValue, $user);
      }
    }
  }
  else {
    $returnValue = $filterUsers;
  }

  // FILTER OUT FROM FRIEND REQUEST
  $queryFriendRequest = "SELECT * FROM friend_request WHERE sender = '$userId'";
  $userFriendRequests = mysqli_fetch_all(mysqli_query($connect, $queryFriendRequest), MYSQLI_ASSOC);

  if(count($userFriendRequests)) {
    foreach($returnValue as $index => $user) {
      $userFriendRequestsId = array_column($userFriendRequests, "user_id");
      if(in_array($user['user_id'], $userFriendRequestsId)) {
        unset($returnValue[$index]);
      }
    }
  }

  return $returnValue;
}
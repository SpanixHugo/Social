<?php 

$users = [
  [
    "id" => 1,
    "name" => "John",
  ],
  [
    "id" => 2,
    "name" => "Smith",
  ],
];

$result = array_column($users, "id"); 

print_r($result);
<?php
session_start();

require_once("../config/db.php");
require_once("../utils/functions.php");
require_once("../utils/errors.php");
require_once("../store/user.php");

if(isset($_POST['dlt_not'])){
    try {

        $not_id = sanitizeInput($_POST['not_id']);

        $query = makeQuery("DELETE FROM `notification` WHERE `not_id`='$not_id' ");
        if(!$query) throw new AppException("Failed to delete Notification", "error") ;

        setAlert("Post liked!");
        redirect("../notification");
    } catch (AppException $e) {
        setAlert($e->message, $e->type);
        redirect("../notification");
    }
}
<?php
    session_start();
    include "connection.php";
    if ($_SESSION["user_id"] !=0 ){
        header("Location: login.php");
    }
    $user_to_remove_id = $_GET["id"];
    $user = $db->users[$user_to_remove_id];

    //Delete memberships 
    foreach ($db->members("user_id=?",$user_to_remove_id) as $member) { // get all applications
        $row = $db->members[$user_to_remove_id];
        $affected = $row->delete();
    }

    //Delete user
    $row = $db->users[$user_to_remove_id];
    $affected = $row->delete();
    
    header("Location: users-list.php");

?>


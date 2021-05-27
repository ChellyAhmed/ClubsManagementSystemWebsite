<?php
session_start();
$_SESSION['id_card']= $_POST["id_card"];


//Add to the database
include "connection.php";
$user = array(
    "id_card" => $_POST["id_card"],
    "name" => $_POST["name"],
    "password" => $_POST["password"],
    "email" => $_POST["email"],
);
$row = $db->users()->insert($user); 
$_SESSION["user_id"] = $row['id'];
header("Location: clubs-list.php");

?>

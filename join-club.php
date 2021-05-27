<?php
session_start();
include "connection.php";
$member = array(
    "club_id" => $_GET["club_id"],
    "user_id" => $_SESSION["user_id"],
);
$row = $db->members()->insert($member);
header("Location: my-clubs.php");
?>
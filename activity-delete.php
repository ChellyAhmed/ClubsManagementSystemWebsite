<?php
session_start();
include 'connection.php';
$id = $_GET["id"];
$row = $db->activities[$id];
$affected = $row->delete();
header("Location: activities.php?club_id={$_SESSION['club_id']}",);
?>
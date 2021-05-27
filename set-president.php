<?php
session_start();
include 'connection.php';

//Update in users table
//Delete old pres
$user = $db->users("president = ?", $_SESSION["club_id"])->fetch();
$array = array(
    "president" => null ,
);
$affected = $user->update($array);
//Set old pres
$user = $db->users("id = ?", $_GET["id"] )->fetch();
$array = array(
    "president" => $_SESSION['club_id'],
);
$affected = $user->update($array);

//Update in clubs table
$club = $db->clubs[$_SESSION["club_id"]]; 
$array = array(
    "pres_id" => $_GET["id"] ,
);
$affected = $club->update($array);
header("Location: members.php?club_id={$_SESSION['club_id']}");


?>

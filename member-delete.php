<?php
    session_start();
    include 'connection.php';
    $id = $_GET["id"];
    $row = $db->members[$id];
    $affected = $row->delete();
    header("Location: my-clubs.php?club_id={$_SESSION['club_id']}",);
?>
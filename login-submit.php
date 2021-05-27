<?php
session_start();
$_SESSION['id_card']= $_POST["id_card"];
$_SESSION['password']= $_POST["password"];
include "connection.php";
$user = $db->users(" (id_card = ?) AND (password = ?) ",$_SESSION['id_card'], $_SESSION['password'], )->fetch(); //Search for the user with this username and this password



if ($user) {
    $_SESSION["user_id"] = $user['id'];
    echo "Jawwna behi. Id is: ", $_SESSION["user_id"]  ;
    header("Location: clubs-list.php");
}
else{
    echo "Check your password please... Or your ID Card number perhaps." ;
    //header("Location: error.php");
}


?>

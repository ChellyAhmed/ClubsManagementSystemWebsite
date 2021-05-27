<?php 
include "connection.php";
$user = $db->users[$_SESSION["user_id"]]; 
if ($_SESSION["user_id"] == 0) {
    include "NavbarAdmin.php";
}
else if ($user['president'] != NULL) {
    include "NavbarPresident.php" ;
}
else {
    include "NavbarUser.php" ;
}




?>
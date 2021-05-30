<?php
session_start();
include 'connection.php';
//Select club
$user = $db->users[$_SESSION["user_id"]];
$club = $db->clubs[$user["president"]];

//Get user entries (except for the file)
$name = $_POST["name"];
$field = $_POST["name"];
$description = $_POST["description"];

//Group new information in an array
$array = array(
    'name' => $name,
    'description' => $description,); //This array will be the new database entry

//Directly modify DB if user didn't select any file.
if (empty($_FILES['img']['name'])) {
    $affected = $club->update($array);
    header("Location: clubs-list.php");
}

//Work on image now
$img = $_FILES['img'];
$tmp_extension = $img['name'];
$tmp_extension = explode('.', $tmp_extension);
$extension = strtolower(end($tmp_extension));
//$extension contains the extension in lower case.

//Check if extension allowed and rename it to activity name.jpg
$is_allowed = array('jpg'); //Possibility of adding other files.
if (!(in_array($extension, $is_allowed))) {
    $img['error'] = 1;
} else {
    //All good. Rename, and upload.
    $new_img_name = ( $club["id"] . ".jpg");
    move_uploaded_file($img['tmp_name'], ("logos/" . $new_img_name));

    //Now modify database
    $affected = $club->update($array);
    header("Location: clubs-list.php");
}

if ($img['error'] == 1) {
    ?> 
        <h1>Error</h1>
        <p>We apologize. An error might have occured while uploading the file. Please try again and make sure you uploaded a .jpg file.</p>
        <a href="clubs-list.php">Back to activities list</a>
    <?php    
    }

?>

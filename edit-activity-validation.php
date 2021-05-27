<?php
session_start();
include 'connection.php';
$id = $_GET["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$row = $db->activities[$id]; //Select row
$array = array(
    'id' => $id,
    'name' => $name,
    'description' => $description,);
//Directly modify DB if user didn't select any file.
if (empty($_FILES['img']['name'])) {
    $affected = $row->update($array);
    header("Location: activities.php?club_id={$_SESSION['club_id']}");
}

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
    $new_img_name = ( $id . ".jpg");
    move_uploaded_file($img['tmp_name'], ("uploads/" . $new_img_name));

    //Now modify database
    $affected = $row->update($array);
    header("Location: activities.php?club_id={$_SESSION['club_id']}");
}

if ($img['error'] == 1) {
?> 
    <h1>Error</h1>
    <p>We apologize. An error might have occured while uploading the file. Please try again and make sure you uploaded a .jpg file.</p>
    <a href="activities.php?club_id=<?php echo $_SESSION["club_id"] ;?>">Back to activities list</a>
<?php    
}

?>
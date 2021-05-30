<?php
session_start();
include "connection.php";
//$_SESSION["user_id"]  contains user id
//$_SESSION["club_id"] contains club ID


$name = $_POST["name"];
$field = $_POST["field"];
$description = $_POST["description"];

$img = $_FILES['img'];
$tmp_extension = $img['name'];
$tmp_extension = explode('.', $tmp_extension);
$extension = strtolower(end($tmp_extension));
//$extension contains the extension in lower case.

//Check if extension allowed and rename it to club id.jpg
$is_allowed = array('jpg'); //Possibility of adding other files.
if (!(in_array($extension, $is_allowed))) {
    $img['error'] = 1;
} else {
    //All good. Add to DB, rename, and upload.
    $array = array(
        "name" => $name,
        "field" => $field,
        "description" => $description,
        "pres_id" => $_SESSION["user_id"],
    );
    $row = $db->clubs()->insert($array);
    $club = $db->clubs("name = ? AND description = ?", $name, $description,)->fetch();
    $new_img_name = ($club["id"] . ".jpg");
    move_uploaded_file($img['tmp_name'], ("logos/" . $new_img_name));

    //Now set user president
    $user = $db->users[($_SESSION["user_id"])];
    $update_user = array(
        "president" => $club["id"],
    );
    $affected = $user->update($update_user);

    //Add to members db
    $update_member = array(
        "user_id" => $_SESSION["user_id"],
        "club_id" => $club["id"],
    );
    $row = $db->members()->insert($update_member);

    header("Location: clubs-list.php");
}

if ($img['error'] == 1) {
?>
    <h1>Error</h1>
    <p>We apologize. An error might have occured while uploading the file. Please try again and make sure you uploaded a .jpg file.</p>
    <a href="clubs-list.php">Back to clubs list</a>
<?php
}

?>
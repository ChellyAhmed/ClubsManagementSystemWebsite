<?php
session_start();
include "includes/head.php";
include "includes/navbars/navbar.php"; //contains include connection
$current_user_id = $_SESSION['user_id'];
//$_SESSION["club_id"]  contains club ID
?>

<head>
    <title>Club Management system - Join a club</title>
</head>
<h1 style="text-align: center;">Join a club</h1>
<form style="margin: 10px;" action="we-recommend.php" method="POST">
    <?php foreach ($db->clubs() as $club) /*Select all clubs*/ {
        $is_member = false;
        foreach ($db->members("user_id = ? AND club_id = ?", $current_user_id, $club["id"]) as $member) {
            if ($member) {
                $is_member = true;
            }
        }
            if (!($is_member)) { ?>
                Do you like <strong><?php echo $club["field"] ?>?</strong> <br />
                <input type="radio" id="yes" name="<?php echo $club["id"]; ?>" value="yes">
                <label>Yes</label><br>
                <input type="radio" id="no" name="<?php echo $club["id"]; ?>" value="no" checked>
                <label>No</label><br>
                <hr style="width: 40%;" />
    <?php }
    } ?>
    Type here the email of your best friend:
    <input type="text" name="friend"><br />
    <input class="btn btn-primary" type="submit" value="submit">

</form>
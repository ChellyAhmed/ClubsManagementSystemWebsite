<?php
session_start();
error_reporting(E_ERROR | E_PARSE); //To hide warnings for when we have a missing input
include "includes/head.php";
include 'includes/head.php';
include "includes/navbars/navbar.php"; //contains include connection
//$_SESSION["user_id"]  contains user id
//$_SESSION["club_id"] contains club ID
?>

<head>
    <title>Club Management system - Recommended clubs</title>
</head>
<h1 style="text-align: center;">Recommended clubs</h1>

<?php
$num_clubs = 0;
foreach ($db->clubs() as $club) {
    if ($_POST[$club['id']] == "yes") {
        $clubs[$num_clubs] = $club["id"];
        $num_clubs++;
    }
}

$user = $db->users("email = ?", $_POST['friend'])->fetch();
foreach ($db->members("user_id = ?", $user["id"]) as $member) {
    $free = true;
    foreach ($clubs as $index => $id) {
        if ($id == $member["club_id"]) {
            $free = false;
        }
    }
    if ($free) {
        $clubs[$num_clubs] = $member["club_id"];
        $num_clubs++;
    }
}

foreach ($clubs as $index => $id) {
    $club = $db->clubs[$id];
} ?>
<div class="liner">
    <img src="./logos/<?php echo $club['id']; ?>.jpg" class="liner-pic">
    <div class="liner-description" style="width: 100%;">
        <h2> <?php echo $club['name'] ?></h2>
        <span><strong>field:</strong></span>
        <p> <?php echo $club['field'] ?> </p><br />
        <span><strong>president name:</strong></span>
        <p> <?php
            $user = $db->users[$club["pres_id"]];
            echo $user["name"];
            ?> </p><br />
        <span><strong>Description:</strong></span>
        <p> <?php echo $club['description'] ?> </p>
        <div class="liner-buttons" style="text-align: end;">
            <?php if ($_SESSION["user_id"] != 0 && !($member = $db->members("user_id = ? AND club_id = ?", $_SESSION["user_id"], $club["id"])->fetch())) { ?>
                <a href="join-club.php?club_id=<?php echo $club["id"]; ?>">
                    <button class="btn btn-success">Join this club</button>
                </a>
            <?php } ?>
            <a href="members.php?club_id=<?php echo $club["id"]; ?>">
                <button class="btn btn-primary">Members</button>
            </a>
            <a href="activities.php?club_id=<?php echo $club["id"]; ?>">
                <button class="btn btn-primary">Activities</button>
            </a>

        </div>
    </div>
</div>

<?php



?>
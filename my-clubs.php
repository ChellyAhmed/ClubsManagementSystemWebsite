<?php
session_start();
include "includes/head.php";
include "includes/navbars/navbar.php"; //contains include connection
//$_SESSION["user_id"]  contains user id
?>
<h1 style="text-align: center;">My clubs</h1>
<?php
foreach ($db->members("user_id = ?", $_SESSION["user_id"]) as $member) /*Select all activities of club with id $club*/ { ?>
    <?php
    $club = $db->clubs[$member["club_id"]];
    ?>
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
                <a href="members.php?club_id=<?php echo $club["id"]; ?>">
                    <button class="btn btn-primary">Members</button>
                </a>
                <a href="activities.php?club_id=<?php echo $club["id"]; ?>">
                    <button class="btn btn-primary">Activities</button>
                </a>
                <?php if (($club['pres_id'] != $_SESSION["user_id"]) && ($_SESSION["user_id"] != 0)) { ?>
                    <a href="member-delete.php?id=<?php echo $member["id"]; ?>">
                        <button class="btn btn-danger">Leave club</button>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php    }    ?>
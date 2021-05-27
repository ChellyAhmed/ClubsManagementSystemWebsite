<?php
session_start();
include "includes/head.php";
include "includes/navbars/navbar.php"; //contains include connection
//$_SESSION["user_id"]  contains user id
$_SESSION["club_id"] = $_GET["club_id"];

//Select club of activity
$club = $db->clubs[$_SESSION["club_id"]];

//Add activity button
if ( ($_SESSION["user_id"] == $club["pres_id"]) || ($_SESSION["user_id"] == 0) ) { ?>
     <div style=" margin-left: 20px; margin-right: 20px;">
        <a href="add_activity.php">
            <button style="width: 100%;" class="btn btn-primary navbtn">Add Activity</button>
        </a>
    </div>
<?php } ?>

<?php 
foreach ($db->activities("club = ?", $_SESSION["club_id"]) as $activity) /*Select all activities of club with id $club*/ { ?>
    <div class="liner">
        <img src="./uploads/<?php echo $activity['id']; ?>.jpg" class="liner-pic">
        <div class="liner-description" style="width: 100%;">
            <h2> <?php echo $activity['name'] ?></h2>
            <span><strong>Description:</strong></span>
            <p> <?php echo $activity['description'] ?> </p>
            <?php
            //Who can modify this activity??
            if ( ($_SESSION["user_id"] == $club["pres_id"]) || ($_SESSION["user_id"] == 0) ){ ?>
                <div class="liner-buttons" style="text-align: end;">
                    <a href="edit-activity.php?id=<?php echo $activity['id']; ?>">
                        <button class="btn btn-info">Edit</button>
                    </a>
                    <a href="activity-delete.php?id=<?php echo $activity['id']; ?>">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php    }    ?>
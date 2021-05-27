<?php
session_start();
include "includes/head.php";
include "includes/navbars/navbar.php"; //contains include connection
//$_SESSION["user_id"]  contains user id
$_SESSION["club_id"] = $_GET["club_id"];

//Select club of activity
$club = $db->clubs[$_SESSION["club_id"]];

foreach ($db->members("club_id = ?", $_SESSION["club_id"]) as $member) /*Select all members of club with id $club_id*/ { ?>
    <div class="liner">
        <div class="liner-description" style="width: 100%;">
            <h2> <?php 
                $user = $db->users[ $member['user_id'] ];
                echo $user['name'];
            ?></h2>
            <span><strong>email:</strong></span>
            <p> <?php echo $user['email']; ?> </p>
            <div class="liner-buttons" style="text-align: end;">
            <?php
            //Who can remove this member?
            if ( (($_SESSION["user_id"] == $club["pres_id"]) || ($_SESSION["user_id"] == 0)) && ($user['president'] !=  $_SESSION["club_id"]) ){ ?>
                    <a href="set-president.php?id=<?php echo $member['user_id']; ?>">
                        <button class="btn btn-success">Set as president</button>
                    </a>
            <?php }
            if ( (($_SESSION["user_id"] == $club["pres_id"]) || ($_SESSION["user_id"] == 0)) && ($user['president'] !=  $_SESSION["club_id"]) ){ ?>
                    <a href="member-delete.php?id=<?php echo $member['id']; ?>">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                    <?php }
                ?> </div> <?php
            if ($user['president'] ==  $_SESSION["club_id"]) { ?>
                <br><span style="text-align: end;">This user is the president of this club.</span>
            <?php }?>
        </div>
    </div>
<?php    }    ?>
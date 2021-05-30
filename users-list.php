<?php
session_start();
if($_SESSION["user_id"]!=0) {
    header("Location: login.php");
}
include "includes/head.php";
include "includes/navbars/navbar.php"; //contains include connection
//$_SESSION["user_id"]  contains user id

foreach ($db->users("id != ?", 0) as $user) /*Select all non-admin users*/ {
    $club_num = 0; ?>
    <div class="liner">
        <div class="liner-description" style="width: 100%;">
            <?php if ($user["president"] != null) { ?>
                <span class="badge badge-success" style="size: 10px;">President</span>
            <?php } ?>
            <h2> <?php
                    echo $user['name'];
                    ?> </h2>

            <span><strong>email:</strong></span>
            <p> <?php echo $user['email']; ?> </p>
            <br /><span><strong>ID Card number:</strong></span>
            <p> <?php echo $user['id_card']; ?> </p>
            <?php if ($user["president"] != null) {
                $club = $db->clubs[$user["president"]]; ?>
                <br /><span><strong>President of:</strong></span>
                <p> <?php echo $club["name"]; ?> </p>
            <?php } ?>
            <br /><span><strong>Clubs:</strong></span>
            <ul>
                <?php foreach ($db->members("user_id = ?", $user["id"]) as $member) /*Select all non-admin users*/ {
                    $club = $db->clubs[$member["club_id"]];
                    $club_num++; ?>
                    <li> <?php echo $club["name"]; ?> </li>
                <?php } ?>
            </ul>
            <?php if ($club_num == 0) {
                echo "This user hasn't enrolled themselves in any club yet.";
            } ?>
            <div class="liner-buttons" style="text-align: end;">
                <?php if ($user["president"] == null) { ?>
                   <a href="user-remove.php?id=<?php echo $user["id"]; ?>"><button class="btn btn-danger" >Remove this user</button></a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php    }    ?>
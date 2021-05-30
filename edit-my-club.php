<?php
session_start();
include "includes/head.php";
include "includes/navbars/navbar.php"; //contains include connection
//$_SESSION["user_id"]  contains user id
$user = $db->users[$_SESSION["user_id"]];
$club = $db->clubs[$user["president"]]; //Select row of clubs
?>

<body>
    <h1 style="text-align: center;">Edit my club</h1>

    <!-- Activity -->
    <form action="edit-my-club-validation.php" method="post" class="liner" enctype="multipart/form-data">
        <div class="liner-left-part">
            <img src="logos/<?php echo $club["id"] ?>.jpg" alt="" class="liner-pic"> <br>
            <input type="file" id="img" name="img" accept="image/*">
            <div class="alert alert-light" role="alert">
                <span> <small> (Keep this empty if you don't want to change the picture) </small></span>
            </div>
        </div>
        <div class="liner-description">
            <span><strong>Club name:</strong></span> <br />
            <input name="name" type="text" value="<?php echo $club["name"] ?>"><br>
            <span><strong>Field:</strong></span> <br />
            <input name="field" id="" value="<?php echo $club["field"]; ?>"><br/>
            <span><strong>Description:</strong></span> <br />
            <textarea name="description" id="" cols="100" rows="10"><?php echo $club["description"] ?></textarea>
        </div>
        <input type="submit" class="btn btn-secondary" value="Submit" style="width: 100%; margin: 5px;">
    </form>

    <!-- button -->
    <div style="text-align: center;">
        <a href="clubs-list.php" >
            <button class="btn btn-light navbtn">back</button>
        </a>
    </div>
    

</body>

</html>
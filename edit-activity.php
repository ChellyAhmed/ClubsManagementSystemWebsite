<?php
session_start();
include "includes/head.php";
include "includes/navbars/navbar.php"; //contains include connection
//$_SESSION["user_id"]  contains user id
$id = $_GET["id"];
$row = $db->activities[$id]; //Select row
?>

<body>
    <h1 style="text-align: center;">Edit activity</h1>

    <!-- Activity -->
    <form action="edit-activity-validation.php?id=<?php echo $row["id"] ?>" method="post" class="liner" enctype="multipart/form-data">
        <div class="liner-left-part">
            <img src="uploads/<?php echo $row["id"] ?>.jpg" alt="" class="liner-pic"> <br>
            <input type="file" id="img" name="img" accept="image/*">
            <div class="alert alert-light" role="alert">
                <span> <small> (Keep this empty if you don't want to change the picture) </small></span>
            </div>
        </div>
        <div class="liner-description">
            <span><strong>Activity title:</strong></span> <br />
            <input name="name" type="text" value="<?php echo $row["name"] ?>"><br>
            <span><strong>Description:</strong></span> <br />
            <textarea name="description" id="" cols="100" rows="10"><?php echo $row["description"] ?></textarea>
        </div>
        <input type="submit" class="btn btn-secondary" value="Submit" style="width: 100%; margin: 5px;">
    </form>

    <!-- button -->
    <div style="text-align: center;">
        <a href="activities.php?club_id=<?php echo $_SESSION["club_id"]; ?>">
            <button class="btn btn-light navbtn">back</button>
        </a>
    </div>
    

</body>

</html>
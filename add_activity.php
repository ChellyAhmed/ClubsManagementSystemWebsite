<?php
session_start();
include 'includes/head.php';
include "includes/navbars/navbar.php"; //contains include connection
//$_SESSION["user_id"]  contains user id
//$_SESSION["club_id"] contains club ID
?>

<body>
    <h1 style="text-align: center;">Add activity</h1>

    <!-- Activity -->
    <form action="./activity-upload.php"  method="post" enctype="multipart/form-data">
    <div class="liner">
        <div class="liner-left-part">
            <span><strong>Activity picture:</strong></span> <br />
            <input type="file" name="img" accept="image/*">
        </div>
        <div class="liner-description">
            <span><strong>Activity title:</strong></span> <br />
            <input name="name" type="text" placeholder="Activity title"><br>
            <span><strong>Description:</strong></span> <br />
            <textarea name="description" cols="100" rows="10" placeholder="Please type the description of your activity here"></textarea>
        </div>
    </div>

        <div style="text-align: center;">
            <button class="btn btn-primary" type="submit" value="submit" style="width: 97.5%;">Submit</button>
        </div>
        <div style="text-align: center;">

            <a href="activities.php?club_id=<?php echo $_SESSION["club_id"]; ?>">
                <button class="btn btn-light navbtn">back</button>
            </a>

        </div>
    </form>

</body>

</html>
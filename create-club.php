<?php
session_start();
include 'includes/head.php';
include "includes/navbars/navbar.php"; //contains include connection
//$_SESSION["user_id"]  contains user id
?>

<body>
    <h1 style="text-align: center;">Create a club</h1>

    <form action="./club-upload.php" method="post" class="liner" enctype="multipart/form-data" >
        <div class="liner-left-part" >
            <span><strong>Club logo:</strong></span> <br/>
            <input type="file" name="img" accept="image/*">
        </div>
        <div class="liner-description">
            <span><strong>Name:</strong></span> <br/>
            <input name="name"  type="text" placeholder="Club name"><br>
            <span><strong>Field:</strong></span> <br/>
            <input name="field"  type="text" placeholder="Field"><br>
            <span><strong>Description:</strong></span> <br />
            <textarea name="description"  cols="100" rows="10"
                placeholder="Please type the description of your club here"></textarea>
        </div>
        <button class="btn btn-secondary" type="submit" value="submit" style="width: 100%; margin: 5px;" >Submit</button>
    </form>

    <div style="text-align: center;">
        <a href="clubs-list.php">
            <button class="btn btn-light navbtn">back</button>
        </a>
    </div>
    

</body>

</html>

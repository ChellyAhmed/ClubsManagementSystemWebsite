<?php
session_start();
$_SESSION['id_card']= 0;
$_SESSION['password']= "";

include "includes/head.php" ; ?>
    <title>Club Management system -login-</title>
</head>

<body class="login-body" style="text-align: center;">
<br><br><br><br><br><br><br><br><br>
   <div class="login-box">
   <h1>Welcome to our clubs management system</h1>
    <form action="login-submit.php" method="post">
        <label for="id_card">ID Card number:</label>
        <input type="text" id="id_card" name="id_card"><br><br>
        <label for="username">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
    <span>Don't have an account?</span><a href="register.php"> Click here! </a>

   </div>
</body>

</html>
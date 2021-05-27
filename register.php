<?php
session_start();
$_SESSION['id_card']= 0;
include "includes/head.php"; ?>
<title>Club Management system -login-</title>
</head>

<body style="text-align: center;">
    <h1>Create your account now!</h1>
    <p>It'll take less than 30 seconds!</p>
    <form action="registration-submit.php" method="post">
        <label for="id_card">ID card number:</label>
        <input type="text" id="id_card" name="id_card"><br><br>
        <label for="name">Full name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="email">email:</label>
        <input type="text" id="email" name="email"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
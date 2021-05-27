<?php
include "notorm/NotORM.php";
$pdo = new PDO("mysql:dbname=cms", "root");
$db = new NotORM($pdo);

?>

<?php

$servername = "remotemysql.com";
$username = "IzKON2j8qa";
$password = "NNn2mEn1AB";
$dbname = "IzKON2j8qa";

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO `users`(`id_user`, `username`, `password`,`role_id`) VALUES (NULL,'$username','$password', 2)";


mysqli_query($conn, $sql);

mysqli_close($conn);

header("Location:https://sikora-oliwier-wdw.herokuapp.com/login.php");

?>
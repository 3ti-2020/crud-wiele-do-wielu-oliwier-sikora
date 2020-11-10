<?php

$servername = "sql7.freemysqlhosting.net";
$username = "sql7373161";
$password = "Ey7I2iRKeH";
$dbname = "sql7373161";

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO `users`(`id_user`, `username`, `password`) VALUES (NULL,'$username','$password')";


mysqli_query($conn, $sql);

mysqli_close($conn);

header("Location:http://localhost/lekcja27/login.php");

?>
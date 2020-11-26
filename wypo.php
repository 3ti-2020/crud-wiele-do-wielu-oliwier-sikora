<?php
    $servername = "remotemysql.com";
    $username = "IzKON2j8qa";
    $password = "NNn2mEn1AB";
    $dbname = "IzKON2j8qa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $tytul=$_POST['tytuly'];
    $user=$_POST['users'];
    $ile=$_POST['ile'];

    $sql = "INSERT INTO `wypo`(`id`, `id_tytul`, `id_user`,`data_wyp`,`data_od`) VALUES (NULL,'$tytul','$user',curdate(),DATE_ADD(CURDATE(), INTERVAL +$ile DAY))";
 
    mysqli_query($conn, $sql);

    mysqli_close($conn);

    header("Location:https://sikora-oliwier-wdw.herokuapp.com/");
    


?>
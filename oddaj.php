<?php
    
    $servername = "remotemysql.com";
    $username = "IzKON2j8qa";
    $password = "NNn2mEn1AB";
    $dbname = "IzKON2j8qa";

        $conn = new mysqli($servername, $username, $password, $dbname);

    $sql= "DELETE FROM `wypo` WHERE id='".$_POST['id']."'";

    mysqli_query($conn, $sql);

    header("Location:https://sikora-oliwier-wdw.herokuapp.com/");


?>
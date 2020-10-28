<?php
    $servername = "sql7.freemysqlhosting.net";
    $username = "sql7373161";
    $password = "Ey7I2iRKeH";
    $dbname = "sql7373161";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $isbn = rand(100,999);

    $sql = "INSERT INTO `tytuly`(`id_tytul`, `tytul`, `isbn`) VALUES (NULL, '".$_POST['tytul']."', $isbn)";

    mysqli_query($conn, $sql);

    mysqli_close($conn);

    header("Location:https://sikora-oliwier-wdw.herokuapp.com/");
    
?>
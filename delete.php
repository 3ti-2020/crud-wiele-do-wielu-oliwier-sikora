<?php
    
        $servername = "sql7.freemysqlhosting.net";
        $username = "sql7373161";
        $password = "Ey7I2iRKeH";
        $dbname = "sql7373161";

        $conn = new mysqli($servername, $username, $password, $dbname);

    $sql= "DELETE FROM `books` WHERE id_book='".$_POST['id']."'";

    mysqli_query($conn, $sql);

    header("Location:https://sikora-oliwier-wdw.herokuapp.com/");


?>
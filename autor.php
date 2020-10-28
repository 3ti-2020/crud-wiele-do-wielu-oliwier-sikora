
<?php

    $servername = "sql7.freemysqlhosting.net";
    $username = "sql7373161";
    $password = "Ey7I2iRKeH";
    $dbname = "sql7373161";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO `autorzy`(`id_autor`, `imie`, `nazwisko`) VALUES (NULL , '".$_POST['imie']."', '".$_POST['nazwisko']."') ";

    mysqli_query($conn, $sql);

    mysqli_close($conn);

    header("Location:https://sikora-oliwier-wdw.herokuapp.com/");
    
?>
<?php
    $servername = "sql7.freemysqlhosting.net";
    $username = "sql7373161";
    $password = "Ey7I2iRKeH";
    $dbname = "sql7373161";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO `books`(`id_book`, `id_tytul`, `id_autor`) VALUES (null,".$_POST['tytuly'].",".$_POST['autorzy'].")";

    mysqli_query($conn, $sql);

    mysqli_close($conn);

   header("Location:https://sikora-oliwier-wdw.herokuapp.com/");
    


?>
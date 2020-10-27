<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO `books`(`id_book`, `id_tytul`, `id_autor`) VALUES (null,".$_POST['tytuly'].",".$_POST['autorzy'].")";

    mysqli_query($conn, $sql);

    mysqli_close($conn);

   header("Location:http://localhost/lekcja27/");
    


?>
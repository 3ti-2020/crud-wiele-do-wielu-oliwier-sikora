  
<?php
    $servername = "sql7.freemysqlhosting.net";
    $username = "sql7373161";
    $password = "Ey7I2iRKeH";
    $dbname = "sql7373161";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $autor = $_POST['autor'];
    $imie = $_POST['imie'];
    $tytul = $_POST['tytul'];
    $isbn = rand(100,999);

    $sql_autor = "INSERT INTO `autorzy`(`id_autor`, `imie`, `nazwisko`) VALUES (NULL,'$imie','$nazwisko')";

    $query1 = mysqli_query($conn, $sql_autor);

    if($query1){

        $sql_tytul = "INSERT INTO `tytuly`(`id_tytul`, `tytul`, `ISBN`) VALUES (NULL,'$tytul','$isbn')";

        $query2 = mysqli_query($conn, $sql_tytul);

    }

    if($query2){

        $id_autor = "SELECT id_autor FROM `autorzy` WHERE nazwisko='$autor' ";
        $result1 = $conn->query($id_autor);

        while($row1 = $result1->fetch_assoc()){
            $autorid = $row1['id_autor'];

    };

        $id_tytul = "SELECT id_tytul FROM `tytuly` WHERE tytul='$tytul' ";
        $result2 = $conn->query($id_tytul);

        while($row2 = $result2->fetch_assoc()){
            $tytulid = $row2['id_tytul'];
    };

    $sql_autor_tytul = "INSERT INTO `books`(`id_book`, `id_tytul`, `id_autor`) VALUES (NULL, '$tytulid', '$autorid')";

    $query3 = mysqli_query($conn, $sql_autor_tytul);

    }

    header("Location:https://sikora-oliwier-wdw.herokuapp.com/");

?>
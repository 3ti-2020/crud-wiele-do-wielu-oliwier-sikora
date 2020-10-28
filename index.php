<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiele do wielu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <header></header>
    <main>
    <?php
        $servername = "sql7.freemysqlhosting.net";
        $username = "sql7373161";
        $password = "Ey7I2iRKeH";
        $dbname = "sql7373161";

        $conn = new mysqli($servername, $username, $password, $dbname);
        $result=$conn->query("SELECT id_book, autorzy.nazwisko, tytuly.tytul FROM books, autorzy, tytuly WHERE books.id_autor=autorzy.id_autor and books.id_tytul=tytuly.id_tytul");                    /*pozycje to nazwa widoku*/

        echo("<table class='tabelka' border=1>");
            echo("<tr>
            <th>ID</th>
            <th>Nazwisko</th>
            <th>Tytul</th>
            </tr>");

                while($row=$result->fetch_assoc() ){
                    echo("<tr>");
                    echo("<td>".$row['id_book']."</td>");
                    echo("<td>".$row['nazwisko']."</td>");
                    echo("<td>".$row['tytul']."</td>");
                    echo("</tr>");
                }

            echo("</table>");

?>
</main>
<aside>

                    <h2>Insert Autor:</h2>
                    <form action="autor.php" method="POST">
                        <input type="text" name="imie">
                        <input type="text" name="nazwisko"><br>
                        <input type="submit" value="Dodaj">
                    </form>
                    <h2>Insert Tytuł:</h2>
                    <form action="tytul.php" method="POST">
                        <input type="text" name="tytul"><br>
                        <input type="submit" value="Dodaj">
                    </form>
                    <h2>Autor i Tytuł:</h2>
                    <?php
                        $servername = "sql7.freemysqlhosting.net";
                        $username = "sql7373161";
                        $password = "Ey7I2iRKeH";
                        $dbname = "sql7373161";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        $result2 = $conn->query("SELECT * FROM tytuly");
                        

                        echo("<form action='books.php' method='POST'>");
                        echo("<select name='tytuly'>");
                        while($row=$result2->fetch_assoc() ){
                            echo("<option value='".$row['id_tytul']."'>".$row['tytul']."</option>");
                        }
                        echo("</select>");

                        $result3 = $conn->query("SELECT * FROM autorzy");
                       
                        echo("<select name='autorzy'>");
                        while($row=$result3->fetch_assoc() ){
                            echo("<option value='".$row['id_autor']."'>".$row['imie']." ".$row['nazwisko']."</option>");
                        }
                        echo("</select>");
                        echo("<br>");
                        echo("<input type='submit' value='Dodaj'>");
                        echo("</form>");

                     
                        
                    ?>

</aside>
<footer></footer>
</body>
<script src="main.js"></script>
</html>
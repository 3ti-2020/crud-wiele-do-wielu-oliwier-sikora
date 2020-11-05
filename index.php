<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiele do wielu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <header><h1>Oliwier Sikora gr 1 nr 12</h1></header>
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

                    <h2>Insert Autor i Tytul:</h2>
                    <form action="insert.php" method="POST" class="formularz">
                    <input type="text" name="autor" id="autor" placeholder="nazwisko">
                    <input type="text" name="imie" id="imie" placeholder="imie">
                    <input type="text" name="tytul" id="tytul" placeholder="tytul">
                    <input type="submit" value="Dodaj">
                    </form>
                    
                    
</aside>
<footer>
        
        <a href="card/cards.html" class="cards"><i class="fas fa-address-card"></i>Cards</a>
    
<footer>
</body>
<script src="main.js"></script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiele do wielu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

   
    <header>

    <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-oliwier-sikora"><img src="git.png" alt=""></a>

    <div class="jasny"></div>
    <div class="ciemny"></div>
    <div class="normal"></div>

    <h1>Oliwier Sikora gr 1 nr 12</h1>

    <?php

session_start();

if( isset($_POST['password']) && $_POST['password'] == "zaq1@WSX"){
    $_SESSION['logowanie'] = 1;
}

if( isset($_GET['akcja']) && $_GET['akcja'] == "wyloguj" ){
    unset($_SESSION['logowanie']);
}
if( isset($_SESSION['logowanie']) && $_SESSION['logowanie'] == 1){
    ?>
    <div class="login">
    <h2 class='logged'>Gratulacje, zalogowałeś się</h2>
    <button><a href='index.php?akcja=wyloguj' class="wyloguj">Wyloguj się</a></button>
    </div>
    <?php

}else{
    ?>

    <a href="login.php"><h2 class="unlogged">Zaloguj się</h2></a>
   
    
    <?php
}

?>
    
    </header>
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
                    if(isset($_SESSION['logowanie'])){
                        echo("<td>
                            <form action='delete.php' method='POST'>
                                <input type='hidden' name='id' value='".$row['id_book']."'>
                                <input type='submit' value='X'>
                            </form>
                        </td>");
                        }
                    echo("</tr>");
                }

            echo("</table>");

?>
</main>
<aside>

<?php
                
                if(isset($_SESSION['logowanie'])){
                    ?>

                     <h2>Insert Autor i Tytul:</h2>
                    <form action="insert.php" method="POST" class="formularz">
                    <input type="text" name="autor" id="autor" placeholder="nazwisko">
                    <input type="text" name="imie" id="imie" placeholder="imie">
                    <input type="text" name="tytul" id="tytul" placeholder="tytul">
                    <input type="submit" value="Dodaj">
                    </form>     <?php
                } ?>
                    
                    
</aside>
<footer>
        
        <a href="card/cards.html" class="cards"><i class="fas fa-address-card"></i>Cards</a>
    
<footer>
</body>
<script src="main.js"></script>
</html>
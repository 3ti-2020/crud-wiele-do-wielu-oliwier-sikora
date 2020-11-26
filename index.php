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

if(isset($_POST['username']) && isset($_POST['password'])){

        $servername = "remotemysql.com";
        $username = "IzKON2j8qa";
        $password = "NNn2mEn1AB";
        $dbname = "IzKON2j8qa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $_SESSION['username'] = $_POST['username'];
    $result = $conn -> query("SELECT * FROM users");
    while($row=$result->fetch_assoc()){
        if($row['username']==$_POST['username'] && $row['password']==$_POST['password'] && ($row['role_id']==1 || $row['role_id']==3)){
            $_SESSION['logowanie'] = 1;
           
        } else if  ($row['username']==$_POST['username'] && $row['password']==$_POST['password'] && $row['role_id']==2){     
            $_SESSION['logg'] = 1;
        }
    }
}
if( isset($_GET['akcja']) && $_GET['akcja'] == "wyloguj" ){
    unset($_SESSION['logowanie']);
    unset($_SESSION['logg']);
}
if( isset($_SESSION['logowanie']) && $_SESSION['logowanie'] == 1){
    ?>
    <div class="login">
    <h2 class='logged'>Gratulacje, zalogowałeś się, możesz edytować stronę</h2>
    <a href='index.php?akcja=wyloguj' class="wyloguj"><h2 class="unlogged">Wyloguj się</h2></a>
    </div>
    <?php

}else if (isset($_SESSION['logg']) && $_SESSION['logg'] == 1) {
    
    ?>
    <div class="login">
    <h2 class='logged'>Gratulacje, zalogowałeś się użytkowniku</h2>
    <a href='index.php?akcja=wyloguj' class="wyloguj"><h2 class="unlogged">Wyloguj się</h2></a>
    </div>
    <?php
    
} else {
    ?>

    <a href="login.php"><h2 class="unlogged">Zaloguj się</h2></a>
   
    
    <?php
}

?>
    
    </header>
    <main>
    <?php
         $servername = "remotemysql.com";
         $username = "IzKON2j8qa";
         $password = "NNn2mEn1AB";
         $dbname = "IzKON2j8qa";

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

<?php
        $servername = "remotemysql.com";
        $username = "IzKON2j8qa";
        $password = "NNn2mEn1AB";
        $dbname = "IzKON2j8qa";

        $conn = new mysqli($servername, $username, $password, $dbname);
        $result=$conn->query("SELECT wypo.id, users.username, tytuly.tytul, wypo.data_wyp, wypo.data_od, datediff(data_od, CURRENT_DATE) as dni FROM wypo, users, tytuly WHERE wypo.id_user=users.id_user and wypo.id_tytul=tytuly.id_tytul ORDER BY id");                    
        
        echo("<table class='tabelka' border=1>");
            echo("<tr>
            <th>ID</th>
            <th>Username</th>
            <th>Tytul</th>
            <th>Data_wypozyczenia</th>
            <th>Data_oddania</th>
            <th>Dni do oddania</th>
            </tr>");

                while($row=$result->fetch_assoc() ){
                    $data=$row['data_od'];
                    if (date("Y-m-d")<$data) {
                    echo("<tr class='zielony'>");
                    echo("<td>".$row['id']."</td>");
                    echo("<td>".$row['username']."</td>");
                    echo("<td>".$row['tytul']."</td>");
                    echo("<td>".$row['data_wyp']."</td>");
                    echo("<td>".$row['data_od']."</td>");
                    echo("<td>".$row['dni']."</td>");
                    if(isset($_SESSION['logowanie'])){
                        echo("<td>
                            <form action='oddaj.php' method='POST'>
                                <input type='hidden' name='id' value='".$row['id']."'>
                                <input type='submit' value='Oddaj'>
                            </form>
                        </td>");
                        }
                    echo("</tr>");
                    }else if(date("Y-m-d",strtotime("-1 days"))==$data || date("Y-m-d")==$data){
                        echo("<tr class='pomarancz'>");
                        echo("<td>".$row['id']."</td>");
                        echo("<td>".$row['username']."</td>");
                        echo("<td>".$row['tytul']."</td>");
                        echo("<td>".$row['data_wyp']."</td>");
                        echo("<td>".$row['data_od']."</td>");
                        echo("<td>".$row['dni']."</td>");
                        if(isset($_SESSION['logowanie'])){
                            echo("<td>
                                <form action='oddaj.php' method='POST'>
                                    <input type='hidden' name='id' value='".$row['id']."'>
                                    <input type='submit' value='Oddaj'>
                                </form>
                            </td>");
                            }
                        echo("</tr>");
                    }
                    else if(date("Y-m-d")>$data){
                    $dni=$row['dni']*-1;
                    echo("<tr class='czerwony'>");
                    echo("<td>".$row['id']."</td>");
                    echo("<td>".$row['username']."</td>");
                    echo("<td>".$row['tytul']."</td>");
                    echo("<td>".$row['data_wyp']."</td>");
                    echo("<td>".$row['data_od']."</td>");
                    echo("<td>".$dni." po terminie</td>");
                    if(isset($_SESSION['logowanie'])){
                        echo("<td>
                            <form action='oddaj.php' method='POST'>
                                <input type='hidden' name='id' value='".$row['id']."'>
                                <input type='submit' value='Oddaj'>
                            </form>
                        </td>");
                        }
                    echo("</tr>");
                    }
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
                    </form>  <br> <br>
                    
                       <?php
                            $servername = "remotemysql.com";
                            $username = "IzKON2j8qa";
                            $password = "NNn2mEn1AB";
                            $dbname = "IzKON2j8qa";
                    
                            $conn = new mysqli($servername, $username, $password, $dbname);
    
                            $result1 = $conn->query("SELECT * FROM users");
                            $result2 = $conn->query("SELECT * FROM tytuly");

                            echo("<h2>Wypożyczenie:</h2>");
                            echo("<form action='wypo.php' method='POST'>");
                            echo("<select name='users'>");
                            while($row=$result1->fetch_assoc() ){
                                echo("<option value='".$row['id_user']."'>".$row['username']."</option>");
                            }
                            echo("</select>");
                           
                            echo("<select name='tytuly'>");
                            while($row=$result2->fetch_assoc() ){
                                echo("<option value='".$row['id_tytul']."'>".$row['tytul']."</option>");
                            }
                            echo("</select>");
                            echo("<input type='number' name='ile' placeholder='na ile dni'>");
                            echo("<input type='submit' value='Dodaj'>");
                            echo("</form>");
                } ?>
                    
                    
</aside>
<footer>
        
        <a href="card/cards.html" class="cards"><i class="fas fa-address-card"></i>Cards</a>
    
<footer>
</body>
<script src="main.js"></script>
</html>
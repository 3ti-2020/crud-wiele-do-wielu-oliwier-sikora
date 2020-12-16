<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header"><h1>Blog (oby) na 5</h1></div>
 
 <div class="main">
        <?php
             $servername = "remotemysql.com";
             $username = "IzKON2j8qa";
             $password = "NNn2mEn1AB";
             $dbname = "IzKON2j8qa";
     
         $conn = new mysqli($servername, $username, $password, $dbname);
         $result=$conn->query("SELECT posty.content, GROUP_CONCAT(tagi.tag) as tagi FROM posty,tagi,post_tag WHERE posty.id_post=post_tag.id_post AND tagi.id_tag=post_tag.id_tag GROUP by posty.content");    
         while($row=$result->fetch_assoc()){
            echo("<article class='post'>");
            echo("<div class='content'>");
            $result1=$conn->query("SELECT distinct title from posty where posty.content='".$row['content']."'");
            while ($row1=$result1->fetch_assoc()) {
                if($row1['title']!=""){
                    echo("<h2 class='title'>".$row1['title']."</h2>");
                    }else{
                       echo("<h2 class='title'>Brak tytułu</h2>");
                    };
            };
            echo($row['content']);
            echo("</div>");
            echo("<h3 class='tag'>");
                
                    echo("#".$row['tagi']);

            echo("</h3>");
            echo("</article>");
        }     
        ?>
 </div>

 <div class="aside">

                     
            <p>Aby dodać więcej tagów wklej zawartość postu i wpisz nowy tag</p> 
                    <form action="insert.php" method="POST" class="formularz">
                    <input type="text" name="post" placeholder="post"> <br>
                    <input type="text" name="tag"  placeholder="tag"> <br>
                    <input type="submit" value="Dodaj">
                    </form>  <br> <br>

                    <h2>Wybierz szukany tag:</h2>
                    <?php
             $servername = "remotemysql.com";
             $username = "IzKON2j8qa";
             $password = "NNn2mEn1AB";
             $dbname = "IzKON2j8qa";
     
         $conn = new mysqli($servername, $username, $password, $dbname);
         $result=$conn->query("SELECT * from tagi");    
         while($row=$result->fetch_assoc()){
            echo("<form action='index1.php' method='post'>");
            echo("<input type='hidden' name='search' value='".$row['id_tag']."'>");
            echo("<input type='submit' value='".$row['tag']."'>");
            echo("</form>");
        }     
        ?>
 
 </div>
    
</body>
</html>
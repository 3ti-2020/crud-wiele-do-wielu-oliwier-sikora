<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
 <div class="main">
        <?php
             $servername = "remotemysql.com";
             $username = "IzKON2j8qa";
             $password = "NNn2mEn1AB";
             $dbname = "IzKON2j8qa";
     
         $conn = new mysqli($servername, $username, $password, $dbname);
         $result=$conn->query("SELECT posty.content, GROUP_CONCAT(tagi.tag) as tagi FROM posty,tagi,post_tag WHERE posty.id_post=post_tag.id_post AND tagi.id_tag=post_tag.id_tag GROUP by posty.content");
         echo("<table border='1'>
         <th>Post</th>
         <th>Tagi</th>
         ");
         while($row=$result->fetch_assoc()){
             echo("<tr>");
             echo("<td>".$row['content']."</td><td>".$row['tagi']."</td>");
             echo("</tr>");
         };
         echo("</table>");
        ?>
 </div>

 <div class="aside">

                     <h2>Post i tag:</h2> 
                    <form action="insert.php" method="POST" class="formularz">
                    <input type="text" name="post" placeholder="post"> <br>
                    <input type="text" name="tag"  placeholder="tag"> <br>
                    <input type="submit" value="Dodaj">
                    </form>  <br> <br>
 
 </div>
    
</body>
</html>
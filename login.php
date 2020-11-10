<!DOCTYPE html>
<html>

<head>

    <title>Logowanie</title>
    <link rel="stylesheet" href="login.css">

</head>

<body>



<div>
<?php

session_start();

if( isset($_GET['akcja']) && $_GET['akcja'] == "wyloguj" ){
    unset($_SESSION['logowanie']);
}

if( !isset($_SESSION['logowanie']) ){
?>  

    <form action="index.php" method="post" class="logowanie">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Zaloguj">
       <a href="rejstracja.html"><input type="button" value="Rejstracja"></a>
    </form>
<?php
}else{
    ?>
    <div class="login">
    <h1 class='zalogowany'>ZALOGOWANY</h1>
    <button><a href='index.php?akcja=wyloguj' class="btn-wyloguj">WYLOGUJ</a></button>
    </div>
    <?php
}

?>
</div>

</body>
</html>


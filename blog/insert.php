  
<?php
     $servername = "remotemysql.com";
     $username = "IzKON2j8qa";
     $password = "NNn2mEn1AB";
     $dbname = "IzKON2j8qa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $post = $_POST['post'];
    $tag = $_POST['tag'];  

    $sql_post = "INSERT INTO `posty`(`id_post`, `content` ) VALUES (NULL,'$post')";

    $query1 = mysqli_query($conn, $sql_post);
    $res=$conn->query("Select * from tagi");
    while ($row=$res->fetch_assoc()) {
        if($query1 && $row['tag']==$tag){

            $idtag=$row['id_tag'];
            $is=1;
    
        };
    };
    
    if($is==1){

        echo($idtag);
        $is=0;

    }else{
        
        $sql_tag = "INSERT INTO `tagi`(`id_tag`, `tag`) VALUES (NULL,'$tag')";

        $query2 = mysqli_query($conn, $sql_tag);
    };


    if($query2){

        $id_post = "SELECT id_post FROM `posty` WHERE content='$post' ";
        $result1 = $conn->query($id_post);

        while($row1 = $result1->fetch_assoc()){
            $postid = $row1['id_post'];

    };

        $id_tag = "SELECT id_tag FROM `tagi` WHERE tag='$tag' ";
        $result2 = $conn->query($id_tag);

        while($row2 = $result2->fetch_assoc()){
            $tagid = $row2['id_tag'];
    };

    $sql_post_tag = "INSERT INTO `post_tag`(`id`, `id_post`, `id_tag`) VALUES (NULL, '$postid', '$tagid')";

    $query3 = mysqli_query($conn, $sql_post_tag);
     echo("Dziala");

    }else {
        $id_postt = "SELECT id_post FROM `posty` WHERE content='$post' ";
        $result3 = $conn->query($id_postt);

        while($row3 = $result3->fetch_assoc()){
            $postid = $row3['id_post'];

    };
        $sql_postt_tag = "INSERT INTO `post_tag`(`id`, `id_post`, `id_tag`) VALUES (NULL, '$postid', '$idtag')";
        $query4 = mysqli_query($conn, $sql_postt_tag);
        echo("Zrobione");
    }

    header("Location:https://sikora-oliwier-wdw.herokuapp.com/blog");

?>
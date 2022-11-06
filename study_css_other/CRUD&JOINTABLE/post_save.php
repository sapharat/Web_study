<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:login.php");
        die();
    }

        session_start();
        $comm = $_POST['comment'];
        $post = $_POST['post_id'];
        $user = $_SESSION['user_id'];

        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $sql = "INSERT INTO comment (content, post_date, user_id, post_id) 
                VALUES ('$comm', NOW(), $user, $post)";

        $conn->exec($sql);
        $conn=null;
        header("location: post.php?id=$post"); 
        die();       
    ?>
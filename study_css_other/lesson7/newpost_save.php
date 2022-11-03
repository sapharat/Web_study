<?php
session_start();

$categoryid = $_POST['category'];
$topic = $_POST['topic'];
$content = $_POST['content'];
$uid =  $_SESSION["user_id"];

try {
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $sql = "INSERT INTO post (title , content, post_date , cat_id , user_id) VALUES 
        ('$topic','$content',NOW(),'$categoryid','$uid')";
        $conn->exec($sql);
        $_SESSION['add_post']="success";
        header("location:newpost.php");
        
?>
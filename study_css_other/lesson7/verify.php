<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location: index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center"> Webbord</h1>
    <hr>
    <div align="center">
        <?php 
        if ($_POST["login"]=="admin" && $_POST["password"]=="ad1234"){
            echo "ยินดีต้อนรับคุณ ADMIN";
            $_SESSION["username"]='admin';
            $_SESSION["role"]='a';
            $_SESSION["id"]= session_id();
        }
        else if ($_POST["login"]=="member" && $_POST["password"]=="mem1234"){
            echo "ยินดีต้อนรับคุณ MEMBER";
            $_SESSION["username"]='member';
            $_SESSION["role"]='m';
            $_SESSION["id"]= session_id();
        }
        else{
            echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
        }
        ?>
        <a href=index.php?id=$i>กลับสู่หน้าหลัก</a></li>
        <br>
    </div>
</body>
</html>
<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location: index.php");
        die();
    }
?>
<?php 
        if ($_POST["login"]=="admin" && $_POST["password"]=="ad1234"){
            $_SESSION["username"]='admin';
            $_SESSION["role"]='a';
            $_SESSION["id"]= session_id();
            header("location:index.php");
            die();
        }
        elseif($_POST["login"]=="member" && $_POST["password"]=="mem1234"){
            $_SESSION["username"]='member';
            $_SESSION["role"]='m';
            $_SESSION["id"]= session_id();
            header("location:index.php");
            die();
        }
        else{
           $_SESSION['error']='error';
           header("location:login.php");
           die();
        }
?>

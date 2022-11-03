<?php
session_start();

    $User = $_POST["userLogin"];
    $Password = $_POST["passwordLogin"];
  
    if($User == "admin" && $Password == "ad1234"){
      $_SESSION['username'] =  $User;
      $_SESSION['role'] = "a";
      $_SESSION['id'] = session_id();
      header("Location:index.php");
    }elseif($User == "member" && $Password == "mem1234"){
      $_SESSION['username'] =  $User;
      $_SESSION['role'] = "m";
      $_SESSION['id'] = session_id();
      header("Location:index.php");
    }else{
      $_SESSION['errormsg'] = "eror";
      header("Location:login.php");
    }

    if(isset($_SESSION['id'])){
      header("Location:index.php");
      exit(0);
    }
?>

<?php
  if(isset($_SESSION["username"])&& $_SESSION["id"]==session_id()){
    header("location:index.php");
    die();
  }
  session_start();
  $login=$_POST["login"];
  $password=$_POST["password"];
  $conn =new PDO("mysql:host=localhost;dbname=webborad;charset=utf8", "root","");
  $sql="SELECT * FROM user where
  login='$login' and password=sha1('$password')";
  $result=$conn->query($sql);
  if($result->rowCount()==1){
    $data=$result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['username']=$data['login'];
    $_SESSION['role']=$data['role'];
    $_SESSION['user_id']=$data['id'];
    $_SESSION['id']=session_id();
    header("location:index.php");
    die();
  }else{
      $_SESSION["error"]=1;
      header("location:login.php");
      die();
  }
  $conn=null;  
?>


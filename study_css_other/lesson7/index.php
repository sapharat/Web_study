<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<?php
    if(!isset($_SESSION['id'])){
?>
<body>
<h1 style="text-align: center;">Webboard KakKak</h1>
    <hr>
    หมวดหมู่ :<select name ="su">
        <option value="All">--ทั้งหมด--</option>
        <option value="na">เรื่องทั้วไป</option>
        <option value="sp">เรื่องเรียน</option>
    </select>
    <a style ="float: right;"href= "login.php">เข้าสู่ระบบ</a>
    
    <ul>
    <?php
        for($i=1;$i<=10;$i++){
            echo "<li><a href=post.php?id=$i>กระทู้ที่ $i</a></li>";
        }
    ?>
    </ul>
</body>
<?php } else{?>
    <body>
    <h1 style="text-align: center;">Webboard KakKak</h1>
    <hr>
    หมวดหมู่ :
    <select name ="su">
        <option value="All">--ทั้งหมด--</option>
        <option value="na">เรื่องทั้วไป</option>
        <option value="sp">เรื่องเรียน</option>
    </select>
    <div style="float:right">
        ผู้ใช้งานระบบ : <?php echo $_SESSION['username'] ?>&nbsp;&nbsp;
        <a href="logout.php">ออกจากระบบ</a>
    </div>
   
    <br>
        <a href= "newpost.php">สร้างกระทู้ใหม่</a>

    <ul>
        <?php
            for($i=1;$i<=10;$i++){
                echo "<li>";
                echo "<a href=post.php?id=$i>กระทู้ที่ $i</a>";
                if($_SESSION['role']=='a'){
                echo "&nbsp;&nbsp;&nbsp;<a href=delete.php?id=$i>ลบ</a>";
                }
                echo"</li>";
            }           
        ?>

    </ul>
</body>
<?php } ?>
</html>
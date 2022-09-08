<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    
    <h1 style="text-align: center;">Webboard KakKak</h1>
    <hr>
    <p>หมวดหมู่ :<select name ="su">
        <option value="All">--ทั้งหมด--</option>
        <option value="na">เรื่องทั้วไป</option>
        <option value="sp">เรื่องเรียน</option>
    </select>
    <a style ="float: right;"href= "login.html">เข้าสู่ระบบ</a>
    </p>
    <?php
        for($i=1;$i<=10;$i++){
            echo "<li><a href=post.php?id=$i>กระทู้ที่ $i</a></li>";
        }
    ?>
    
</body>
</html>
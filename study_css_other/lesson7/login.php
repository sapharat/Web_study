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
    <form action="verify.php" method="post">

        <h1 style="text-align: center;">Webboard KakKak</h1>
        <hr>
        <table style="border: 2px solid black; width: 40%; margin-left: auto;margin-right: auto;">
            <tr>
                <td colspan="2" style="background-color: #6CD2FE;">เข้าสู่ระบบ</td>
            </tr>
            <tr>
                <td>Login</td>
                <td><input type="text" name="login" size="40"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" size="40"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Login"></td>
            </tr>
        </table>
        <br>
        <div align="center">
            ถ้ายังไม่สมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a>
        </div>

    </form>

</body>

</html>
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
        header("location: index.php");
    }else{
?>
<body>
    <h1 style="text-align: center;">Webboard KakKak</h1>
    <hr>
    ผู้ใช้ : <?php echo $_SESSION['username'] ?>&nbsp;&nbsp;
    <br>
    <table >
        <td colspan="1">หมวดหมู่:</td>
        <td colspan="2">
                <select name ="su">
                    <option value="All">--ทั้งหมด--</option>
                    <option value="na">เรื่องทั้วไป</option>
                    <option value="sp">เรื่องเรียน</option>
                </select>
        </td>
        <tr>
            <td colspan="1">หัวข้อ:</td>
            <td colspan="2" ><input type="text" name="login" size="20"></td>
        </tr>
        <td colspan="1">เนื้อหา:</td>
            <td><textarea name="" width="400px" height="100px"> </textarea></td>
        </tr>
        <tr>
            <td colspan="1"></td>
            <td colspan="2"><input type="submit" value="บันทึกข้อความ"></td>
        </tr>
    </table>
</body>
    <?php } ?>
</html>
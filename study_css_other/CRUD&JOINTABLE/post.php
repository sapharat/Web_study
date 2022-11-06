<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <div style="text-align: center;">
            <?php echo "ต้องการดูกระทู้หมายเลข " . $_GET["id"]; ?>
            <br>
            <?php
            if ($_GET["id"] % 2 == 0) {
                echo "เป็นกระทู้หมายเลขคู่";
            } else {
                echo "เป็นกระทู้หมายเลขคี่";
            }
            ?>
        </div>

        <!-- ดึงข้อมูลกระทู้ -->
        <?php
        $serverName = 'localhost';
        $userName = 'root';
        $userPassword = '';
        $dbName = 'webboard';
        $id = $_GET['id'];
        $conn = new mysqli($serverName, $userName, $userPassword, $dbName);
        mysqli_set_charset($conn, "utf8");
        $query = $conn->query("SELECT * FROM post where id=$id");
        $result = $query->fetch_assoc();
        $sqlname = $conn->query("SELECT * FROM user where id=$result[user_id]");
        $resultname = $sqlname->fetch_assoc();
        if ($result) {
            echo "<div class='card text-dark bg-white border-primary mt-3'>
                        <div class='card-header bg-primary text-white'>$result[title]</div>
                        <div class='card-body'>$result[content]<br><br>";
            if ($resultname) {
                echo "$resultname[name]";
            }
            echo "- $result[post_date]</div></div>";
        }
        $conn = null;
        ?>

        <!-- ดึงข้อมูลความคิดเห็น -->
        <?php
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset-utf8", "root", "");
        $sql = "SELECT * FROM comment";
        $num = 1;

        foreach ($conn->query($sql) as $row) { 
            $conname = new mysqli($serverName, $userName, $userPassword, $dbName);
            mysqli_set_charset($conname, "utf8");
            $sqlname = $conname->query("SELECT * FROM user where id=$row[user_id]");
            $resultname = $sqlname->fetch_assoc();

            if ($row['post_id'] == $_GET['id']) {
                echo "<div class='card text-dark bg-white border-info mt-3'>
                        <div class='card-header bg-info text-white'>ความคิดเห็นที่ $num</div>
                        <div class='card-body'>$row[content]<br><br>";      
                if($resultname){
                    echo "$resultname[name] - $row[post_date]</div></div>";
                }
                $num++;
            }
        }
        $conn = null;
        ?>

        <!-- ช่องแสดงความคิดเห็น -->
        <?php 
        if(!isset($_SESSION['id'])){
        ?>
        <?php 
        }else{ ?> 
        <div class="card text-dark bg-white border-success mt-3">
            <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
            <div class="card-body">
                <form action="post_save.php" method="post">
                    <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-10">
                            <textarea class="form-control" name="comment" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-success btn-sm text-white"><i class="bi bi-box-arrow-up-right me-1"></i>ส่งข้อความ</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>
        <div style="text-align: center;" class="mt-3">
            <p><a href="index.php">กลับไปที่หน้าหลัก</a></p>
        </div>
    </div>
</body>

</html>
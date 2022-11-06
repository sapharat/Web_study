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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>First Page</title>
    <style>
        .loginLink {
            float: right;
        }
    </style>
    <script>
        function myFunction() {
            let r = confirm("ต้องการจะลบจริงหรือไม่");
            return r;
        }
    </script>
</head>

<body>
    <div class="container">
        <form>
            <h1>Sapharat Webboard</h1>
            <hr>
            <?php include "nav.php";
            if (isset($_SESSION['id'])) { ?>

                <div class="d-flex justify-content-between">
                <?php
                } 
                ?>
                <div>
                    <label for="">หมวดหมู่</label>
                    <span class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdown2" data-bs-toggle="dropdown" aria-expanded="fales">--ทั้งหมด--</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdown2">
                            <li><a href="#" class="dropdown-item">ทั้งหมด</a></li>
                            <li><a href="#" class="dropdown-item">เรื่องเรียน</a></li>
                            <li><a href="#" class="dropdown-item">เรื่องทั่วไป</a></li>
                        </ul>
                    </span>
                </div>
                <?php
                if (isset($_SESSION['id'])) {
                    ?>
                    <span class="">
                        <a href="newpost.php" type="button" class="btn btn-success btn-sm"><i class="bi bi-plus"></i>สร้างกระทู้ใหม่</a>
                    </span>
                </div>
                
            <?php } ?>
            <table class="table table-striped">
                <?php
                if (empty($_SESSION['role'])) {
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                    $sql = "SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date FROM post as t1 INNER JOIN user as t2 ON (t1.user_id=t2.id) INNER JOIN category as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch()) {
                        echo "<tr><td>[$row[0] ]<a style=text-decoration:none href=post.php?id=$row[1]>$row[2]</a><br>$row[3] - $row[4] <a><i></i></a></td></tr>";
                    }
                } else {
                    if ($_SESSION['role'] == "a") {
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $sql = "SELECT t3.name, t1.id, t1.title, t2.login, t1.post_date FROM post as t1 INNER JOIN user as t2 ON (t1.user_id = t2.id) INNER JOIN category as t3 ON (t1.cat_id = t3.id) ORDER BY t1.post_date DESC";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch()) {
                            echo "<tr><td>[ $row[0] ] <a style=text-decoration:none href=post.php?id=$row[1]>$row[2]</a><br>$row[3] - $row[4]</td> ?>
                            <td><a delete.php?id=$row[1] class='btn btn-danger bn-sm' onclick='return myFunction();'><i class='bi bi-trash3'></i></a></td></tr>";
                        }
                    }
                }
                $conn = null;
                ?>
            </table>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</script>

</html>
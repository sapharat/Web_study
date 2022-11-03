<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <style>
    .loginLink {
        float: right;
    }
    </style>
</head>

<body>
    <div class="container">


        <form>
            <h1>Sapharat Webboard</h1>
            <hr>
            <?php include "nav.php"; 
        if(isset($_SESSION['id'])){ ?>

            <div class="d-flex justify-content-between">
                <?php } ?>
                <div>

                    <label for="">หมวดหมู่</label>
                    <span class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdown2"
                            data-bs-toggle="dropdown" aria-expanded="fales">--ทั้งหมด--</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdown2">
                            <li><a href="#" class="dropdown-item">ทั้งหมด</a></li>
                            <li><a href="#" class="dropdown-item">เรื่องเรียน</a></li>
                            <li><a href="#" class="dropdown-item">เรื่องทั่วไป</a></li>

                        </ul>
                    </span>
                </div>

                <?php 
        if(isset($_SESSION['id'])){
        ?>
                <span class="">
                    <a href="newpost.php" type="button" class="btn btn-success btn-sm"><i class="bi bi-plus"></i>
                        สร้างกระทู้ใหม่</a>
                </span>

            </div>

            <?php } ?>
            <table class="table table-striped">

                <?php
        for ($i = 1 ; $i <= 10 ; $i++){
            ?>
                <tr>
                    <td class="">
                        <a style="text-decoration:none" href="post.php?id=<?php echo $i?>">กระทู้ที่ <?php echo $i?></a>


                        <?php 
                if(empty($_SESSION['role'])){
                   
                }else{

                    if($_SESSION['role'] == 'a'){
                            ?>
                    <td>
                        <a href="delete.php?id=<?php echo $i?>" class="btn btn-danger btn-sm" type="button">ลบ</a>
                    </td>

                    <?php
                    }
                }
        ?>
                    </td>
                </tr>

                <?php 
       }
       ?>

            </table>

        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
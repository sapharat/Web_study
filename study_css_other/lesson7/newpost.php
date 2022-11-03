<?php
session_start();
if(empty($_SESSION['role'])){
    header('location:index.php');
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newpost Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <style>
    table,td {
        border: 0;
        border-collapse: collapse;
        padding-top:5px ;
    }
    .Center {
        text-align: center;
      }
    </style>
</head>

<body>
   <div class="container">
   <h1 class="Center">Teera Webboard</h1>
        <hr />
    <?php include "nav.php"?>
    <br>
    <div class="card text-dark bg-white border-info">
        <div class="card-header bg-info text-white">ตั้งกระทู้ใหม่</div>
        <div class="card-body">
            <form action="newpost_save.php">
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                    <div class="col-lg-9">
                        <select name="category" id="" class="form-select">
                           <?php 
                            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                            $sql = "SELECT * FROM category";
                            foreach($conn->query($sql) as $row){
                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                            }$conn=null;
                           
                           ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-lg-3 col-form-label">หัวข้อ : </label>
                    <div class="col-lg-9">
                        <input type="text" name="topic" class="form-control" require>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-lg-3 col-form-label">เนื้อหา : </label>
                    <div class="col-lg-9">
                        <textarea type="text" name="comment" rows="8" class="form-control" require></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <button class="btn btn-info btn-sm text-white">
                                <i class="bi bi-caret-right-square"></i>
                                บันทึกข้อความ
                            </button>
                        </center>
                    </div>
                </div> 
            </form>
        </div>
    </div>
    
   </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</html>
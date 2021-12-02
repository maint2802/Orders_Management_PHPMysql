<?php 
    include 'config.php';
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }

// load data into mysql -----------------
    if(isset($_POST["edit"])){
        $idOrder = $_POST["idOrder"];
        $pic = $_POST["pic"];
        $name = $_POST["name"];
        $type = $_POST["type"];
        $receipt = $_POST["receipt"];
        $status = $_POST["status"];

        if($idOrder != "" &&$pic != "" && $name != "" && $type != "" && $receipt != "" && $status != "") {
            $sql = "UPDATE donhang SET idOrder = '$idOrder', pic = '$pic', name = '$name', type = '$type', receipt = '$receipt', status = '$status' WHERE id = '$id'";
            $qr = mysqli_query($conn, $sql);
            header("location: ./admin.php");
        }
    }



    
// get data having id clicked-----------------------
    $sql = "SELECT * FROM donhang WHERE id = $id";
    $qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($qr);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa hóa đơn</title>
    <link rel="shortcut icon" href="../assets/img/Screenshot (597).png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <div id="edit-order-dialog" class="overlay" style="display: block;">
        <form action="" method="POST" class="form-dialog" id="edit-form-dialog">
             <h2 class="form-title">Chỉnh sửa đơn hàng</h2> 
             <div class="form-input">
                 <div class="form-input-item">
                     <label for="">Mã đơn hàng</label>
                     <input value="<?php echo $row['idOrder']?>" name="idOrder" type="text" class="form-control" placeholder="">
                 </div>
                 <div class="form-input-item">
                     <label for="">Hình ảnh</label>
                     <input value="<?php echo $row['pic']?>" name="pic" type="text" class="form-control" placeholder="">
                 </div>
                 <div class="form-input-item">
                     <label for="">Tên đơn hàng</label>
                     <input value="<?php echo $row['name']?>" name="name" type="text" class="form-control" placeholder="">
                 </div>
                 <div class="form-input-item">
                     <label for="">Phân loại</label>
                     <input value="<?php echo $row['type']?>" name="type" type="text" class="form-control" placeholder="">
                 </div>
                 <div class="form-input-item">
                     <label for="">Hóa đơn</label>
                     <input value="<?php echo $row['receipt']?>" name="receipt" type="text" class="form-control" placeholder="">
                 </div>
                 <div class="form-input-item">
                     <label for="">Tình trạng</label>
                     <input value="<?php echo $row['status']?>" name="status" type="text" class="form-control" placeholder="">
                 </div>
 
             </div>
             <div class="form-footer">
                 <button class="btn btn-lg m-btn" type="submit" name="edit" value="add">Lưu</button>
                 <a href="./admin.php" id="btn-cancel" class="btn btn-lg m-btn-cancel" >Hủy</a>
             </div>
        </form>
    </div>
 
</body>
</html>
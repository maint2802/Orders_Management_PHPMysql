<?php 
    include 'config.php';
    if(isset($_POST["add"])){
        $idOrder = $_POST["idOrder"];
        $pic = $_POST["pic"];
        $name = $_POST["name"];
        $type = $_POST["type"];
        $receipt = $_POST["receipt"];
        $status = $_POST["status"];

        if($idOrder != "" &&$pic != "" && $name != "" && $type != "" && $receipt != "" && $status != "") {
            $sql = "INSERT INTO donhang(idOrder, pic, name, type, receipt, status) VALUES('$idOrder', '$pic', '$name', '$type', '$receipt', '$status')";
            $qr = mysqli_query($conn, $sql);
            header("location: ./admin.php");
        }
    }
?>
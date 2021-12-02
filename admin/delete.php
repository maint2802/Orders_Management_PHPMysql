<?php 
    include 'config.php';
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    $sql = "DELETE FROM donhang WHERE id = '$id'";
    $qr = mysqli_query($conn, $sql);
    header("location: admin.php");
?>
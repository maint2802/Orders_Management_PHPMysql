<?php 
    include 'config.php';
    session_start();
    if(isset($_POST["submit"]) && $_POST["username"]!='' && $_POST["password"]!=''){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $user = mysqli_query($conn, $sql);
        if(mysqli_num_rows($user)>0){
            $_SESSION["user"] = $username;
            header("location: ./admin.php");
        }else{
            unset($_SESSION["user"]);
            // header("location: ../index.html");
            echo "<script> alert('Bạn đã đăng nhập sai. Vui lòng đăng nhập lại!'); window.location.href = '../index.html'; </script>";
        }
    }else{
        unset($_SESSION["user"]);
            header("location: ../index.html");
    }
?>
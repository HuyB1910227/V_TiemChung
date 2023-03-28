<?php 
    session_start();
    if(isset($_SESSION['DangNhap'])){
        unset($_SESSION['DangNhap']);
        header('Location: dangnhap.php');
    }else{
        echo "Lỗi đăng xuất";
    }
?>
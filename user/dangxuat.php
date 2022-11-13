<?php 
    session_start();
    if(isset($_SESSION['btnDangNhap'])){
        unset($_SESSION['btnDangNhap']);
        header('Location: index.php');
    }else{
        echo "Lỗi đăng xuất";
    }
?>
<?php 
    // session_start();
    // if(isset($_SESSION['DangNhap'])){
    //     unset($_SESSION['DangNhap']);
    //     unset($_SESSION["TaiKhoan"]);
    //     header('Location: dangnhap.php');
    // }else{
    //     echo "Lỗi đăng xuất";
    // }

    session_start();
    if(isset($_SESSION['DangNhap'])){
        unset($_SESSION['DangNhap']);
        header('Location: dangnhap.php');
    }else{
        echo "Lỗi đăng xuất";
    }
?>
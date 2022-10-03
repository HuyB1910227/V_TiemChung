<?php
    
    // session_start();
    // if(!isset($_SESSION['DangNhap'])){
    //     if($_SESSION["TaiKhoan"] != "admin"){
    //         header('Location: /V_TiemChung/backend/dangnhap.php');
    //     }
        
    // }

    require_once '../../db_connect.php';
    //require_once '../../../db_connect.php';
    session_start();
    if(!isset($_SESSION['DangNhap'])){
        if($_SESSION != "admin"){
            header("Location: ../dangnhap.php");
        }
        
    }

?>
   <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">V-Tiêm chủng</a>
        <a href="/V_TiemChung/backend/logout.php" class="btn btn-primary">Đăng xuất</a>
    </nav>   
    
    
  

<?php
    
    // session_start();
    // if(!isset($_SESSION['DangNhap'])){
    //     if($_SESSION["TaiKhoan"] != "admin"){
    //         header('Location: /V_TiemChung/backend/dangnhap.php');
    //     }
        
    // }

use TC\OBS\TaiKhoan;

    require_once '../../db_connect.php';
    //require_once '../../../db_connect.php';
    session_start();
    if(!isset($_SESSION['DangNhap'])){
        if($_SESSION != "admin"){
            header("Location: ../dangnhap.php");
        }
        
    }
    $id = $_SESSION['DangNhap'];
    $admin = new TaiKhoan($PDO);
    $admin->find($id)

?>
   <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">V-Tiêm chủng</a>
        <div class="ml-auto ">
            <div class="d-inline-block mr-2">
           <span class="text-center">Xin chào!</span>  <br>
            <span class="text-primary"><?= $admin->hoten?></span>
            </div>
            
            <a href="/V_TiemChung/backend/logout.php" class="btn btn-primary align-top">Đăng xuất</a>
        </div>
        
    </nav>   
    
    
  

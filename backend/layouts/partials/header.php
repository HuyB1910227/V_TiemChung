<?php

// session_start();
// if(!isset($_SESSION['DangNhap'])){
//     if($_SESSION["TaiKhoan"] != "admin"){
//         header('Location: /V_TiemChung/backend/dangnhap.php');
//     }

// }

use TC\OBS\TaiKhoan;

require_once '../../db_connect.php';
session_start();
if (!isset($_SESSION['DangNhap'])) {
    if ($_SESSION != "admin") {
        header("Location: ../dangnhap.php");
    }
}
$id = $_SESSION['DangNhap'];
$admin = new TaiKhoan($PDO);
$admin->find($id);
$today = date('Y-m-d');
$today = strtotime($today);

?>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">V-Tiêm chủng</a>
    <!-- <div class="ml-auto ">
            <div class="d-inline-block mr-2">
           <span class="text-center">Xin chào!</span>  <br>
            <span class="text-primary"><?= $admin->hoten ?></span>
            </div>
            
            <a href="/V_TiemChung/backend/logout.php" class="btn btn-primary align-top">Đăng xuất</a>
        </div> -->
    <div class="ml-auto">
        <div class="d-inline-block mr-2">
            <span class="text-center">&nbsp; &nbsp; Xin chào!</span> <br>
            <span class="text-primary text-center"><?= $admin->hoten ?></span>
        </div>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown ">
        <div class="nav-link dropdown-toggle border " href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <span class="nav-log "><img src="/V_TiemChung/assets/uploads/<?= $admin->avatar ?>" alt="" class="rounded-circle" style="width:30px; height:30px"> &nbsp; <?= $admin->ten ?></span> |
        </div>
        <div class="dropdown-menu shadow-lg">
            <a href="/V_TiemChung/backend/logout.php" class="dropdown-item "><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
            <!-- <a href="/V_TiemChung/frontend/pages/suataikhoan.php" class="dropdown-item "><i class="fa-solid fa-gear"></i> Sửa tài khoản</a> -->

            <!-- <a class="dropdown-item" href="/V_TiemChung/frontend/pages/dangkytiemchungnt.php">Đăng ký tiêm cho người thân</a> -->
        </div>
    </li>
    </ul>
    

</nav>
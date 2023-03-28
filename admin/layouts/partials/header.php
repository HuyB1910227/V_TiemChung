<?php
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
            <a href="/V_TiemChung/admin/logout.php" class="dropdown-item "><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
        </div>
    </li>
    </ul>
    

</nav>
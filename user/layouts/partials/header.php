<?php
require_once '../../db_connect.php';

session_start();
if (!isset($_SESSION['btnDangNhap'])) {
    if ($_SESSION != "user") {
        header("Location: ../dangnhap.php");
    }
}

use TC\OBS\CoSoTiem;
use TC\OBS\TaiKhoan;
use TC\OBS\KhachHang;
use TC\OBS\LichSuTiem;
use TC\OBS\PhieuDangKy;
use TC\OBS\ThongTinTiem;
use TC\OBS\TinTuc;
use TC\OBS\Vaccine;

$user = new TaiKhoan($PDO);
$id = $_SESSION['btnDangNhap'];
$user->find($id);
$kh = new KhachHang($PDO);
$kh->find($user->nd_id);

$phieudk = new PhieuDangKy($PDO);

$arrpdk = $phieudk->selectFromUser($user->nd_id);

$lst = new LichSuTiem($PDO);
$arrLST = $lst->selectFromUser($user->nd_id);
$tt = new ThongTinTiem($PDO);
$vaccine = new Vaccine($PDO);
$coso = new CoSoTiem($PDO);

$today = date('Y-m-d');
$today = strtotime($today);


$dsnguoithan = $kh->findFamily();

$tintuc = new TinTuc($PDO);
$dstintuc = $tintuc->all();



?>

<header class="fixed-top">
    <div class="container-lg ">
        <nav class="navbar navbar-expand-md navbar-light row">
            <a class="navbar-brand" href="">V-Tiêm chủng</a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse sha" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/V_TiemChung/user/pages/trangchu.php">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Đăng ký tiêm
                        </a>
                        <div class="dropdown-menu shadow-lg">
                            <a class="dropdown-item" href="/V_TiemChung/user/pages/dangkytiemchung.php">Đăng ký tiêm cho cá nhân</a>
                            <a class="dropdown-item" href="/V_TiemChung/user/pages/dangkytiemchungnt.php">Đăng ký tiêm cho người thân</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Quản lý
                        </a>
                        <div class="dropdown-menu shadow-lg">
                            <a class="dropdown-item" href="/V_TiemChung/user/pages/thongtincanhan.php">Thông tin cá nhân</a>
                            <a class="dropdown-item" href="/V_TiemChung/user/pages/chungnhantiemchung.php">Chứng nhận tiêm</a>
                            <a class="dropdown-item" href="/V_TiemChung/user/pages/lichsutiemchung.php">Lịch sử tiêm chủng</a>
                            <a class="dropdown-item" href="/V_TiemChung/user/pages/quanlydangkytiem.php">Đăng ký tiêm</a>
                            <a class="dropdown-item" href="/V_TiemChung/user/pages/quanlynguoithan.php">Người thân</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ">
                        <div class="nav-link dropdown-toggle border " href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <span class="nav-log "><img src="/V_TiemChung/assets/uploads/<?= $user->avatar ?>" alt="" class="rounded-circle" style="width:30px; height:30px"> &nbsp; <?= $user->ten ?></span> |
                        </div>
                        <div class="dropdown-menu shadow-lg">
                            <a href="/V_TiemChung/user/dangxuat.php" class="dropdown-item "><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                            <a href="/V_TiemChung/user/pages/suataikhoan.php" class="dropdown-item "><i class="fa-solid fa-gear"></i> Sửa tài khoản</a>

                        </div>
                    </li>

                </ul>

            </div>
        </nav>
    </div>
</header>
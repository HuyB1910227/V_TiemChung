<?php 
    require_once '../../db_connect.php';
    //require_once '../../../db_connect.php';
    session_start();
    if(!isset($_SESSION['btnDangNhap'])){
        if($_SESSION != "user"){
            header("Location: ../dangnhap.php");
        }
        
    }

use TC\OBS\CoSoTiem;
use TC\OBS\TaiKhoan;
    use TC\OBS\KhachHang;
    use TC\OBS\LichSuTiem;
    use TC\OBS\PhieuDangKy;
    use TC\OBS\ThongTinTiem;
    use TC\OBS\Vaccine;

    $user = new TaiKhoan($PDO);
    $id = $_SESSION['btnDangNhap'];
    $user->find($id);
    $kh = new KhachHang($PDO);
    $kh->find($user->kh_id);   

    $phieudk = new PhieuDangKy($PDO);
    //echo "$user->kh_id";
    $arrpdk = $phieudk->selectFromUser($user->kh_id);
    // $arrpdk = $phieudk->selectall(1);
    $lst = new LichSuTiem($PDO);
    $arrLST = $lst->selectFromUser($user->kh_id);
    $tt = new ThongTinTiem($PDO);
    $vaccine = new Vaccine($PDO);
    $coso = new CoSoTiem($PDO);
    //include __DIR__ . "/../../../assets/frontend/css/style_navbar.css";
    $today = date('Y-m-d');
    $today = strtotime($today);

    // $nguoithan = new KhachHang($PDO);
    $dsnguoithan = $kh->findFamily();
    

    
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
                        <a class="nav-link" href="/V_TiemChung/frontend/pages/trangchu.php">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/V_TiemChung/frontend/pages/dangkytiemchung.php">Đăng ký tiêm</a>
                    </li> -->
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Đăng ký tiêm
                        </a>
                        <div class="dropdown-menu shadow-lg" >
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/dangkytiemchung.php">Đăng ký tiêm cho cá nhân</a>
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/dangkytiemchungnt.php">Đăng ký tiêm cho người thân</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Quản lý
                        </a>
                        <div class="dropdown-menu shadow-lg">
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/thongtincanhan.php">Thông tin cá nhân</a>
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/chungnhantiemchung.php">Chứng nhận tiêm</a>
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/lichsutiemchung.php">Lịch sử tiêm chủng</a>
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/quanlydangkytiem.php">Đăng ký tiêm</a>
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/quanlynguoithan.php">Người thân</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ">
                        <div class="nav-link dropdown-toggle border " href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                          <span class="nav-log "><img src="/V_TiemChung/assets/uploads/<?=$user->avatar?>" alt="" class="rounded-circle" style="width:30px; height:30px"> &nbsp; <?= $user->ten ?></span> |
                        </div>
                        <div class="dropdown-menu shadow-lg" >
                            <a href="/V_TiemChung/frontend/dangxuat.php" class="dropdown-item "><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                            <a href="/V_TiemChung/frontend/pages/suataikhoan.php" class="dropdown-item "><i class="fa-solid fa-gear"></i> Sửa tài khoản</a>

                            <!-- <a class="dropdown-item" href="/V_TiemChung/frontend/pages/dangkytiemchungnt.php">Đăng ký tiêm cho người thân</a> -->
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Tài liệu</a>
                    </li> -->
                </ul>
                <!-- <a href="/V_TiemChung/frontend/dangxuat.php" class="btn btn-primary">Đăng xuất</a> -->
                <!-- <button class="btn btn-primary">Đăng xuất</button> -->
            </div>
        </nav>
    </div>
</header>


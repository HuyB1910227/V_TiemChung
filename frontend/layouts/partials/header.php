<?php 
    require_once '../../db_connect.php';
    session_start();
    if(!isset($_SESSION['btnDangNhap'])){
        
        header("Location: ../dangnhap.php");
    }

    use TC\OBS\TaiKhoan;
    use TC\OBS\KhachHang;

    $user = new TaiKhoan($PDO);
    $id = $_SESSION['btnDangNhap'];
    $user->find($id);
    $kh = new KhachHang($PDO);
    $kh->find($user->kh_id);   



?>

<header class="row bg-light">
    <div class="container-lg">
        <nav class="navbar navbar-expand-md navbar-light bg-light row">
            <a class="navbar-brand" href="#">V-Tiêm chủng</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/V_TiemChung/frontend/pages/trangchu.php">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/V_TiemChung/frontend/pages/dangkytiemchung.php">Đăng ký tiêm</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Quản lý
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/thongtincanhan.php">Thông tin cá nhân</a>
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/chungnhantiemchung.php">Chứng nhận tiêm</a>
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/lichsutiemchung.php">Lịch sử tiêm chủng</a>
                            <a class="dropdown-item" href="/V_TiemChung/frontend/pages/quanlydangkytiem.php">Đăng ký tiêm</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tài liệu</a>
                    </li>
                </ul>
                <a href="/V_TiemChung/frontend/dangxuat.php" class="btn btn-primary">Đăng xuất</a>
                <!-- <button class="btn btn-primary">Đăng xuất</button> -->
            </div>
        </nav>
    </div>
</header>
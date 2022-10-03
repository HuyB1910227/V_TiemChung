<?php 
    
    require '../db_connect.php';
    session_start();

    use TC\OBS\TaiKhoan;

    $admin = new TaiKhoan($PDO);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $result = $admin->loginAdmin($_POST['txtTenDangNhap'], $_POST['pwd']);
        if($result != null){
            echo "Thành công.";
            // $user->session();
            $_SESSION['DangNhap'] = $admin->getID();
            $_SESSION['TaiKhoan'] = "admin";
            header("Location: ./quanlydangkytiem/index.php");
        } else {
            echo "Đăng nhập thất bại";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/layouts/meta.php'; ?>
    <title>Quản lý cơ sở tiêm</title>
    <?php include_once __DIR__ . '/layouts/styles.php'; ?>
</head>

<body >
    <div class="container justify-content-center w-50 border p-5">
    <h1 class="text-center">Đăng nhập</h1>
    <form action="dangnhap.php" method="post" class="">
        <div class="form-group">
        <label for="txtTenDangNhap">Tên đăng nhập:</label><br>
        <input type="text" name="txtTenDangNhap" class="form-control">
        </div>
        <div class="form-group">
        <label for="pwd">Mật khẩu:</label>
        <input type="password" name="pwd" class="form-control">
        </div>
        <button type="submit" name="DangNhap" class="btn btn-primary rounded-pill w-100">Đăng nhập</button>
    </form>
    </div>
    
    
    
    




    <!-- <?php include_once __DIR__ . '/layouts/partials/footer.php'; ?> -->

    <?php include_once __DIR__ . '/layouts/scripts.php'; ?>
</body>

</html>
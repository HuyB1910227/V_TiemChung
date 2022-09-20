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
        <button type="submit" name="btnDangNhap" class="btn btn-primary rounded-pill w-100">Đăng nhập</button>
    </form>
    </div>
    
    
    <?php 
    session_start();
    if(isset($_POST['btnDangNhap'])){
        include_once __DIR__.'/../dbconnect.php';
        $tenTaiKhoan = addslashes($_POST['txtTenDangNhap']) ;
        $matKhau = addslashes($_POST['pwd']);
        

        $sql = "SELECT * FROM tai_khoan 
        WHERE tk_ten = '$tenTaiKhoan' 
        AND tk_matkhau = '$matKhau'
        AND tk_vaitro = 1;";

        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(is_null($user)){
            header('location:dangnhap.php');
        } else {
            $_SESSION['btnDangNhap'] = $tenTaiKhoan;
            header('location:dashboard.php');
        }

    }
    ?>
    




    <!-- <?php include_once __DIR__ . '/layouts/partials/footer.php'; ?> -->

    <?php include_once __DIR__ . '/layouts/scripts.php'; ?>
</body>

</html>
<?php 
    require '../db_connect.php';
    session_start();

use TC\OBS\TaiKhoan;

    $user = new TaiKhoan($PDO);
    
    // if($user->session()){
    //     header("Location: dangnhap.php");
    // }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $result = $user->login3($_POST['sdt'], $_POST['pwd']);
        if($result != null){
            echo "Thành công.";
            // $user->session();
            $_SESSION['btnDangNhap'] = $user->getID();
            header("Location: pages/trangchu.php");
        } else {
            echo "Thất bại liu liu";
        }
        // echo $_POST['sdt'], $_POST['pwd'];
        // if($n == 1){
        //     echo "Thất bại.";
            
        // } else {
        //     
        // }
        // var_dump($user);
        
        // if($login == 1){
        //     echo "thanh cong";
        //     var_dump($user);
        //     // header("Location: index.php");
        // } else {
        //     echo "Failed";
        // }
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free-6.2.0-web/css/all.css">
    <style>
        .card-log-in {
            width: 500px;
        }
    </style>
</head>

<body class="container-fluid" style="position: relative;">

    <div class="row bg-info align-content-center justify-content-center">
        <h2 class="text-white">Xin chào</h2>
        
    </div>
    <div class="row p-5">
        <div class="border card p-3 card-log-in m-auto">
            <div class="col-12">
                <h3 class="text-center font-weight-bolder text-black-25">Đăng nhập</h3>
            </div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="sdt">Số điện thoại</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập vào số điện thoại....">
                    </div>

                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="pwd">Mật khẩu</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Nhập vào mật khẩu....">
                    </div>

                </div>

                <button type="submit" class="btn btn-primary rounded-pill w-100" name="btnDangNhap">Đăng nhập</button>
            </form>
            <br>
            <p class="text-center">Bạn chưa có tài khoản? Hãy đăng ký ngay</p>
            <a class="btn btn-light text-dark-10 w-100 rounded-pill" href="dangky.html">Đăng ký</a>
        </div>
    </div>



    <!-- <footer class="row bg-primary text-white">
        <div class="col">
            <p>&copy; Bản quyền thuộc về Đỗ Huy</p>
            <p>Phát triển bởi Đỗ huy</p>
        </div>
        <div class="col">
            <p>Số điện thoại: 0932988029</p>
            <p>Gmail: huydo@gmail.com</p>
        </div>

    </footer> -->




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
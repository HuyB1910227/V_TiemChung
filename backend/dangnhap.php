<?php

require '../db_connect.php';
session_start();

use TC\OBS\TaiKhoan;

$admin = new TaiKhoan($PDO);
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $admin->loginAdmin($_POST['txtTenDangNhap'], $_POST['pwd']);
    if ($result != null) {
        // echo "Thành công.";
        // $user->session();
        $_SESSION['DangNhap'] = $admin->getID();
        $_SESSION['TaiKhoan'] = "admin";
        header("Location: ./quanlydangkytiem/index.php");
    } else {
        $error = "Tên đặng nhập hoặc mật khẩu chưa đúng!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/layouts/meta.php'; ?>
    <title>Quản lý cơ sở tiêm</title>
    <?php include_once __DIR__ . '/layouts/styles.php'; ?>
    <style>
        .card-log-in {
            width: 500px;
            border-radius: 10px;
            box-shadow: 1px 2px 10px grey;

            
        }
        .card-log-in label{
            font-weight: bolder;
        }
        .card-log-in h3{
            color: #616AC6;
        }
    </style>
</head>

<body class="container-fluid">
    <!-- <div class="container justify-content-center border p-5 " style="width: 600px;">
        <h1 class="text-center">Đăng nhập</h1>
        <form action="dangnhap.php" method="post" class="" id="frmDangNhap">
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
    </div> -->

    <div class="row p-5">
        <div class="p-3 card-log-in m-auto">
            <div class="col-12">
                <h3 class="text-center font-weight-bolder text-black-25">Đăng nhập</h3>
            </div>
            <div>
                <span class="text-danger"><?= $error ?></span>
            </div>
            <form action="dangnhap.php" method="post" id="frmDangNhap">

                <div class="form-group">
                    <label for="txtTenDangNhap">Tên đăng nhập:</label><br>
                    <input type="text" name="txtTenDangNhap" class="form-control" value="<?php echo (isset($_POST["txtTenDangNhap"])) ?  $_POST["txtTenDangNhap"] : ""; ?>">
                </div>


                <div class="form-group">
                    <label for="pwd">Mật khẩu:</label>
                    <input type="password" name="pwd" class="form-control" value="<?php echo (isset($_POST["pwd"])) ?  $_POST["pwd"] : ""; ?>">
                </div>

                <button type="submit" class="btn btn-primary rounded-pill w-100" name="btnDangNhap">Đăng nhập</button>
            </form>
            <!-- <br>
            <p class="text-center">Bạn chưa có tài khoản? Hãy đăng ký ngay</p>
            <a class="btn btn-light text-dark-10 w-100 rounded-pill" href="./dangky.php">Đăng ký</a> -->
        </div>
    </div>








    <!-- <?php include_once __DIR__ . '/layouts/partials/footer.php'; ?> -->

    <?php include_once __DIR__ . '/layouts/scripts.php'; ?>

    <script>
        $(document).ready(function() {
            $('#frmDangNhap').validate({
                rules: {

                    txtTenDangNhap: {
                        required: true
                    },


                    pwd: {
                        required: true
                    },

                },
                messages: {


                    txtTenDangNhap: {
                        required: "Bạn chưa nhập tên đăng nhập!",

                    },

                    pwd: {
                        required: "Bạn chưa nhập mật khẩu",

                    },


                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "radio") {
                        error.insertAfter(element.siblings("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
        })
    </script>
</body>

</html>
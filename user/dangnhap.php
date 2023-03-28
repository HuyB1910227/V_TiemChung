<?php 
    require '../db_connect.php';
    session_start();

    use TC\OBS\TaiKhoan;

    $user = new TaiKhoan($PDO);
    
    
        $error = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(is_numeric($_POST['sdt']))
            $result = $user->login3($_POST['sdt'], $_POST['pwd']);
        else
            $result = $user->loginByName($_POST['sdt'], $_POST['pwd']);
        if($result != null){
            
            $_SESSION['btnDangNhap'] = $user->getID();
            $_SESSION['TaiKhoan'] = "user";
            header("Location: pages/trangchu.php");
        } else {
            $error = "Tên đăng nhập hoặc mật khẩu chưa chính xác";
        }
        
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
    <link rel="stylesheet" href="/V_TiemChung/assets/vendor/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: roboto;
        }
        .card-log-in {
            width: 500px;
            border-radius: 10px;
            box-shadow: 1px 2px 10px grey;
            
        }
        .card-log-in h3{
            color: #616AC6;
        }
        .card-log-in label{
            font-weight: bolder;
        }
        span.required-fill-in{
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body class="container-fluid">

    
    <div class="row p-5">
        <div class="p-3 card-log-in m-auto">
            <div class="col-12">
                <h3 class="text-center font-weight-bolder text-black-25">ĐĂNG NHẬP</h3>
            </div>
            <div>
                <span class="text-danger"><?= $error ?></span>
            </div>
            <form action="" method="post" id="frmDangNhap">
                <div class="form-group">
                    <label for="sdt">Số điện thoại/ Tên đăng nhập <span class="required-fill-in">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập vào số điện thoại...." value="<?php echo (isset($_POST["sdt"])) ?  $_POST["sdt"] : ""; ?>">
                    </div>
                    

                </div>
                <div class="form-group">
                    <label for="pwd">Mật khẩu <span class="required-fill-in">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Nhập vào mật khẩu...." value="<?php echo (isset($_POST["pwd"])) ?  $_POST["pwd"] : ""; ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary rounded-pill w-100" name="btnDangNhap">Đăng nhập</button>
            </form>
            <br>
            <p class="text-center">Bạn chưa có tài khoản? Hãy đăng ký ngay</p>
            <a class="btn btn-light text-dark-10 w-100 rounded-pill" href="./dangky.php">Đăng ký</a>
        </div>
    </div>



  




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/V_TiemChung/assets/vendor/plugin_validate/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $('#frmDangNhap').validate({
                rules: {
                    
                    sdt: {
                        required: true,
                        
                    },
                    
                    
                    pwd:  { required: true},
					
                },
                messages: {
                   
                   
                    sdt: {
                        required: "Bạn chưa nhập vào số điện thoại hoặc tên dăng nhập",
                      
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
        });
    </script>
</body>

</html>
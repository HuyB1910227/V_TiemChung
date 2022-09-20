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

<body class="container-fluid border" style="position: relative;">

    <div class="row bg-info align-content-center justify-content-center">
        <h2 class="text-white">V-Tiêm chủng</h2>
    </div>
    <div class="row p-5">
        <div class="border card p-3 card-log-in m-auto">
            <div class="col-12">
                <h3 class="text-center font-weight-bolder text-black-25">Đăng ký</h3>
            </div>
            <form>
                <div class="form-group">
                    <label for="txtHoTen">Họ và tên</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="txtHoTen" name="txtHoTen" placeholder="Nhập vào họ tên....">
                    </div>

                    
                </div>
                <div class="form-group">
                    <label for="sdt">Số điện thoại</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập vào số điện thoại....">
                    </div>

                    
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
                <div class="form-group">
                    <label for="pwd">Nhập lại mật khẩu</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Nhập vào mật khẩu....">
                    </div>

                </div>

                <button type="submit" class="btn btn-primary rounded-pill w-100" name="btnDangKy">Đăng ký</button>
            </form>
            
        </div>
    </div>



    <footer class="row bg-primary text-white">
        <div class="col">
            <p>&copy; Bản quyền thuộc về Đỗ Huy</p>
            <p>Phát triển bởi Đỗ huy</p>
        </div>
        <div class="col">
            <p>Số điện thoại: 0932988029</p>
            <p>Gmail: huydo@gmail.com</p>
        </div>

    </footer>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
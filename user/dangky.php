<?php



require_once '../db_connect.php';


use TC\OBS\Vaccine;

$v = new Vaccine($PDO);
$arrVac = $v->all();


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
        body {
            font-family: roboto;

        }

        label {
            font-weight: bold;
        }

        .card-log-in {

            width: 1000px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px grey;
            background-color: white;

        }

        .card-log-in h3 {
            color: #616AC6;


        }

        .error-block {
            color: red;
            font-weight: lighter;
        }

        span.required-fill-in {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body class="container-fluid " style="position: relative;">
    <div class="container mt-2">
        <div class="p-3 m-auto card-log-in">
            <div class="col-12">
                <h3 class="text-center font-weight-bolder ">ĐĂNG KÝ</h3>
            </div>
            <form action="xulydangky.php" method="POST" id="signupForm">
                <div class="row">

                    <div class="col-12 col-sm-6">

                        <div class="form-group">
                            <label for="txtTen">Tên đăng nhập <span class="required-fill-in">*</span></label>
                            <div class="input-group">

                                <input type="text" class="form-control" id="txtTen" name="txtTen" placeholder="Nhập vào họ tên....">


                            </div>
                            <div class="error-block mt-1">
                                <p id="error_tendangnhap"></p>
                            </div>


                        </div>
                        <div class="form-group">
                            <label for="txtHoTen">Họ và tên <span class="required-fill-in">*</span></label>
                            <div class="input-group">
                                
                                <input type="text" class="form-control" id="txtHoTen" name="txtHoTen" placeholder="Nhập vào họ tên....">

                            </div>

                        </div>
                        <div class="form-group">
                            <label for="txtSoDienThoai">Số điện thoại <span class="required-fill-in">*</span></label>
                            <div class="input-group">
                                
                                <input type="text" class="form-control" id="txtSoDienThoai" name="txtSoDienThoai" placeholder="Nhập vào số điện thoại....">

                            </div>
                            <div class="error-block mt-1">
                                <p id="error_sdt"></p>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="dtNgaySinh">Ngày sinh <span class="required-fill-in">*</span></label>
                            <input type="date" name="dtNgaySinh" id="dtNgaySinh" placeholder="" class="form-control">

                        </div>
                        <label class="col-form-label gioitinh">Giới tính <span class="required-fill-in">*</span></label>
                        <br>
                        
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="0" class="form-check-input">
                            <label for="rdGioiTinh1" class="form-check-label">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="1" class="form-check-input">
                            <label for="rdGioiTinh2" class="form-check-label">Nữ </label>
                        </div>
                       

                        <div class="form-group ">
                            <label for="txtCCCD">Số hộ chiếu/CMND/CCCD <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtCCCD" id="txtCCCD" placeholder="Nhập vào Căn cước công dân..." class="form-control">

                        </div>

                        
                        <div class="form-group">
                            <label for="">Tỉnh/ Thành phố <span class="required-fill-in">*</span></label>
                            <select name="txtTP" id="txtTP" class="custom-select">
                                <option value="">--Chọn--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Quận/ Huyện <span class="required-fill-in">*</span></label>
                            <select name="txtQH" id="txtQH" class="custom-select">
                                <option value="">--Chọn--</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-12 col-sm-6">
                        
                        <div class="form-group">
                            <label for="">Phường/ Xã <span class="required-fill-in">*</span></label>
                            <select name="txtPX" id="txtPX" class="custom-select">
                                <option value="">--Chọn--</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="txtDiaChi">Địa chỉ <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtDiaChi" id="txtDiaChi" placeholder="Nhập vào địa chỉ..." class="form-control">

                        </div>



                        <div class="form-group ">
                            <label for="pwd">Mật khẩu <span class="required-fill-in">*</span></label>
                            <div class="input-group">
                                
                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Nhập vào mật khẩu....">
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="pwd">Nhập lại mật khẩu <span class="required-fill-in">*</span></label>
                            <div class="input-group">
                               
                                <input type="password" class="form-control" id="re_pwd" name="re_pwd" placeholder="Nhập vào mật khẩu....">
                            </div>

                        </div>
                        <hr>
                 
                        <div class="form-group ">
                            <label for="nbSoLanTiem">Số lần tiêm </label>
                            <div class="input-group">
                                
                                <input type="number" class="form-control" id="nbSoLanTiem" name="nbSoLanTiem" value="0" min="0">
                            </div>

                        </div>
                  
                        <div class="form-group ">
                            <label for="dtNgayTiemGanNhat">Ngày tiêm gần nhất </label>
                            <input type="date" name="dtNgayTiemGanNhat" id="dtNgayTiemGanNhat" placeholder="" class="form-control" readonly>

                        </div>
                        <label for="">Tên vắc xin tiêm gần nhất </label>
                        <select class="custom-select" name="slvaccineTiemGanNhat" disabled>
                            <option value="" selected>-- Chọn vacxin --</option>
                            <option value="0">Không rõ vaccine</option>

                            <?php foreach ($arrVac as $v) : ?>
                                <option value="<?= $v->layID() ?>"><?= $v->ten ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-light rounded-circle border border-primary text-primary " href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary rounded-pill w-100 mt-2 " name="btnDangKy" id="btnDangKy" disabled>Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="/V_TiemChung/assets/vendor/jquery/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/V_TiemChung/assets/vendor/plugin_validate/jquery.validate.js"></script>
    <script src="/V_TiemChung/assets/frontend/js/area.js"></script>
    <script src="../assets/frontend/js/validate-reg.js"></script>
</body>

</html>
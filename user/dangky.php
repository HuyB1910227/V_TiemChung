<?php

// use TC\OBS\KhachHang;
// use TC\OBS\TaiKhoan;

require_once '../db_connect.php';
// $newKH = new KhachHang($PDO);

// $errors = [];
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $newTK = new TaiKhoan($PDO);
//     $newTK->fill($_POST, 2);
//     if ($newTK->validate()) {

//     }
//     $errors = $newTK->getValidationErrors();
// }

use TC\OBS\Vaccine;
$v = new Vaccine($PDO);
$arrVac = $v->all();
// var_dump($arrVac);

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
        label{
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
        span.required-fill-in{
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body class="container-fluid " style="position: relative;">

    <!-- <div class="row bg-info align-content-center justify-content-center">
        <h2 class="text-white">V-Tiêm chủng</h2>
    </div> -->
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
                                <!-- <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div> -->
                                <input type="text" class="form-control" id="txtHoTen" name="txtHoTen" placeholder="Nhập vào họ tên....">

                            </div>

                        </div>
                        <div class="form-group">
                            <label for="txtSoDienThoai">Số điện thoại <span class="required-fill-in">*</span></label>
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        </div> -->
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
                        <!-- <input type="radio" name="rdGioiTinh" id="0"> Nam
                    <input type="radio" name="rdGioiTinh" id="1"> Nữ -->
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="0" class="form-check-input">
                            <label for="rdGioiTinh1" class="form-check-label">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="1" class="form-check-input">
                            <label for="rdGioiTinh2" class="form-check-label">Nữ </label>
                        </div>
                        <!-- <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="2" class="form-check-input">
                            <label for="rdGioiTinh0" class="form-check-label">Khác</label>
                        </div> -->

                        <div class="form-group ">
                            <label for="txtCCCD">Số hộ chiếu/CMND/CCCD <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtCCCD" id="txtCCCD" placeholder="Nhập vào Căn cước công dân..." class="form-control">

                        </div>

                        <div class="form-group ">
                            <label for="txtTP">Tỉnh/ Thành phố <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtTP" id="txtTP" placeholder="Nhập vào tỉnh / thành phố..." class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="txtQH">Quận/ Huyện <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtQH" id="txtQH" placeholder="Nhập vào quận / huyện..." class="form-control">

                        </div>

                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group ">
                            <label for="txtPX">Phường/ Xã <span class="required-fill-in">*</span> </label>
                            <input type="text" name="txtPX" id="txtPX" placeholder="Nhập vào phường / xã..." class="form-control">

                        </div>
                        <div class="form-group ">
                            <label for="txtDiaChi">Địa chỉ <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtDiaChi" id="txtDiaChi" placeholder="Nhập vào địa chỉ..." class="form-control">

                        </div>



                        <div class="form-group ">
                            <label for="pwd">Mật khẩu <span class="required-fill-in">*</span></label>
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div> -->
                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Nhập vào mật khẩu....">
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="pwd">Nhập lại mật khẩu <span class="required-fill-in">*</span></label>
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div> -->
                                <input type="password" class="form-control" id="re_pwd" name="re_pwd" placeholder="Nhập vào mật khẩu....">
                            </div>

                        </div>
                        <hr>
                        <!--  -->
                        <div class="form-group ">
                            <label for="nbSoLanTiem">Số lần tiêm </label>
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div> -->
                                <input type="number" class="form-control" id="nbSoLanTiem" name="nbSoLanTiem" value="0">
                            </div>

                        </div>
                        <!--  -->
                        <div class="form-group ">
                            <label for="dtNgayTiemGanNhat">Ngày tiêm gần nhất </label>
                            <input type="date" name="dtNgayTiemGanNhat" id="dtNgayTiemGanNhat" placeholder="" class="form-control" readonly>

                        </div>
                        <label for="">Loại vaccine tiêm gần nhất </label>
                        <select class="custom-select" name="slvaccineTiemGanNhat" disabled>
                            <option value="" selected>-- Chọn vacxin --</option>
                            <option value="0">Không rõ vaccine</option>
                           
                            <?php foreach ($arrVac as $v) : ?>
                                <option value="<?= $v->layID() ?>"><?= $v->ten ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>




                <!--  -->

                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-light rounded-circle border border-primary text-primary " href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary rounded-pill w-100 mt-2 " name="btnDangKy">Đăng ký</button>
                    </div>
                </div>





            </form>

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




    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> -->
    <script src="/V_TiemChung/assets/vendor/jquery/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/V_TiemChung/assets/vendor/plugin_validate/jquery.validate.js"></script>
    <script>
        $.validator.addMethod("minAge", function(value, element, min) {
            var today = new Date();
            var birthDate = new Date(value);
            var age = today.getFullYear() - birthDate.getFullYear();

            if (age > min + 1) {
                return true;
            }

            var m = today.getMonth() - birthDate.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            return age >= min;
        }, "You are not old enough!");
        $.validator.addMethod("reqVC", function(value) {
            var sc = new Date(value);
            var today = new Date();
            if ($("#nbSoLanTiem").val() == 0) {
                return true;
            }
            if ($("#nbSoLanTiem").val() != 0 && sc < today) {
                return true;
            }
            return false;
        }, "Nhập vào ngày tiêm gần nhất");
        // $.validator.setDefaults({
        //     submitHandler: function() {
        //         alert('Đã gửi thành công!');
        //     }
        // });
        $(document).ready(function() {

            $('#txtTen').on("keyup", function() {
                var userName = $(this).val();

                // console.log(userName)
                $.ajax({
                    url: 'scriptObject.php',
                    type: 'POST',
                    // dataType: 'json',
                    data: {
                        'userName': userName
                    },
                    success: function(response) {
                        var json = $.parseJSON(response);
                        if (json.status == 'error')
                            $('#error_tendangnhap').hide();
                        else if (json.status == 'success') {

                            $('#error_tendangnhap').show().text("Tên đăng nhập đã được sử dụng!");

                        }

                    }
                });

            });

            $('#txtSoDienThoai').on("keyup", function() {
                var userContact = $(this).val();

                console.log(userContact)
                $.ajax({
                    url: 'scriptObject.php',
                    type: 'POST',
                    // dataType: 'json',
                    data: {
                        'userContact': userContact
                    },
                    success: function(response) {
                        var json = $.parseJSON(response);
                        if (json.status == 'error')
                            $('#error_sdt').hide();
                        else if (json.status == 'success') {

                            $('#error_sdt').show().text("Số điện thoại đã được sử dụng!");

                        }

                    }
                });

            });

            $('#signupForm').validate({
                rules: {
                    txtTen: {
                        required: true,
                        minlength: 8
                    },
                    txtHoTen: {
                        required: true,
                        minlength: 8
                    },
                    txtSoDienThoai: {
                        required: true,
                        rangelength: [10, 10],
                        number: true
                    },
                    dtNgaySinh: {
                        required: true,
                        minAge: 18,
                    },
                    rdGioiTinh: {
                        required: true
                    },
                    txtTP: {
                        required: true
                    },
                    txtQH: {
                        required: true
                    },
                    txtPX: {
                        required: true
                    },
                    txtDiaChi: {
                        required: true
                    },
                    txtCCCD: {
                        required: true,
                        number: true,
                        rangelength: [12, 12],

                    },
                    pwd: {
                        required: true,
                        minlength: 8
                    },
                    re_pwd: {
                        required: true,
                        minlength: 8,
                        equalTo: "#pwd"
                    },
                    dtNgayTiemGanNhat: {
                        reqVC: true,
                    }
                },
                messages: {
                    txtTen: {
                        required: "Bạn chưa nhập vào tên đăng nhập",
                        minlength: "Tên đăng nhập phải có ít nhất 8 ký tự!"
                    },
                    txtHoTen: {
                        required: "Bạn chưa nhập vào họ và tên",
                        minlength: "Họ và tên phải có ít nhất 8 ký tự!"
                    },
                    txtSoDienThoai: {
                        required: "Bạn chưa nhập vào số điện thoại",
                        rangelength: "Tên đăng nhập phải có 10 ký tự số!",
                        number: "Số điện thoại sai định dạng"
                    },
                    dtNgaySinh: {
                        required: "Bạn chưa nhập vào ngày sinh",
                        minAge: "Ngày sinh không hợp lệ!"
                    },
                    rdGioiTinh: "Bạn chưa chọn giới tính",
                    txtTP: {
                        required: "Bạn chưa nhập tỉnh hoặc Thành Phố",
                    },
                    txtQH: {
                        required: "Bạn chưa nhập Quận hoặc Huyện",
                    },
                    txtPX: {
                        required: "Bạn chưa nhập Phường hoặc Xã",
                    },
                    txtDiaChi: {
                        required: "Bạn chưa nhập địa chỉ",
                    },
                    txtCCCD: {
                        required: "Bạn chưa nhập vào căn cước công dân",
                        rangelength: "Căn cước công dân phải có 12 ký tự số!",
                        number: "Căn cước công dân sai định dạng"
                    },
                    pwd: {
                        required: "Bạn chưa nhập mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 8 ký tự!",
                    },
                    re_pwd: {
                        required: "Bạn chưa nhập mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 8 ký tự!",
                        equalTo: "Mật khẩu không trùng khớp với mật khẩu vừa nhập!"
                    },

                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    if (element.prop("name") === "rdGioiTinh") {
                        error.insertAfter(element.parent("div").siblings("label.gioitinh"));
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

            var inputSLT = $('input[name="nbSoLanTiem"]');
            var inputNTGN = $('input[name="dtNgayTiemGanNhat"]');
            var inputVTGN = $('select[name="slvaccineTiemGanNhat"]');
            console.log(inputVTGN);
            // console.log(inputNTGN);
            inputSLT.on("keyup", function() {
                if (inputSLT.val() == 0) {
                    inputNTGN.attr("readonly", true);
                    // inputVTGN.val("");
                    inputVTGN.attr('disabled','disabled');
                } else {
                    inputNTGN.removeAttr("readonly");
                    inputVTGN.removeAttr("disabled");
                }
            });


        });
    </script>
</body>

</html>
<?php
require '../../db_connect.php';

use TC\OBS\KhachHang;

$nt = new KhachHang($PDO);
if (isset($_POST['btnSuaNT'])) {
    $nt->find($_POST['id']);
    
}

if (isset($_POST['btnSua']) && $nt->find($_POST['ntID'])) {

    $nt->fill($_POST);

    
    $nt->save();
    header("Location: quanlynguoithan.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý người thân</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>

    <main class="row">
        <div class="container p-4">
            <h5>Sửa thông tin người thân</h5>
            <form action="" method="post" id="frmTSThanhVien">
                <div class="row">
                    <input type="text" name="ntID" hidden value="<?= $nt->layId()?>">
                    <div class="col">
                        <div class="form-group">
                            <label for="txtHoTen">Họ và tên </label>
                            <input type="text" name="txtHoTen" id="txtHoTen" placeholder="" class="form-control" value="<?= $nt->hoten?>">
                        </div>

                        <div class="form-group">
                            <label for="dtNgaySinh">Ngày sinh </label>
                            <input type="date" name="dtNgaySinh" id="dtNgaySinh" placeholder="" class="form-control" value="<?= $nt->ngaysinh?>">
                        </div>
                        <legend class="col-form-label">Giới tính </legend>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="rdGioiTinh" value="0" class="form-check-input" <?php if($nt->gioitinh == 0){echo "checked";};?>>
                                    <label for="rdGioiTinh1" class="form-check-label">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="rdGioiTinh" value="1" class="form-check-input" <?php if($nt->gioitinh == 1){echo "checked";};?>>
                                    <label for="rdGioiTinh2" class="form-check-label">Nữ </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="rdGioiTinh" value="2" class="form-check-input" <?php if($nt->gioitinh == 2){echo "checked";};?>>
                                    <label for="rdGioiTinh0" class="form-check-label">Khác</label>
                                </div>
                        <div class="form-group">
                            <label for="txtCCCD">Số hộ chiếu/CMND/CCCD </label>
                            <input type="text" name="txtCCCD" id="txtCCCD" placeholder="" class="form-control" value="<?= $nt->cmnd?>">
                        </div>
                        <div class="form-group">
                            <label for="txtTP">Thành phố</label>
                            <input type="text" name="txtTP" id="txtTP" placeholder="" class="form-control" value="<?= $nt->tinh?>">
                        </div>
                        <div class="form-group">
                            <label for="txtQH">Quận/huyện</label>
                            <input type="text" name="txtQH" id="txtQH" placeholder="" class="form-control" value="<?= $nt->quan?>">
                        </div>
                        <div class="form-group">
                            <label for="txtPX">Phường/xã: </label>
                            <input type="text" name="txtPX" id="txtPX" placeholder="" class="form-control" value="<?= $nt->phuong?>">
                        </div>
                        <div class="form-group">
                            <label for="txtDiaChi">Địa chỉ </label>
                            <input type="text" name="txtDiaChi" id="txtDiaChi" placeholder="" class="form-control" value="<?= $nt->diachi?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="txtBHYT">Số thẻ BHYT </label>
                            <input type="text" name="txtBHYT" id="txtBHYT" placeholder="" class="form-control" value="<?= $nt->baohiem?>">
                        </div>
                        <div class="form-group">
                            <label for="dtSDBD">Thời gian sử dụng thẻ - từ ngày</label>
                            <input type="date" name="dtSDBD" id="dtSDBD" placeholder="" class="form-control" value="<?= $nt->baohiembd?>">
                        </div>
                        <div class="form-group">
                            <label for="dtSDKT">Thời gian sử dụng thẻ - từ ngày</label>
                            <input type="date" name="dtSDKT" id="dtSDKT" placeholder="" class="form-control" value="<?= $nt->baohiemkt?>">
                        </div>
                        <div class="form-group">
                            <label for="txtDanToc">Dân tộc</label>
                            <input type="text" name="txtDanToc" id="txtDanToc" placeholder="" class="form-control" value="<?= $nt->dantoc?>">
                        </div>
                        <div class="form-group">
                            <label for="txtTonGiao">Tôn giáo</label>
                            <input type="text" name="txtTonGiao" id="txtTonGiao" placeholder="" class="form-control" value="<?= $nt->tongiao?>">
                        </div>
                        <div class="form-group">
                            <label for="txtNgheNghiep">Nghề nghiệp</label>
                            <input type="text" name="txtNgheNghiep" id="txtNgheNghiep" placeholder="" class="form-control" value="<?= $nt->nghenghiep?>">
                        </div>
                        <div class="form-group">

                            <input type="text" name="nguoiThanID" id="nguoiThanID" placeholder="" class="form-control" value="<?= $kh->layId(); ?>" hidden readonly>
                        </div>
                        <!-- <div class="form-group ">
                            <label for="nbSoLanTiem">Số lần tiêm: </label>
                            <div class="input-group">
                                
                                    
                                
                                <input type="number" class="form-control" id="nbSoLanTiem" name="nbSoLanTiem" value="0">
                            </div>

                        </div>
                     
                        <div class="form-group ">
                            <label for="dtNgayTiemGanNhat">Ngày tiêm gần nhất: </label>
                            <input type="date" name="dtNgayTiemGanNhat" id="dtNgayTiemGanNhat" placeholder="" class="form-control">

                        </div> -->
                    </div>


                    <div class="col-12">
                        

                    </div>

                </div>
                <div class="row">

                    <div class="col-6">
                        <a class="btn btn-light rounded-circle border border-primary text-primary " href="quanlynguoithan.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary rounded-pill w-100 mt-2" name="btnSua" id="btnSua">Sửa</button>
                        <!-- <button type="submit" class="btn btn-primary rounded-pill w-100 mt-2" name="btnThem" id="btnThem">Thêm</button> -->
                    </div>
                </div>
            </form>
            








        </div>
        

    </main>

   
    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
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
        $(document).ready(function() {

            $('#frmTSThanhVien').validate({
                rules: {
                    
                    rdDoTuoi:{
                        required: true
                    },
                    txtHoTen: {
                        required: true,
                        minlength: 8
                    },
                   
                    dtNgaySinh: {
                        required: true,
                        minAge: 6,
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
                    
                    dtNgayTiemGanNhat: {
                        reqVC: true,
                    }
                },
                messages: {
                    
                    rdDoTuoi:{
                        required: "Chưa chọn độ tuổi"
                    },
                    txtHoTen: {
                        required: "Bạn chưa nhập vào họ và tên",
                        minlength: "Họ và tên phải có ít nhất 8 ký tự!"
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
                    }
                    

                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    if (element.prop("name") === "rdGioiTinh") {
                        error.insertAfter(element.parent("div").siblings("legend.gioitinh"));

                    } 
                    else if (element.prop("name") === "rdDoTuoi") {
                        error.insertAfter(element.parent("div").siblings("legend.dotuoi"));

                    }
                    else {
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


            //
            var rdDoTuoi = $('input[name=rdDoTuoi]');
            console.log(rdDoTuoi);
            rdDoTuoi.on('change', function() {
                
                    var DoTuoi =  $("input[type='radio'][name='rdDoTuoi']:checked").val();
                    
                    if(DoTuoi == 0){
                        console.log("vo");
                        $("#txtCCCD").val('000000000000');
                        $("#txtCCCD").attr("readonly");
                    } else {
                        $("#txtCCCD").val("");
                        $("#txtCCCD").removeAttr("readonly");
                    }
                    
            });
        });
    </script>
</body>

</html>
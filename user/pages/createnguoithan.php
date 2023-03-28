<?php
require '../../db_connect.php';

use TC\OBS\KhachHang;

$newnt = new KhachHang($PDO);
if (isset($_POST['btnThem'])) {

    $newnt->fill($_POST);


    $newnt->save();
    echo "<script>alert('Đã thêm thành viên!')</script>";
    echo "<script>window.location.href = 'quanlynguoithan.php';</script>";
}
?>
<style>
    label,
    legend {
        font-weight: bolder;
    }
</style>
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
        <div class="container pt-0">
            <div class="text-center">
                <h3 class="titile mb-1">Thêm thành viên</h3>
            </div>
            <form action="" method="post" id="frmTSThanhVien">
                <div class="row">

                    <div class="col">
                        <legend class="col-form-label dotuoi">Độ tuổi <span class="required-fill-in">*</span></legend>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdDoTuoi" value="0" class="form-check-input">
                            <label for="rdDoTuoi" class="form-check-label">
                                < 18 tuổi </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdDoTuoi" value="1" class="form-check-input">
                            <label for="rdDoTuoi" class="form-check-label">>= 18 tuổi</label>
                        </div>
                        <div class="form-group">
                            <label for="txtHoTen">Họ và tên <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtHoTen" id="txtHoTen" placeholder="" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label for="dtNgaySinh">Ngày sinh <span class="required-fill-in">*</span></label>
                            <input type="date" name="dtNgaySinh" id="dtNgaySinh" placeholder="" class="form-control" value="">
                        </div>

                        <legend class="col-form-label gioitinh">Giới tính <span class="required-fill-in">*</span></legend>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="0" class="form-check-input">
                            <label for="rdGioiTinh1" class="form-check-label">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="1" class="form-check-input">
                            <label for="rdGioiTinh2" class="form-check-label">Nữ </label>
                        </div>


                        <div class="form-group">
                            <label for="txtCCCD">Số hộ chiếu/CMND/CCCD <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtCCCD" id="txtCCCD" placeholder="" class="form-control" value="">
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
                        <div class="form-group">
                            <label for="">Phường/ Xã <span class="required-fill-in">*</span></label>
                            <select name="txtPX" id="txtPX" class="custom-select">
                                <option value="">--Chọn--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtDiaChi">Địa chỉ <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtDiaChi" id="txtDiaChi" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="txtBHYT">Số thẻ BHYT <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtBHYT" id="txtBHYT" placeholder="" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col">

                        <div class="form-group">
                            <label for="dtSDBD">Thời gian sử dụng thẻ - từ ngày</label>
                            <input type="date" name="dtSDBD" id="dtSDBD" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="dtSDKT">Thời gian sử dụng thẻ - từ ngày</label>
                            <input type="date" name="dtSDKT" id="dtSDKT" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="txtDanToc">Dân tộc</label>
                            <input type="text" name="txtDanToc" id="txtDanToc" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="txtTonGiao">Tôn giáo</label>
                            <input type="text" name="txtTonGiao" id="txtTonGiao" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="txtNgheNghiep">Nghề nghiệp</label>
                            <input type="text" name="txtNgheNghiep" id="txtNgheNghiep" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">

                            <input type="text" name="nguoiThanID" id="nguoiThanID" placeholder="" class="form-control" value="<?= $kh->layId(); ?>" hidden readonly>
                        </div>
                        <hr>
                        <div class="form-group ">
                            <label for="nbSoLanTiem">Số lần tiêm <span class="required-fill-in">*</span></label>
                            <div class="input-group">



                                <input type="number" class="form-control" id="nbSoLanTiem" name="nbSoLanTiem" value="0" min="0">
                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="dtNgayTiemGanNhat">Ngày tiêm gần nhất: </label>
                            <input type="date" name="dtNgayTiemGanNhat" id="dtNgayTiemGanNhat" placeholder="" class="form-control" readonly>

                        </div>

                        <label for="">Loại vaccine tiêm gần nhất: </label>
                        <select class="custom-select" name="slvaccineTiemGanNhat" disabled>
                            <option value="" selected>-- Chọn vacxin --</option>
                            <?php $arrVac = $vaccine->all() ?>
                            <?php foreach ($arrVac as $v) : ?>
                                <option value="<?= $v->layID() ?>"><?= $v->ten ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-6">
                        <a class="btn btn-light rounded-circle border border-primary text-primary " href="trangchu.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary rounded-pill w-100 mt-2" name="btnThem" id="btnThem">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
    <script src="../../assets/frontend/js/area.js"></script>
    <script src="../../assets/frontend/js/create-member.js"></script>
</body>

</html>
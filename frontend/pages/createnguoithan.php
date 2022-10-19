<?php
require '../../db_connect.php';

use TC\OBS\KhachHang;

$newnt = new KhachHang($PDO);
if (isset($_POST['btnThem'])) {

    $newnt->fill($_POST);

    // var_dump($kh);
    $newnt->save();
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
            <h5>Thêm người thân</h5>
            <form action="" method="post">
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label for="txtHoTen">Họ và tên </label>
                            <input type="text" name="txtHoTen" id="txtHoTen" placeholder="" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label for="dtNgaySinh">Ngày sinh </label>
                            <input type="date" name="dtNgaySinh" id="dtNgaySinh" placeholder="" class="form-control" value="">
                        </div>
                        <legend class="col-form-label">Giới tính </legend>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="0" class="form-check-input">
                            <label for="rdGioiTinh1" class="form-check-label">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="1" class="form-check-input">
                            <label for="rdGioiTinh2" class="form-check-label">Nữ </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="2" class="form-check-input">
                            <label for="rdGioiTinh0" class="form-check-label">Khác</label>
                        </div>
                        <div class="form-group">
                            <label for="txtCCCD">Số hộ chiếu/CMND/CCCD </label>
                            <input type="text" name="txtCCCD" id="txtCCCD" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="txtTP">Thành phố</label>
                            <input type="text" name="txtTP" id="txtTP" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="txtQH">Quận/huyện</label>
                            <input type="text" name="txtQH" id="txtQH" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="txtPX">Phường/xã: </label>
                            <input type="text" name="txtPX" id="txtPX" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="txtDiaChi">Địa chỉ </label>
                            <input type="text" name="txtDiaChi" id="txtDiaChi" placeholder="" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="txtBHYT">Số thẻ BHYT </label>
                            <input type="text" name="txtBHYT" id="txtBHYT" placeholder="" class="form-control" value="">
                        </div>
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
                        <div class="form-group ">
                            <label for="nbSoLanTiem">Số lần tiêm: </label>
                            <div class="input-group">
                                
                                    
                                
                                <input type="number" class="form-control" id="nbSoLanTiem" name="nbSoLanTiem" value="0">
                            </div>

                        </div>
                        <!--  -->
                        <div class="form-group ">
                            <label for="dtNgayTiemGanNhat">Ngày tiêm gần nhất: </label>
                            <input type="date" name="dtNgayTiemGanNhat" id="dtNgayTiemGanNhat" placeholder="" class="form-control">

                        </div>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="btnThem" id="btnThem">Thêm</button>

                    </div>

                </div>
            </form>









        </div>


    </main>



    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>

</html>
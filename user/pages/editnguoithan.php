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
        <div class="container pt-0">
            <div class="text-center">
                <h3 class="titile mb-1">Sửa thông tin thành viên</h3>
            </div>
            <form action="" method="post" id="frmTSThanhVien">
                <div class="row">
                    <input type="text" name="ntID" hidden value="<?= $nt->layId() ?>">
                    <div class="col">
                        <div class="form-group">
                            <label for="txtHoTen">Họ và tên <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtHoTen" id="txtHoTen" placeholder="" class="form-control" value="<?= $nt->hoten ?>">
                        </div>

                        <div class="form-group">
                            <label for="dtNgaySinh">Ngày sinh <span class="required-fill-in">*</span></label>
                            <input type="date" name="dtNgaySinh" id="dtNgaySinh" placeholder="" class="form-control" value="<?= $nt->ngaysinh ?>">
                        </div>
                        <legend class="col-form-label">Giới tính <span class="required-fill-in">*</span></legend>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="0" class="form-check-input" <?php if ($nt->gioitinh == 0) {
                                                                                                            echo "checked";
                                                                                                        }; ?>>
                            <label for="rdGioiTinh1" class="form-check-label">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="rdGioiTinh" value="1" class="form-check-input" <?php if ($nt->gioitinh == 1) {
                                                                                                            echo "checked";
                                                                                                        }; ?>>
                            <label for="rdGioiTinh2" class="form-check-label">Nữ </label>
                        </div>

                        <div class="form-group">
                            <label for="txtCCCD">Số hộ chiếu/CMND/CCCD <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtCCCD" id="txtCCCD" placeholder="" class="form-control" value="<?= $nt->cmnd ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Tỉnh/ Thành phố <span class="required-fill-in">*</span></label>
                            <select name="txtTP" id="txtTP" class="custom-select">
                                <option value="<?= $nt->tinh; ?>"><?= $nt->tinh; ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Quận/ Huyện <span class="required-fill-in">*</span></label>
                            <select name="txtQH" id="txtQH" class="custom-select">
                                <option value="<?= $nt->quan; ?>"><?= $nt->quan; ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phường/ Xã <span class="required-fill-in">*</span></label>
                            <select name="txtPX" id="txtPX" class="custom-select">
                                <option value="<?= $nt->phuong; ?>"><?= $nt->phuong; ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtDiaChi">Địa chỉ <span class="required-fill-in">*</span></label>
                            <input type="text" name="txtDiaChi" id="txtDiaChi" placeholder="" class="form-control" value="<?= $nt->diachi ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="txtBHYT">Số thẻ BHYT </label>
                            <input type="text" name="txtBHYT" id="txtBHYT" placeholder="" class="form-control" value="<?= $nt->baohiem ?>">
                        </div>
                        <div class="form-group">
                            <label for="dtSDBD">Thời gian sử dụng thẻ - từ ngày</label>
                            <input type="date" name="dtSDBD" id="dtSDBD" placeholder="" class="form-control" value="<?= $nt->baohiembd ?>">
                        </div>
                        <div class="form-group">
                            <label for="dtSDKT">Thời gian sử dụng thẻ - từ ngày</label>
                            <input type="date" name="dtSDKT" id="dtSDKT" placeholder="" class="form-control" value="<?= $nt->baohiemkt ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtDanToc">Dân tộc</label>
                            <input type="text" name="txtDanToc" id="txtDanToc" placeholder="" class="form-control" value="<?= $nt->dantoc ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtTonGiao">Tôn giáo</label>
                            <input type="text" name="txtTonGiao" id="txtTonGiao" placeholder="" class="form-control" value="<?= $nt->tongiao ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtNgheNghiep">Nghề nghiệp</label>
                            <input type="text" name="txtNgheNghiep" id="txtNgheNghiep" placeholder="" class="form-control" value="<?= $nt->nghenghiep ?>">
                        </div>
                        <div class="form-group">

                            <input type="text" name="nguoiThanID" id="nguoiThanID" placeholder="" class="form-control" value="<?= $kh->layId(); ?>" hidden readonly>
                        </div>

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
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
    <script src="/V_TiemChung/assets/frontend/js/area.js"></script>
    <script src="../../assets/frontend//js/edit-member.js"></script>
</body>

</html>
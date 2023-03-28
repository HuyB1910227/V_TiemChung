<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý thông tin</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">
        <div class="container-lg ">
            <div class="row my-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-12">
                                    <div style="display: flex; align-items: center; ">
                                        <div class="avatar-left">
                                            <img src="/V_TiemChung/assets/uploads/<?= $user->avatar ?>" alt="" class="rounded-circle mx-auto" width="150px" height="150px">
                                        </div>
                                        <div class="text-avatar-right">
                                            <h4>Xin chào!</h4>
                                            <h3 style="color: #616AC6; text-shadow: 1px 1px 2px #616AC6"><?= $user->ten ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <form action="changeAvatar.php" method="post" enctype="multipart/form-data">
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="custom-file">
                                                    <input type="file" name="fileToUpload" id="fileToUpload" placeholder="Chọn ảnh đại diện" class="custom-file-input">
                                                    <label class="custom-file-label" for="fileToUpload" aria-describedby="inputGroupFileAddon02">Chọn ảnh đại diện...</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" name="submit" class="btn btn-primary" id="btnChangeAvatar">Thay đổi ảnh đại diện</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col p-2 ">
                            <button class="btn btn-warning float-right text-light" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i> Sửa thông tin cá nhân</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 bg-white mt-2">
                    <div class="row rounded rounded-3 justify-content-center p-2 ">
                        <h4>Thông tin chính</h4>
                        <div class="col-12 p-0">
                            <table class="table table-striped mb-0">
                                <tr>
                                    <td class="w-50 font-weight-bold">Họ và tên: </td>
                                    <td class="w-50"><?= $kh->hoten ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Ngày sinh:</td>
                                    <td><?= $kh->ngaysinh ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Giới tính:</td>
                                    <td><?php if ($kh->gioitinh == 1) {
                                            echo "Nữ";
                                        } else if ($kh->gioitinh == 0) {
                                            echo "Nam";
                                        } else {
                                            echo "Khác";
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Số điện thoại:</td>
                                    <td><?= $user->sdt ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">CMND/CCCD:</td>
                                    <td><?= $kh->cmnd ?></td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold">Thành phố:</td>
                                    <td><?= $kh->tinh ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Quận/huyện:</td>
                                    <td><?= $kh->quan ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Phường/xã:</td>
                                    <td><?= $kh->phuong ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Địa chỉ:</td>
                                    <td><?= $kh->diachi ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <div class="row bg-white justify-content-center pt-2">
                        <h4>Thông tin khác</h4>
                        <div class="col-12 p-0">
                            <table class="table table-striped mb-0">
                                <tr>
                                    <td class="font-weight-bold">Số lần tiêm:</td>
                                    <td><?= $kh->solantiem ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Ngày tiêm gần nhất:</td>
                                    <td><?php echo $kh->ngaytiemgannhat;

                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Hiệu lực:</td>
                                    <td><?= $kh->dateEXP(); ?></td>
                                </tr>
                                <tr>
                                    <td class="w-50 font-weight-bold">Số thẻ BHYT: </td>
                                    <td class="w-50"><?= $kh->baohiem ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Thời gian sử dụng thẻ - từ ngày:</td>
                                    <td><?= $kh->baohiembd ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Thời gian sử dụng thẻ - đến ngày:</td>
                                    <td><?= $kh->baohiemkt ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Dân tộc:</td>
                                    <td><?= $kh->dantoc ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tôn giáo:</td>
                                    <td><?= $kh->tongiao ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Nghề nghiệp:</td>
                                    <td><?= $kh->nghenghiep ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin cá nhân</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" id="frmTTCN">
                                <div class="form-group">
                                    <label for="txtHoTen">Họ và tên <span class="required-fill-in">*</span></label>
                                    <input type="text" name="txtHoTen" id="txtHoTen" placeholder="" class="form-control" value="<?= $kh->hoten; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="dtNgaySinh">Ngày sinh <span class="required-fill-in">*</span></label>
                                    <input type="date" name="dtNgaySinh" id="dtNgaySinh" placeholder="" class="form-control" value="<?= $kh->ngaysinh; ?>">
                                </div>
                                <legend class="col-form-label">Giới tính <span class="required-fill-in">*</span></legend>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="rdGioiTinh" value="0" class="form-check-input" <?php if ($kh->gioitinh == 0) {
                                                                                                                    echo "checked";
                                                                                                                }; ?>>
                                    <label for="rdGioiTinh1" class="form-check-label">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="rdGioiTinh" value="1" class="form-check-input" <?php if ($kh->gioitinh == 1) {
                                                                                                                    echo "checked";
                                                                                                                }; ?>>
                                    <label for="rdGioiTinh2" class="form-check-label">Nữ </label>
                                </div>
                                
                                <div class="form-group">
                                    <label for="txtCCCD">Số hộ chiếu/CMND/CCCD <span class="required-fill-in">*</span></label>
                                    <input type="text" name="txtCCCD" id="txtCCCD" placeholder="" class="form-control" value="<?= $kh->cmnd; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Tỉnh/ Thành phố <span class="required-fill-in">*</span></label>
                                    <select name="txtTP" id="txtTP" class="custom-select">
                                        <option value="<?= $kh->tinh; ?>"><?= $kh->tinh; ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Quận/ Huyện <span class="required-fill-in">*</span></label>
                                    <select name="txtQH" id="txtQH" class="custom-select">
                                        <option value="<?= $kh->quan; ?>"><?= $kh->quan; ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Phường/ Xã <span class="required-fill-in">*</span></label>
                                    <select name="txtPX" id="txtPX" class="custom-select">
                                        <option value="<?= $kh->phuong; ?>"><?= $kh->phuong; ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="txtDiaChi">Địa chỉ <span class="required-fill-in">*</span></label>
                                    <input type="text" name="txtDiaChi" id="txtDiaChi" placeholder="" class="form-control" value="<?= $kh->diachi; ?>">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="txtBHYT">Số thẻ BHYT </label>
                                    <input type="text" name="txtBHYT" id="txtBHYT" placeholder="" class="form-control" value="<?= $kh->baohiem; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="dtSDBD">Thời gian sử dụng thẻ - từ ngày</label>
                                    <input type="date" name="dtSDBD" id="dtSDBD" placeholder="" class="form-control" value="<?= $kh->baohiembd; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="dtSDKT">Thời gian sử dụng thẻ - từ ngày</label>
                                    <input type="date" name="dtSDKT" id="dtSDKT" placeholder="" class="form-control" value="<?= $kh->baohiemkt; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="txtDanToc">Dân tộc</label>
                                    <input type="text" name="txtDanToc" id="txtDanToc" placeholder="" class="form-control" value="<?= $kh->dantoc; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="txtTonGiao">Tôn giáo</label>
                                    <input type="text" name="txtTonGiao" id="txtTonGiao" placeholder="" class="form-control" value="<?= $kh->tongiao; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="txtNgheNghiep">Nghề nghiệp</label>
                                    <input type="text" name="txtNgheNghiep" id="txtNgheNghiep" placeholder="" class="form-control" value="<?= $kh->nghenghiep; ?>">
                                </div>
                                <button type="" class="btn btn-primary" name="btnLuuThayDoi" id="btnLuuThayDoi" hidden>Lưu thay đổi</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" id="btnKT">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <?php include_once __DIR__ . './handles/suathongtincanhan.php'; ?>
    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
    <script src="../../assets/frontend/js/area.js"></script>
    <script>
        $(function() {
            console.log("hi");
            const save = $('#btnLuuThayDoi');
            save.on("click", function() {
                window.location = "./layouts/partials/footer.php";
                location.reload();
            });
        });
    </script>
    <script src="../../assets/frontend/js/validate-info.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Lịch sử tiêm chủng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">

        <div class="container-lg ">
            <div class="row my-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col ">
                            <img src="./newseventsimage.webp" alt="" class="rounded-circle" width="150px" height="150px">
                            <!-- <h4>Xin chào!</h4>
                            <h5>Nguyễn Văn A</h5> -->
                        </div>
                        <div class="col p-2 ">
                            <button class="btn btn-warning float-right text-light" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i> Sửa thông tin cá nhân</button>
                        </div>
                    </div>
                </div>
                <div class="col m-2 bg-white">
                    <div class="row border rounded rounded-3 justify-content-sm-center pt-2">
                        <h4>Thông tin chính</h4>
                        <div class="col-12 p-0">
                            <table class="table table-striped mb-0">
                                <tr>
                                    <td class="w-50 font-weight-bold">Họ và tên: </td>
                                    <td class="w-50"><?= $kh->hoten?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Ngày sinh:</td>
                                    <td><?= $kh->ngaysinh?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Giới tính:</td>
                                    <td><?php if($kh->gioitinh == 1){
                                        echo "Nữ";
                                    } else if($kh->gioitinh == 0){
                                        echo "Nam";
                                    } else {
                                        echo "Khác";
                                    }?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Số điện thoại:</td>
                                    <td><?= $user->sdt?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">CMND/CCCD:</td>
                                    <td><?= $kh->cmnd?></td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold">Thành phố:</td>
                                    <td><?= $kh->tinh?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Quận/huyện:</td>
                                    <td><?= $kh->quan?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Phường/xã:</td>
                                    <td><?= $kh->phuong?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Địa chỉ:</td>
                                    <td><?= $kh->diachi?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col m-2 ">
                    <div class="row border bg-white justify-content-center pt-2">
                        <h4>Thông tin khác</h4>
                        <div class="col-12 p-0">
                            <table class="table table-striped mb-0">
                                <tr>
                                    <td class="w-50 font-weight-bold">Số thẻ BHYT: </td>
                                    <td class="w-50"><?= $kh->baohiem?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Thời gian sử dụng thẻ - từ ngày:</td>
                                    <td><?= $kh->baohiembd?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Thời gian sử dụng thẻ - đến ngày:</td>
                                    <td><?= $kh->baohiemkt?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Dân tộc:</td>
                                    <td><?= $kh->dantoc?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tôn giáo:</td>
                                    <td><?= $kh->tongiao?></td>
                                </tr>


                                <tr>
                                    <td class="font-weight-bold">Nghề nghiệp:</td>
                                    <td><?= $kh->nghenghiep?></td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin cá nhân</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#">
                                <div class="form-group">
                                    <label for="txtHoTen">Họ và tên </label>
                                    <input type="text" name="txtHoTen" id="txtHoTen" placeholder="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="dtNgaySinh">Ngày sinh </label>
                                    <input type="date" name="dtNgaySinh" id="dtNgaySinh" placeholder="" class="form-control">
                                </div>
                                <legend class="col-form-label">Giới tính </legend>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="rdGioiTinh" id="rdGioiTinh1" value="1" class="form-check-input">
                                    <label for="rdGioiTinh1" class="form-check-label">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="rdGioiTinh" id="rdGioiTinh2" value="2" class="form-check-input">
                                    <label for="rdGioiTinh2" class="form-check-label">Nữ </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="rdGioiTinh" id="rdGioiTinh0" value="0" class="form-check-input">
                                    <label for="rdGioiTinh0" class="form-check-label">Khác</label>
                                </div>
                                <div class="form-group">
                                    <label for="txtCCCD">Số hộ chiếu/CMND/CCCD </label>
                                    <input type="text" name="txtCCCD" id="txtCCCD" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="txtTP">Thành phố</label>
                                    <input type="text" name="txtTP" id="txtTP" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="txtQH">Quận/huyện</label>
                                    <input type="text" name="txtQH" id="txtQH" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="txtPX">Phường/xã: </label>
                                    <input type="text" name="txtPX" id="txtPX" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="txtDiaChi">Địa chỉ </label>
                                    <input type="text" name="txtDiaChi" id="txtDiaChi" placeholder="" class="form-control">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="txtBHYT">Số thẻ BHYT </label>
                                    <input type="text" name="txtBHYT" id="txtBHYT" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="dtSDBD">Thời gian sử dụng thẻ - từ ngày</label>
                                    <input type="date" name="dtSDBD" id="dtSDBD" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="dtSDBD">Thời gian sử dụng thẻ - từ ngày</label>
                                    <input type="date" name="dtSDBD" id="dtSDBD" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="txtDanToc">Dân tộc</label>
                                    <input type="text" name="txtDanToc" id="txtDanToc" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="txtDanToc">Tôn giáo</label>
                                    <input type="text" name="txtDanToc" id="txtDanToc" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="txtDanToc">Nghề nghiệp</label>
                                    <input type="text" name="txtDanToc" id="txtDanToc" placeholder="" class="form-control">
                                </div>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                                <button type="button" class="btn btn-primary">Lưu thay đổi</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>

</html>
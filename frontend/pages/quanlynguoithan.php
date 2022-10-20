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
            <h5>Danh sách người thân</h5>
            <div class="col-12">
                <a href="createnguoithan.php" class="btn btn-primary">Thêm</a>
            </div>
            <?php foreach ($dsnguoithan as $nguoithan) : ?>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            
                            <div class="col p-2 ">
                                <form action="editnguoithan.php" method="post">
                                    <input type="text" name="id" id="id" value="<?= $nguoithan->layId()?>" hidden>
                                    <button class="btn btn-warning  text-light mr-2" name="btnSuaNT"><i class="fa-solid fa-pen-to-square"></i> Sửa thông tin</button>

                                </form>
                                <!-- <button class="btn btn-danger text-light">Loại bỏ</button> -->

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
                                        <td class="w-50"><?= $nguoithan->hoten ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Ngày sinh:</td>
                                        <td><?= $nguoithan->ngaysinh ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Giới tính:</td>
                                        <td><?php if ($nguoithan->gioitinh == 1) {
                                                echo "Nữ";
                                            } else if ($nguoithan->gioitinh == 0) {
                                                echo "Nam";
                                            } else {
                                                echo "Khác";
                                            } ?></td>
                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">CMND/CCCD:</td>
                                        <td><?= $nguoithan->cmnd ?></td>
                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Thành phố:</td>
                                        <td><?= $nguoithan->tinh ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Quận/huyện:</td>
                                        <td><?= $nguoithan->quan ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Phường/xã:</td>
                                        <td><?= $nguoithan->phuong ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Địa chỉ:</td>
                                        <td><?= $nguoithan->diachi ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Số lần tiêm:</td>
                                        <td><?= $nguoithan->solantiem ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Ngày tiêm gần nhất:</td>
                                        <td><?php echo $nguoithan->ngaytiemgannhat;

                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Hiệu lực:</td>
                                        <td><?= $nguoithan->dateEXP(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Hiệu lực2:</td>
                                        <td><?= $nguoithan->findVaccineLastVaccinated(); ?></td>
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
                                        <td class="w-50"><?= $nguoithan->baohiem ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Thời gian sử dụng thẻ - từ ngày:</td>
                                        <td><?= $nguoithan->baohiembd ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Thời gian sử dụng thẻ - đến ngày:</td>
                                        <td><?= $nguoithan->baohiemkt ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Dân tộc:</td>
                                        <td><?= $nguoithan->dantoc ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Tôn giáo:</td>
                                        <td><?= $nguoithan->tongiao ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Nghề nghiệp:</td>
                                        <td><?= $nguoithan->nghenghiep ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
                <!-- <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin cá nhân</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->




            <?php endforeach; ?>
        </div>


    </main>


    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý người thân</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
    <style type="text/css">
        div.test {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 115px;
            padding: 10px;
            border: 2px solid #616AC6;
            border-radius: 15px;
            -moz-border-radius: 15px;
            font-size: 30px;
            color: #616AC6;
        }
    </style>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>

    <main class="row">

        <div class="container p-4">
            <h3 class="titile">Quản lý người thân</h3>
            <div class="row mt-2 p-2">
                <a href="createnguoithan.php" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Thêm thành viên</a>
            </div>
            <hr>
            <div class="row">
                <?php foreach ($dsnguoithan as $i => $nguoithan) : ?>


                    
                    <div class="col-6 p-2 bg-white my-2">
                        <div class="row justify-content-sm-center pt-2">
                            <!-- <h4>Thông tin chính</h4> -->

                            <div class="col-11 border rounded shadow">
                                <div class="row">

                                <div class="col-6">
                                    <div class="test"> <?= ++$i?> &nbsp; &nbsp;<i class="fa-solid fa-people-roof"></i> </div>
                                </div>
                                <div class="col-6 ">
                                    <div class="row">

                                        <div class=" p-2 ml-auto">
                                            <form action="editnguoithan.php" method="post">
                                                <input type="text" name="id" id="id" value="<?= $nguoithan->layId() ?>" hidden>
                                                <button class="btn btn-warning  text-light mr-2" name="btnSuaNT"><i class="fa-solid fa-pen-to-square"></i> Sửa thông tin</button>

                                            </form>


                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <table class="table mb-0 table-stripped">
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
                                    <!-- <tr>
                                        <td class="font-weight-bold">Hiệu lực:</td>
                                        <td><?= $nguoithan->dateEXP(); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Hiệu lực2:</td>
                                        <td><?= $nguoithan->findVaccineLastVaccinated(); ?></td>
                                    </tr> -->
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
                    




                <?php endforeach; ?>
            </div>
        </div>


    </main>


    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>

</html>
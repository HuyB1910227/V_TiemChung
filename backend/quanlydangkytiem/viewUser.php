<?php
require_once '../../db_connect.php';

use TC\OBS\KhachHang;
use TC\OBS\LichHenTiem;
use TC\OBS\PhieuDangKy;

$ttDK = new PhieuDangKy($PDO);
$ttKH = new KhachHang($PDO);
$ttLT = new LichHenTiem($PDO);
if (isset($_POST['id'])) {
    // echo $_POST['id'];
    $ttDK->find($_POST['id']);
    $ttKH->find($ttDK->kh_id);
    $ttLT->find($ttDK->lht_id);
} else {
    echo "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3>Chi tiết đăng ký tiêm vaccin</h3>

                <div class="bg-white p-2">
                    <div class="float-right">
                        <!-- <button class="btn btn-warning text-white"><i class="fa-solid fa-ban"></i> Từ chối</button>
                        <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Xác nhận</button> -->
                    </div>
                </div>
                <div class="mt-2">
                    <div class="card container">
                        
                        <div class="card-body container">

                            <div class="row">
                                <div class="col">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Mã người tiêm:</th>
                                            <td><?= $ttKH->layId() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Họ và tên:</th>
                                            <td><?= $ttKH->hoten ?></td>
                                        </tr>
                                        <tr>
                                            <th>CMND/CCCD:</th>
                                            <td><?= $ttKH->cmnd ?></td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ:</th>
                                            <td><?= $ttKH->diachi . ", "  . $ttKH->phuong . "," . $ttKH->quan . "," . $ttKH->tinh; ?></td>
                                        </tr>

                                    </table>


                                </div>
                                <div class="col">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Giới tính:</th>
                                            <td><?= $ttKH->gioitinh ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày sinh:</th>
                                            <td><?= $ttKH->ngaysinh ?></td>
                                        </tr>
                                        <tr>
                                            <th>Số lần tiêm:</th>
                                            <td><?= $ttKH->solantiem ?></td>
                                        </tr>
                                        

                                    </table>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <h4 class="col-12">Điểm bất thường (Tiền sử)</h4>
                                <?php if ($ttDK->diembatthuong == 0) : ?>
                                    <span class="text-primary col-12">Không có điểm bất thường</span>
                                <?php else : ?>
                                    <div class="col">
                                        <h5>Có</h5>
                                        <?php foreach($ttDK->listUnusualYes() as $i => $e):?>
                                            <p class="text-danger"><?= ++$i.". " .$e?></p>
                                        <?php endforeach;?>

                                    </div>
                                    <div class="col">
                                        <h5>Không rõ</h5>
                                        <?php foreach($ttDK->listUnusualUnclear() as $i => $e):?>
                                            <p class="text-danger"><?= ++$i.". " .$e?></p>
                                        <?php endforeach;?>
                                    </div>
                                    
                                    
                                <?php endif; ?>
                            </div>
                            <hr>
                            <div class="row">
                                <h5 class="col-12">Đăng ký:</h5>
                                <div class="col-12">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Mã lịch hẹn:</th>
                                            <td><?= $ttLT->getId() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày tiêm dự kiến:</th>
                                            <td><?= $ttLT->ngaytiem ?></td>
                                        </tr>
                                        <tr>
                                            <th>Cơ sở:</th>
                                            <td><?= $ttLT->findLocation()->ten ?></td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ:</th>
                                            <td><?= $ttLT->findLocation()->diachi . ", "  . $ttLT->findLocation()->phuong . "," . $ttLT->findLocation()->quan . "," . $ttLT->findLocation()->tinh; ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer row">
                            <div class="col">
                                <a class="btn btn-light" href="./index.php">Trở về</a>
                            </div>
                            <div class="col">
                                <div class="float-right">
                                    <form action="<?= url('backend/quanlydangkytiem/edit.php') ?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $ttDK->getId() ?>">
                                        <button type="submit" class="btn btn-primary " name="btnConfirm">
                                            <i class="fa-solid fa-check"></i> Xác nhận</button>
                                    </form>
                                    <form action="<?= url('backend/quanlydangkytiem/edit.php') ?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $ttDK->getId() ?>">
                                        <button type="submit" class="btn btn-warning text-white ml-2" name="btnRefuse"><i class="fa-solid fa-ban"></i> Từ chối</button>
                                    </form>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>



                <!-- Modal view -->
                <!-- Button trigger modal -->

                <!-- Modal -->
                <!-- <div class="modal fade" id="viewDangKy" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thông tin đăng ký</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col" id="dd"></div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    </div>
    </div>




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>

    <script>
        $(function() {

            $('.btnView').on("click", function() {
                console.log("hi");
                //$(this).data('cs_id');           
                var strPDKID = $(this).data("pdk_id");
                console.log(strPDKID);
                var div = $("#dd");
                var phpe = <?php $p->find($strPDKID); ?>;
                div.innerHTML = "<h1>co</h1>";
                div.append(phpe);
                //div.text('<?php $p->find('+ `${strPDKID}` + '); ?>);
                // div.html('<\?php $p = '+ `${strPDKID}` + '>');
                // $p->find(2);
                // var_dump($p);
                // 
            });
        });
    </script>


</body>

</html>
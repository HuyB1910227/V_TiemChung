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
    $ttKH->find($ttDK->nd_id);
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
                                        <?php if($ttDK->listUnusualYes() != null):?>
                                        <?php foreach($ttDK->listUnusualYes() as $i => $e):?>
                                            <p class="text-danger"><?= ++$i.". " .$e?></p>
                                        <?php endforeach;?>
                                        <?php else: ?>
                                            <p class="text-primary">Không</p>
                                        <?php endif;?>

                                    </div>
                                    <div class="col">
                                        <h5>Không rõ</h5>
                                        <?php if($ttDK->listUnusualUnclear() != null):?>
                                        <?php foreach($ttDK->listUnusualUnclear() as $i => $e):?>
                                            <p class="text-danger"><?= ++$i.". " .$e?></p>
                                        <?php endforeach;?>
                                        <?php else: ?>
                                            <p class="text-primary">Không</p>
                                        <?php endif;?>
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
                                    <form action="<?= url('admin/quanlydangkytiem/edit.php') ?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="id_Confirm" value="<?= $ttDK->getId() ?>">
                                        <button type="submit" class="btn btn-primary btnConfirm" name="btnConfirm" <?php if($ttDK->trangthai != 0){echo "hidden";} ?>>
                                            <i class="fa-solid fa-check"></i> Xác nhận</button>
                                    </form>
                                    <form action="<?= url('admin/quanlydangkytiem/edit.php') ?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="id_Refuse" value="<?= $ttDK->getId() ?>">
                                        <button type="submit" class="btn btn-warning text-white ml-2 btnRefuse" name="btnRefuse" <?php if($ttDK->trangthai != 0){echo "hidden";} ?>>
                                            <i class="fa-solid fa-ban"></i> Từ chối</button>
                                    </form>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>

    <script>
        $(document).ready(function() {

            
            $('.btnConfirm').on("click", function(e) {
                e.preventDefault();
                const form = $(this).closest('form');


                Swal.fire({
                    title: 'Bạn có chắc chắn xác nhận?',
                    text: "Sau khi đồng ý xác nhận, trạng thái phiếu tiêm không thể hoàn tác!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý ',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.trigger('submit');
                    }
                })
            });

            $('.btnRefuse').on("click", function(e) {
                e.preventDefault();
                const form = $(this).closest('form');


                Swal.fire({
                    title: 'Bạn có chắc chắn từ chối?',
                    text: "Sau khi từ chối, trạng thái phiếu tiêm không thể hoàn tác!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f5ad42',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Từ chối',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.trigger('submit');
                    }
                })
            });


        });
    </script>


</body>

</html>
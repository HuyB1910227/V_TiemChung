<?php
    require_once '../../db_connect.php';

    use TC\OBS\PhieuDangKy;

    $pdk = new PhieuDangKy($PDO);
    $arrpdk = $pdk->all();

    use TC\OBS\KhachHang;
    $nt = new KhachHang($PDO);
    use TC\OBS\LichHenTiem;
    $lht = new LichHenTiem($PDO);
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
            <div class="col-10">
                <h3 class="text-info">Danh sách đăng ký tiêm vaccin</h3>

                <div class="bg-white p-2">
                    <p class="float-left">Tổng số lượng: 1</p>
                    <div class="float-right">
                        <button class="btn btn-warning text-white"><i class="fa-solid fa-ban"></i> Từ chối</button>
                        <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Xác nhận</button>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive">
                        <tr class="bg-primary text-center text-light">
                            <th>Chọn</th>
                            <th>STT</th>
                            <th>Số điện thoại</th>
                            <th>Họ và tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>CCCD</th>
                            <th>Tỉnh/Thành phố</th>
                            <th>Quận/Huyện</th>
                            <th>Xã/Phường</th>
                            <th>Địa chỉ</th>
                            <th>Ngày đăng ký</th>
                            <th>Lịch tiêm</th>
                            <th>Cơ sở tiêm</th>
                            <th>Thao tác</th>

                        </tr>
                        <?php foreach($arrpdk as $i => $pdk):?>
                            <?php 
                                $nt = $pdk->findUser();
                                $lht = $pdk->findVaccinationSchedule();
                            ?>
                            <tr>
                                <td></td>
                                <td><?= ++$i ?></td>
                                <td><?= $pdk->getId()?></td>
                                <td><?= $nt->sdt?></td>
                                <td><?= $nt->hoten?></td>
                                <td><?= $nt->ngaysinh?></td>
                                <td><?php 
                                        if($nt->gioitinh == 0){
                                            echo "Nam";
                                        } else if($nt->gioitinh == 1){
                                            echo "Nữ";
                                        } else {
                                            echo "Khác";
                                        }
                                        ?>
                                </td>
                                <td><?= $nt->tinh?></td>
                                <td><?= $nt->quan?></td>
                                <td><?= $nt->phuong?></td>
                                <td><?= $nt->diachi?></td>
                                <td><?= $pdk->ngaydangky?></td>
                                <td><?= $lht->ngaytiem?></td>
                                <td><?php echo $lht->findLocation()->ten?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
</body>

</html>
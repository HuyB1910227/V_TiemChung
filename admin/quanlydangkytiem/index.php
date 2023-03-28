<?php
require_once '../../db_connect.php';

use TC\OBS\CoSoTiem;
use TC\OBS\PhieuDangKy;

$pdk = new PhieuDangKy($PDO);
$arrpdk = $pdk->all();

use TC\OBS\KhachHang;

$nt = new KhachHang($PDO);

use TC\OBS\LichHenTiem;
use TC\OBS\TaiKhoan;

$lht = new LichHenTiem($PDO);

$cosotiem = new CoSoTiem($PDO);
$arrcoso = $cosotiem->all();
$ngh = new KhachHang($PDO);
$tk = new TaiKhoan($PDO);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý đăng ký tiêm</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>


            <div class="col-10 offset-2 mt-1">
                <h3>Danh sách đăng ký tiêm vắc xin</h3>
                <div class="row filter">
                    <h5 class="col-12"><i class="fa-solid fa-filter"></i>
                        Bộ lọc</h5>
                    <div class="col-2 ">
                        <div class="form-group">
                            <label for="">Trạng thái</label>

                            <select name="slTT" id="slTT" class="custom-select searchField" column="16">
                                <option value="">Tất cả</option>
                                <option value="Chưa xác nhận">Chưa xác nhận</option>
                                <option value="Đã xác nhận">Đã xác nhận</option>
                                <option value="Đã từ chối">Đã từ chối</option>
                                <option value="Đã hủy">Đã hủy</option>
                                <option value="Tiêm thành công">Đã tiêm</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Giới tính</label>

                            <select name="slTT" id="slTT" class="custom-select searchField" column="4">
                                <option value="">Tất cả</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>


                            </select>

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Ngày đăng ký</label>

                            <input type="date" id="dateNDK" class="form-control searchField" column="12">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Ngày tiêm dự kiến</label>

                            <input type="date" id="dateNDK" class="form-control searchField" column="13">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Cơ sở tiêm</label>

                            <select name="slTT" id="slTT" class="custom-select searchField" column="14">
                                <option value="">Tất cả</option>

                                <?php foreach ($arrcoso as $cosotiem) {
                                    echo "<option value=\"$cosotiem->ten \">$cosotiem->ten</option>";
                                } ?>

                            </select>

                        </div>
                    </div>

                </div>
                <hr>
                <div class="bg-white m-2 row">
                    <div class="col-12">
                        <div class="float-right">

                            <button class="btn btn-primary" id="btnXN"><i class="fa-solid fa-check"></i> Xác nhận</button>
                        </div>
                    </div>

                </div>

                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive table-striped" id="tbDangKyTiem">
                        <thead>
                            <tr class="">
                                <th>Chọn</th>
                                <th>Mã số</th>
                                <th>Họ và tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>CMND/CCCD</th>
                                <th>Tỉnh/Thành phố</th>
                                <th>Quận/Huyện</th>
                                <th>Xã/Phường</th>
                                <th>Địa chỉ</th>
                                <th>Người giám hộ</th>
                                <th>Số điện thoại</th>
                                <th>Ngày đăng ký</th>
                                <th>Lịch tiêm</th>
                                <th>Cơ sở tiêm</th>
                                <th>Điểm bất thường</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arrpdk as $i => $pdk) : ?>

                                <?php
                                $nt = $pdk->findUser();
                                $lht = $pdk->findVaccinationSchedule();
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="chkChonPDK" name="chkChon" value="<?= $pdk->getID() ?>" <?php if ($pdk->trangthai != 0) {
                                                                                                                                    echo "disabled";
                                                                                                                                } ?>>
                                    </td>

                                    <td><?= $pdk->getId() ?></td>

                                    <td><?= $nt->hoten ?></td>
                                    <td><?= $nt->ngaysinh ?></td>
                                    <td><?php
                                        if ($nt->gioitinh == 0) {
                                            echo "Nam";
                                        } else if ($nt->gioitinh == 1) {
                                            echo "Nữ";
                                        } else {
                                            echo "Khác";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $nt->cmnd == "000000000000" ? "Không" : $nt->cmnd ?></td>
                                    <td><?= $nt->tinh ?></td>
                                    <td><?= $nt->quan ?></td>
                                    <td><?= $nt->phuong ?></td>
                                    <td><?= $nt->diachi ?></td>
                                    <td><?= $nt->nt_id != "" ? $ngh->find($nt->nt_id)->hoten : "Không" ?></td>
                                    <td><?= $nt->nt_id != "" ? $tk->findByNDID($nt->nt_id)->sdt : $tk->findByNDID($nt->layId())->sdt ?></td>
                                    <td><?= $pdk->ngaydangky ?></td>
                                    <td><?= $lht->ngaytiem ?></td>

                                    <td><?php echo $lht->findLocation()->ten ?></td>
                                    <td><?= $pdk->diembatthuong == "0" ? "Không" : "Có" ?></td>
                                    <td><?php if ($pdk->trangthai == 1) {
                                            echo "<span class=\"text-info\">Đã xác nhận</span>";
                                        } else if ($pdk->trangthai == 2) {
                                            echo "<span class=\"text-warning\">Đã từ chối</span>";
                                        } else if ($pdk->trangthai == 3) {
                                            echo "<span class=\"text-danger\">Đã hủy</span>";
                                        } else if ($pdk->trangthai == 4) {
                                            echo "<span class=\"text-success\">Tiêm thành công</span>";
                                        } else if ($pdk->trangthai == 0) {
                                            echo "<span class=\"text-primary\">Chưa xác nhận</span>";
                                        } ?></td>
                                    <td>

                                        <form action="<?= url('admin/quanlydangkytiem/viewUser.php') ?>" method="POST" style="display: inline;">
                                            <input type="hidden" name="id" value="<?= $pdk->getId() ?>">
                                            <button type="submit" class="btn btn-light text-primary my-1" name="btnView" data-toggle="modal" data-target="#viewDangKy"><i class="fa-solid fa-eye"></i> </button>
                                        </form>


                                        <form action="<?= url('admin/quanlydangkytiem/edit.php') ?>" method="POST" style="display: inline;">
                                            <input type="hidden" name="id_Confirm" value="<?= $pdk->getId() ?>">
                                            <button type="submit" class="btn btn-xs btn-primary btnConfirm my-1" name="btnConfirm" <?php if ($pdk->trangthai != 0) {
                                                                                                                                        echo "hidden";
                                                                                                                                    } ?>>
                                                <i class="fa-solid fa-check"></i> </button>
                                        </form>
                                        <form action="<?= url('admin/quanlydangkytiem/edit.php') ?>" method="POST" style="display: inline;">
                                            <input type="hidden" name="id_Refuse" value="<?= $pdk->getId() ?>">
                                            <button type="submit" class="btn btn-warning text-white btnRefuse my-1" name="btnRefuse" <?php if ($pdk->trangthai != 0) {
                                                                                                                                            echo "hidden";
                                                                                                                                        } ?>><i class="fa-solid fa-ban"></i> </button>

                                        </form>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>

                    </table>
                    <form action="<?= url('admin/quanlydangkytiem/edit.php') ?>" method="POST" style="display: none;" id="frmXNA">
                        <input name="arrID" value="">
                        <button type="submit" class="btn btn-xs btn-primary" name="btnXNA" id="btnXNA">
                            <i class="fa-solid fa-check"></i></button>
                    </form>
                </div>




            </div>
        </div>
    </div>
    </div>
    </div>




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
    <script src="../../assets/backend/js/Vaccination.js"></script>
</body>

</html>
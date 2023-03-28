<?php
require_once '../../db_connect.php';

use TC\OBS\CoSoTiem;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $coso = new CoSoTiem($PDO);
    $coso->fill($_POST);
    $coso->save();
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý cơ sở tiêm</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2  mt-1">
                <h3>Thêm cơ sở</h3>
                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="create.php" method="post" id="frmQLCS">
                            <div class="form-group">
                                <label for="txtTenCoSo" class="form-label">Tên cơ sở: </label>
                                <input type="text" name="txtTenCoSo" id="txtTenCoSo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tỉnh/ Thành phố</label>
                                <select name="txtTinh" id="txtTinh" class="custom-select">
                                    <option value="">--Chọn--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Quận/ Huyện</label>
                                <select name="txtQuan" id="txtQuan" class="custom-select">
                                    <option value="">--Chọn--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Phường/ Xã</label>
                                <select name="txtPhuong" id="txtPhuong" class="custom-select">
                                    <option value="">--Chọn--</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="txtDiaChi">Địa chỉ </label>
                                <input type="text" name="txtDiaChi" id="txtDiaChi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái hoạt động</label>
                                <select name="slTrangThai" id="slTrangThai" class="custom-select">
                                    <option value="0" selected>Không hoạt động</option>
                                    <option value="1">Hoạt động</option>
                                </select>
                            </div>



                            
                            <a class="btn btn-light rounded-circle border border-primary text-primary " href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                            <button name="btnThem" id="btnThem" class="btn btn-primary rounded-pill w-75 float-right">Thêm</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
</body>

</html>
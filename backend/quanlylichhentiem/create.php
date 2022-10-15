<?php
require_once '../../db_connect.php';

use TC\OBS\LichHenTiem;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $e = new LichHenTiem($PDO);
    $e->fill($_POST);

    $e->save();
    //var_dump($coso);
    header('Location: index.php');
}

use TC\OBS\CoSoTiem;

$coso = new CoSoTiem($PDO);
$arrcoso = $coso->all();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý Vaccine </title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3>Thêm Vắc xin</h3>


                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="dtNgayHenTiem">Ngày hẹn tiêm: </label>
                                <input type="date" name="dtNgayHenTiem" id="dtNgayHenTiem" class="form-control" required value="">
                            </div>

                            <div class="form-group">
                                <label for="">Trạng thái hoạt động</label>
                                <select name="slCoSo" id="slCoSo" class="custom-select">
                                    <?php foreach ($arrcoso as $coso) : ?>

                                        <option value="<?= $coso->layID(); ?>"><?= $coso->ten . ", " . $coso->diachi . ", " . $coso->quan . ", " . $coso->tinh; ?></option>



                                    <?php endforeach; ?>
                                </select>
                            </div>




                            <button name="btnSave" id="btnSave" class="btn btn-primary">Thêm</button>
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
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
                <h3>Thêm lịch tiêm</h3>


                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="" method="post" id="frmQLLT">
                            <div class="form-group">
                                <label for="dtNgayHenTiem">Lịch dự kiến: </label>
                                <input type="date" name="dtNgayHenTiem" id="dtNgayHenTiem" class="form-control" required value="">
                            </div>

                            <div class="form-group">
                                <label for="">Cơ sở:</label>
                                <select name="slCoSo" id="slCoSo" class="custom-select">
                                    <option value="">--Chọn--</option>
                                <?php foreach ($arrcoso as $coso) : ?>

                                        <option value="<?= $coso->layID(); ?>" class="font-weight-bold"><span ><?=$coso->ten?></span> <span><?=  ", " . $coso->diachi . ", " . $coso->quan . ", " . $coso->tinh; ?></span></option>



                                    <?php endforeach; ?>
                                </select>
                            </div>



                            <a class="btn btn-light rounded-circle border border-primary text-primary " href="index.php"><i class="fa-solid fa-arrow-left"></i></a>

                            <button name="btnSave" id="btnSave" class="btn btn-primary rounded-pill w-75 float-right">Thêm</button>
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
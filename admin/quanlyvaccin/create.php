<?php
require_once '../../db_connect.php';

use TC\OBS\Vaccine;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $e = new Vaccine($PDO);
    $e->fill($_POST);

    $e->save();

    header('Location: index.php');
}

use TC\OBS\LoaiVaccine;

$loai = new LoaiVaccine($PDO);
$mangloai = $loai->all();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý vắc xin </title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3 class="">Thêm vắc xin</h3>

                
                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="" method="post" id="frmQLVC">
                            
                            <div class="form-group">
                                <label for="txtTenVaccine">Tên vắc xin: </label>
                                <input type="text" name="txtTenVaccine" id="txtTenVaccine" class="form-control" required value="">
                            </div>
                            <div class="form-group">
                                <label for="txtHieuLuc">Hiệu lực: </label>
                                <input type="number" name="txtHieuLuc" id="txtHieuLuc" class="form-control" required value="">
                                
                            </div>
                            <label for="slLoaiVaccine">Loại vắc xin:</label>
                            <div class="form-group">
                            <select name="slLoaiVaccine" id="slLoaiVaccine" class="custom-select">
                                <option value="">--Chọn--</option>
                                <?php foreach ($mangloai as $loai) : ?>

                                    <option value="<?= $loai->layID(); ?>"><?= $loai->ten; ?></option>



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
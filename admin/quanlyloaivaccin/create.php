<?php
require_once '../../db_connect.php';

use TC\OBS\LoaiVaccine;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $e = new LoaiVaccine($PDO);
    $e->fill($_POST);

    $e->save();
    //var_dump($coso);
    header('Location: index.php');
}




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
                <h3 class="">Thêm loại vắc xin</h3>

                
                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="" method="post" id="frmQLVC">
                        
                            <div class="form-group">
                                <label for="txtTenLoaiVaccine">Tên loại vắc xin </label>
                                <input type="text" name="txtTenLoaiVaccine" id="txtTenLoaiVaccine" class="form-control" required value="">
                            </div>
                            <div class="form-group">
                                <label for="txtMoTa">Mô tả </label>
                                <textarea type="text" name="txtMoTa" id="txtMoTa" class="form-control" required value=""></textarea>
                                
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
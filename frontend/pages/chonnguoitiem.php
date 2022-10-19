<?php
require_once '../../db_connect.php';

use TC\OBS\LichHenTiem;

$lich = new LichHenTiem($PDO);
$lich->find($_GET["id"]);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Đăng ký hộ</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">
        <!-- <p class="">Đang ký tiêm chủng</p> -->
        <div class="container-lg border">
            <h5>Chọn người thân</h5>
            <div class="row">
                <?php foreach($dsnguoithan as $nguoithan): ?>
                <div class="card col-5 ml-5 my-2" style="width: 50%;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $nguoithan->hoten?></h5>
                        <hr>
                        <p class="card-text"><?= $nguoithan->ngaysinh ?></p>
                        <p class="card-text"><?php if($nguoithan->gioitinh == 0){
                            echo "Nam";
                        } else if($nguoithan->gioitinh == 1){
                            echo "Nữ";
                        } ?></p>
                        <p class="card-text"><?= $kh->diachi.', '.$kh->phuong.', '.$kh->quan.', '.$kh->tinh?></p>
                        <form action="xulydangkytiemnt.php" method="POST">
                            <input type="text" name="idLT" value="<?= $lich->getId() ?>"  hidden>
                            <input type="text" name="idNT" value="<?= $nguoithan->layId()?>"  hidden>
                            <button type="submit" class="btn btn-primary" name="btnChonNguoiThan">Chọn</button>
                        </form>
                        
                    </div>
                </div>
                <?php endforeach;?>
                
            </div>
            


        </div>
    </main>





    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/script.php'; ?>




    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
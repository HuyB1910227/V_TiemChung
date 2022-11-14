<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Lịch sử tiêm chủng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <?php

 
    $ngayhethieuluc = $kh->dateEXP();
    // var_dump($ngayhethieuluc);
    foreach ($arrpdk as $p) {
        $p->checkToCancel($ngayhethieuluc);
    }

    ?>
    <main class="row">



        <div class="container p-0">
            <h3 class="titile">Lịch sử đăng ký tiêm chủng</h3>
            <br>
            <h5 class="text-center font-weight-bold">Đăng ký tiêm cho cá nhân</h5>
            <div class="row  ">
                <?php foreach ($arrpdk as $phieudk) : ?>
                    <div class="col-12 col-lg-6">
                        <div class="card p-4 mx-auto my-2" style="width:400px; position: relative">


                            <?php if ($phieudk->trangthai == 0) {
                                echo "<div class=\"badge badge-info mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Chưa xác nhận</div>";
                            } else if ($phieudk->trangthai == 1) {
                                echo "<div class=\"badge badge-primary mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã xác nhận</div>";
                            } else if ($phieudk->trangthai == 2) {
                                echo "<div class=\"badge badge-warning mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã từ chối</div>";
                            } else if ($phieudk->trangthai == 3) {
                                echo "<div class=\"badge badge-danger mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã hủy</div>";
                            } else if ($phieudk->trangthai == 4) {
                                echo "<div class=\"badge badge-success mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã hoàn thành</div>";
                            }
                            ?>
                            <div class="">Họ và tên: <b> <?= $user->hoten ?></b></div>
                            <div class="">Ngày tiêm: <b> <?= $phieudk->findVaccinationSchedule()->ngaytiem ?></b></div>
                            <div>Cơ sở: <b><?= $phieudk->findVaccinationSchedule()->findLocation()->ten ?></b> </div>
                            <div>Địa điểm: <b><i><?= $phieudk->findVaccinationSchedule()->findLocation()->diachi . ", " .
                                                        $phieudk->findVaccinationSchedule()->findLocation()->phuong . ", " .
                                                        $phieudk->findVaccinationSchedule()->findLocation()->quan . ", " . $phieudk->findVaccinationSchedule()->findLocation()->tinh ?></i></b> </div>
                        </div>
                    </div>


                <?php endforeach; ?>



            </div>

            <hr>
            <h5 class="text-center font-weight-bold">Đăng ký tiêm cho người thân</h5>
            <div class="row  ">
                <?php foreach ($dsnguoithan as $nguoithan) : ?>
                    <?php $dspdk = $phieudk->selectFromUser($nguoithan->layId()) ?>
                    <?php foreach ($dspdk  as $phieudk) : ?>
                    <div class="col-12 col-lg-6">
                        <div class="card p-4 mx-auto my-2" style="width:400px; position: relative">


                            <?php if ($phieudk->trangthai == 0) {
                                echo "<div class=\"badge badge-info mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Chưa xác nhận</div>";
                            } else if ($phieudk->trangthai == 1) {
                                echo "<div class=\"badge badge-primary mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã xác nhận</div>";
                            } else if ($phieudk->trangthai == 2) {
                                echo "<div class=\"badge badge-warning mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã từ chối</div>";
                            } else if ($phieudk->trangthai == 3) {
                                echo "<div class=\"badge badge-danger mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã hủy</div>";
                            } else if ($phieudk->trangthai == 4) {
                                echo "<div class=\"badge badge-success mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã hoàn thành</div>";
                            }
                            ?>
                             <div class="">Họ và tên: <b> <?= $nguoithan->hoten ?></b></div>
                    <div class="">Ngày tiêm: <b> <?= $phieudk->findVaccinationSchedule()->ngaytiem ?></b></div>
                    <div>Cơ sở: <b><?= $phieudk->findVaccinationSchedule()->findLocation()->ten ?></b> </div>
                    <div>Địa điểm: <b><i><?= $phieudk->findVaccinationSchedule()->findLocation()->diachi . ", " .
                                                $phieudk->findVaccinationSchedule()->findLocation()->phuong . ", " .
                                                $phieudk->findVaccinationSchedule()->findLocation()->quan . ", " . $phieudk->findVaccinationSchedule()->findLocation()->tinh ?></i></b> </div>
                        </div>
                    </div>
                    <?php endforeach; ?>


                <?php endforeach; ?>


                
            </div>


        </div>



    </main>


    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>

</html>
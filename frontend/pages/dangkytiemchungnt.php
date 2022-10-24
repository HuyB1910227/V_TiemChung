<?php
require '../../db_connect.php';

use TC\OBS\LichHenTiem;

$lich = new LichHenTiem($PDO);
$arrlichhen = $lich->all();

use TC\OBS\CoSoTiem;

$coso = new CoSoTiem($PDO);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Đăng ký hộ</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">
        <div class="container-lg">
            <div class="text-center">
                <h3 class="titile mb-1">Đăng ký tiêm cho người thân</h3>
            </div>
            <div class="row m-1">
                <a href="dangkytiemchung.php" class="btn btn-primary mr-auto"> <i class="fa-solid fa-arrow-left"></i> Đăng ký tiêm cho cá nhân </a>

            </div>
            <hr>
            <table class="table table-bordered bg-white table-responsive" id="lichhen">
                <thead>
                    <tr class="bg-primary text-center text-light">
                        <!-- <th>Chọn</th> -->

                        <th>Mã lịch hẹn</th>
                        <th>Ngày hẹn tiêm</th>
                        <th>Cơ sở tiêm</th>
                        <th>Địa chỉ</th>
                        <th>Phường / Xã</th>
                        <th>Quận / Huyện</th>
                        <th>Thành phố / Tỉnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arrlichhen as $i => $lich) : ?>
                        <?php $coso = $lich->findLocation(); ?>
                        <?php if ($coso->trangthai == 1 && strtotime($lich->ngaytiem) >= $today) : ?>
                            <tr>

                                <td><?= $lich->getId() ?></td>
                                <td><?= $lich->ngaytiem ?></td>
                                <td><?= $coso->ten ?></td>
                                <td><?= $coso->diachi ?></td>
                                <td><?= $coso->phuong ?></td>
                                <td><?= $coso->quan ?></td>
                                <td><?= $coso->tinh ?></td>
                                <td>
                                    <?php
                                    $t = false;
                                    foreach ($arrpdk as $phieudk) {
                                        $result = false;
                                        if ($phieudk->findVaccinationSchedule()->getID() == $lich->getID()) {
                                            $result = true;
                                            $t = true;
                                            break;
                                        }
                                    };
                                    ?>

                                    <!-- <a class="btn btn-light text-primary disabled" href="xulydangkytiem.php?id=<?= $lich->getID(); ?>">Đã đăng ký</a>
                                    
                                       
                                            <a class="btn btn-light text-primary btn-link disabled" href="xulydangkytiem.php?id=<?= $lich->getID(); ?>">Chưa đến hạn tiêm</a> -->

                                    <a class="btn btn-light text-primary btn-link" href="chonnguoitiem.php?id=<?= $lich->getID(); ?>">Đăng ký</a>


                                </td>
                            </tr>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </main>





    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {

            $('#lichhen').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
                },


            });
            // var table = $('#lichhen').DataTable({
            //     dom: 'lrtip'

            // });
            // $('#tp').on('change', function() {
            //     table.search(this.value).draw();
            // });

        });
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->



</body>

</html>
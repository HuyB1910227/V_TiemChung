<?php
    require_once '../../db_connect.php';
    use TC\OBS\LichHenTiem;
    $lich = new LichHenTiem($PDO);
    $arrlichhen= $lich->all();

    use TC\OBS\CoSoTiem;
    $coso = new CoSoTiem($PDO);

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Đăng ký tiêm chủng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
	
 
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">
        <div class="container-lg p-5">
            <table class="table table-bordered bg-white table-responsive" id="lichhen">
                <thead>
                    <tr class="bg-primary text-center text-light">
                        <!-- <th>Chọn</th> -->
                        <th>STT</th>
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
                    <?php if($coso->trangthai == 1): ?>
                        <tr>
                            <td><?= ++$i ?></td>
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
                                    foreach($arrpdk as $phieudk){
                                    $result = false;
                                    if($phieudk->findVaccinationSchedule()->getID() == $lich->getID()){
                                        $result = true;
                                        $t = true;
                                        break;
                                    }
                                   
                                    };
                                ?>
                                <?php if($t==1 ):?>
                                    <a class="btn btn-light text-primary disabled" href="xulydangkytiem.php?id=<?= $lich->getID();?>">Đã đăng ký</a>
                                <?php else: ?>
                                    <?php if($kh->compareDateEXP($lich->ngaytiem) == false): ?>
                                        <a class="btn btn-light text-primary btn-link disabled" href="xulydangkytiem.php?id=<?= $lich->getID();?>">Chưa đến hạn tiêm</a>
                                    <?php else: ?>
                                        <a class="btn btn-light text-primary btn-link" href="xulydangkytiem.php?id=<?= $lich->getID();?>">Đăng ký</a>
                                    <?php endif;?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="9">Không có lịch tiêm</td>
                        </tr>
                    <?php endif;?>
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
			
			$('#lichhen').DataTable();

			
		});
        // $(document).ready(function() {
        //     const btnNext1 = $('#btnNext1');
        //     const btnNext2 = $('#btnNext2');
        //     const btnPrev3 = $('#btnPrev3');
        //     const btnPrev2 = $('#btnPrev2');

        //     function findAActiveClassInForm() {
        //         var aActiveClass = $('#dangkytiem a.active');
        //         console.log(aActiveClass);
        //         aActiveClass.removeClass('active');
        //         aActiveClass.addClass('disabled');
        //         const dvActiveClass = $('div.active');
        //         console.log(dvActiveClass)
        //         dvActiveClass.removeClass('active');

        //     }
            // const modDvDisplay = (id) => {

            //     $('a[href="#`${id}`"]').removeClass('disabled').addClass('active').trigger('click');
            //     $(`'div#${id}'`).addClass('active');
            // }
        //     btnNext1.on('click', function() {
        //         findAActiveClassInForm();
        //         // modDvDisplay("tiensutiem");
        //         $('a[href="#tiensutiem"]').removeClass('disabled').addClass('active').trigger('click');
        //         $('div#tiensutiem').addClass('active');
        //     })
        //     btnNext2.on('click', function() {
        //         findAActiveClassInForm();
        //         $('a[href="#phieudongy"]').removeClass('disabled').addClass('active').trigger('click');
        //         $('div#phieudongy').addClass('active');
        //     })
        //     btnPrev3.on('click', function() {
        //         findAActiveClassInForm();
        //         $('a[href="#tiensutiem"]').removeClass('disabled').addClass('active').trigger('click');
        //         $('div#tiensutiem').addClass('active');
        //     })
        //     btnPrev2.on('click', function() {
        //         findAActiveClassInForm();
        //         $('a[href="#thongtincanhan"]').removeClass('disabled').addClass('active').trigger('click');
        //         $('div#thongtincanhan').addClass('active');
        //     })
        // })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
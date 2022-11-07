<?php

use TC\OBS\TaiKhoan;

    require_once '../../db_connect.php';
    $taikhoan = new TaiKhoan($PDO);
    $arrtaikhoan = $taikhoan->all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý tài khoản</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3>Danh sách tài khoản</h3>
                <div class="bg-white p-2">
                    
                    <div class="float-right">
                        
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive-lg " id="tbTaiKhoan">
                        <thead>
                            <tr class="">
                            
                            <th>STT</th>
                            <th>Mã tài khoản</th>
                            <th>Tên tài khoản</th>
                            <th>Họ và tên</th>
                            <th>Số điện thoại</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($arrtaikhoan as $i => $taikhoan):?>
                       
                        <tr>
                            <td><?= ++$i?></td>
                            <td><?= $taikhoan->getId()?></td>
                            <td><?= $taikhoan->ten?></td>
                            <td><?= $taikhoan->hoten?></td>
                            <td><?= $taikhoan->sdt?></td>
                           
                            
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
           
        </div>
        
    </div>
    </div>
    
    




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
    <script>
        $(document).ready(function() {
			
			$('#tbTaiKhoan').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
                },
            });

			
		});
        
    </script>
</body>

</html>
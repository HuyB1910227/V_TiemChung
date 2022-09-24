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
    <title>Quản lịch hẹn tiêm</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10">
                <h3 class="text-info">Danh sách lịch sử tiêm chủng</h3>
                 
                 
                <div class="bg-white p-2">
                    <p class="float-left">Tổng số lượng: <?php echo count($arrlichhen)?></p>
                    <div class="float-right">
                        <button type="button" id="btnXoaN" class="btn btn-danger">Xóa</button>
                        <a class="btn btn-primary btn-link text-light" href="/V_TiemChung/backend/quanlycosotiem/create.php">Thêm</a>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive">
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
                        <?php foreach($arrlichhen as $i => $lich):?>
                        <?php $coso = $lich->findLocation();?>
                        <tr>
                            <td><?= ++$i?></td>
                            <td><?= $lich->getId()?></td>
                            <td><?= $lich->ngaytiem?></td>
                            <td><?= $coso->ten?></td>
                            <td><?= $coso->diachi?></td>
                            <td><?= $coso->phuong?></td>
                            <td><?= $coso->quan?></td>
                            <td><?= $coso->tinh?></td>
                            <td></td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
           
        </div>
        
    </div>
    </div>
    
    




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
    <script>
        $(document).ready(function(){
            
            $('.btnDelete').click(function(){
                var cs_id = $(this).data('cs_id');
                console.log(cs_id);
                var url = "delete.php?cs_id=" + cs_id;
                location.href = url;
            });
            

        });
    </script>
</body>

</html>
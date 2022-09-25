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
            <div class="col-10">
                <h3 class="text-info">Thêm Vắc xin</h3>
                 
                <form action="" method="post">
                    <!-- <label for="txtMaLichHen">Mã lịch hẹn: </label>
                    <input type="text" name="txtMaLichHen" id="txtMaLichHen" value="" readonly><br> -->
                    <label for="dtNgayHenTiem">Ngày hẹn tiêm: </label>
                    <input type="date" name="dtNgayHenTiem" id="dtNgayHenTiem" required value=""><br>
                    
                    <select name="slCoSo" id="slCoSo">
                        <?php foreach($arrcoso as $coso): ?>
                           
                            <option value="<?= $coso->layID();?>" ><?= $coso->ten; ?></option>
                            
                                
                            
                        <?php endforeach; ?>
                    </select>
                    
                    
                   
                    <button name="btnSave" id="btnSave">Thêm</button>
                </form>
                
            </div>
        </div>
    </div>
   






    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
</body>

</html>
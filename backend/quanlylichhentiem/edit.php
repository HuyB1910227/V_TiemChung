<?php 
    require '../../db_connect.php';
    use TC\OBS\LichHenTiem;
    $e = new LichHenTiem($PDO);
    $id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
    if ($id < 0 || !($e->find($id))) {
		header('Location : index.php');
	}
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $e->fill($_POST);
        // var_dump($e);
        $e->save();
    
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
    <title>Quản lý cơ sở tiêm</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>


<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10">
                <h3 class="text-info">Sửa cơ sở</h3>
                
                <form action="" method="post">
                    <label for="txtMaCoSo">Mã cơ sở: </label>
                    <input type="text" name="txtMaCoSo" id="txtMaCoSo" value="<?= $e->getID()?>" readonly><br>
                    <label for="dtNgayHenTiem">Ngày hẹn tiêm: </label>
                    <input type="date" name="dtNgayHenTiem" id="dtNgayHenTiem" required value="<?=$e->ngaytiem?>"><br>
                    
                    <select name="slCoSo" id="slCoSo">
                        <?php foreach($arrcoso as $coso): ?>
                           
                            <option value="<?= $coso->layID();?>" <?php if($coso->layID() == $e->cs_id) {echo "selected";};?>><?= $coso->ten; ?></option>
                            
                                
                            
                        <?php endforeach; ?>
                    </select>
                    <button name="btnSave" id="btnSave">Sửa</button>
                </form>
            </div>
        </div>
    </div>
    






    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>

    <!-- <script>
        $(function(){
            $SelectData = <?= $data['cs_trangthai']?>;
            console.log($SelectData)
            $SelectOp = $('#slTrangThai');
            console.log($SelectOp[0]);
            
        })
    </script> -->
</body>

</html>
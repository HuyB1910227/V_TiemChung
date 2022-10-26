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
            <div class="col-10 offset-2">
                <h3>Sửa lịch hẹn</h3>
                
              
                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="" method="post">
                        
                            <div class="form-group">
                            <label for="dtNgayHenTiem">Ngày hẹn tiêm: </label>
                    <input type="date" name="dtNgayHenTiem" id="dtNgayHenTiem" required value="<?=$e->ngaytiem?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Cơ sở:</label>
                                <select name="slCoSo" id="slCoSo" class="custom-select">
                                <?php foreach($arrcoso as $coso): ?>
                           
                                        <option value="<?= $coso->layID();?>" <?php if($coso->layID() == $e->cs_id) {echo "selected";};?>><?= $coso->ten . ", " . $coso->diachi . ", " . $coso->quan . ", " . $coso->tinh; ?></option>
                           
                               
                           
                       <?php endforeach; ?>
                                </select>
                            </div>



                            <a class="btn btn-light rounded-circle border border-primary text-primary " href="index.php"><i class="fa-solid fa-arrow-left"></i></a>

                            <button name="btnSave" id="btnSave" class="btn btn-primary rounded-pill w-75 float-right">Cập nhật</button>
                        </form>
                    </div>
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
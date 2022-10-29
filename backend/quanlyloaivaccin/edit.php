<?php 
    require '../../db_connect.php';
    use TC\OBS\LoaiVaccine;
    $loai = new LoaiVaccine($PDO);
    $id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
    if ($id < 0 || !($loai->find($id))) {
		header('Location : index.php');
	}
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $loai->fill($_POST);
        $loai->save();
    
        header('Location: index.php');
    }

    // use TC\OBS\LoaiVaccine;
    // $loai = new LoaiVaccine($PDO);
    // $mangloai = $loai->all();


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý vắc xin</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>


<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3 >Sửa loại vắc xin</h3>
                
                <!-- <form action="" method="post">
                   <br>
                    <br>
                    <br>
                    
                    
                    
                   
                    
                </form> -->
                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="" method="post" id="frmQLVC">
                            <div class="form-group">
                            <label for="txtMaLoaiVaccine">Mã Vắc xin: </label>
                    <input type="text" name="txtMaLoaiVaccine" id="txtMaLoaiVaccine" class="form-control" value="<?= $loai->layID()?>" readonly>
                            </div>
                            <div class="form-group">
                            <label for="txtTenLoaiVaccine">Tên loại </label>
                    <input type="text" name="txtTenLoaiVaccine" id="txtTenLoaiVaccine" class="form-control" required value="<?= $loai->ten?>">
                            </div>
                            <div class="form-group">
                            <label for="txtMoTa">Mô tả </label>
                    <textarea type="text" name="txtMoTa" id="txtMoTa" class="form-control" required ><?= $loai->mota?></textarea>
                            </div>
                            
                            
                            <a class="btn btn-light rounded-circle border border-primary text-primary " href="index.php"><i class="fa-solid fa-arrow-left"></i></a>

                            <button name="btnSave" id="btnSave" class="btn btn-primary rounded-pill w-75 float-right">Cập nhật</button>
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
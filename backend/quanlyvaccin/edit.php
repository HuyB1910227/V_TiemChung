<?php 
    require '../../db_connect.php';
    use TC\OBS\Vaccine;
    $vaccine = new Vaccine($PDO);
    $id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
    if ($id < 0 || !($vaccine->find($id))) {
		header('Location : index.php');
	}
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $vaccine->fill($_POST);
        $vaccine->save();
    
        header('Location: index.php');
    }

    use TC\OBS\LoaiVaccine;
    $loai = new LoaiVaccine($PDO);
    $mangloai = $loai->all();


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Sửa vaccine</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>


<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3 >Sửa Vaccine</h3>
                
                <!-- <form action="" method="post">
                   <br>
                    <br>
                    <br>
                    
                    
                    
                   
                    
                </form> -->
                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="" method="post" id="frmQLVC">
                            <div class="form-group">
                            <label for="txtMavaccine">Mã Vắc xin: </label>
                    <input type="text" name="txtMavaccine" id="txtMavaccine" class="form-control" value="<?= $vaccine->layID()?>" readonly>
                            </div>
                            <div class="form-group">
                            <label for="txtTenVaccine">Tên Vắc xin: </label>
                    <input type="text" name="txtTenVaccine" id="txtTenVaccine" class="form-control" required value="<?= $vaccine->ten?>">
                            </div>
                            <div class="form-group">
                            <label for="txtHieuLuc">Hiệu lực: </label>
                    <input type="text" name="txtHieuLuc" id="txtHieuLuc" class="form-control" required value="<?= $vaccine->hieuluc?>">
                            </div>
                            <label for="slLoaiVaccine">Loại vắc xin:</label>
                            <div class="form-group">
                            <select name="slLoaiVaccine" id="slLoaiVaccine" class="custom-select">
                        <?php foreach($mangloai as $loai): ?>
                            <?php if($loai->layID() == $vaccine->lvc_id):?>
                                <option value="<?= $loai->layID();?>" selected><?= $loai->ten; ?></option>
                            <?php else:?>
                                <option value="<?= $loai->layID();?>"><?= $loai->ten; ?></option>
                            <?php endif;?>
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
    </div>
    






    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>

    
</body>

</html>
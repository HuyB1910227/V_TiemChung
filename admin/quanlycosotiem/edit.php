<?php 
    require '../../db_connect.php';
    use TC\OBS\CoSoTiem;
    $coso = new CoSoTiem($PDO);
    $id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
    if ($id < 0 || !($coso->find($id))) {
		header('Location : index.php');
	}
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $coso->fill($_POST);
        $coso->save();
    
        header('Location: index.php');
    }



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
                <h3 class="">Sửa cơ sở</h3>
                <div class="card frmCreate " >
                    <div class="card-body">
                        <form action="" method="post" id="frmQLCS">
                            <div class="form-group">
                            <label for="txtMaCoSo">Mã cơ sở: </label>
                            <input type="text" name="txtMaCoSo" id="txtMaCoSo" value="<?= $coso->layId()?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                            <label for="txtTenCoSo">Tên cơ sở: </label>
                            <input type="text" name="txtTenCoSo" id="txtTenCoSo" required value="<?= $coso->ten?>" class="form-control">
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="">Tỉnh/ Thành phố</label>
                                <select name="txtTinh" id="txtTinh" class="custom-select">
                                    <option value="<?= $coso->tinh?>"><?= $coso->tinh?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Quận/ Huyện</label>
                                <select name="txtQuan" id="txtQuan" class="custom-select">
                                    <option value="<?= $coso->quan?>"><?= $coso->quan?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Phường/ Xã</label>
                                <select name="txtPhuong" id="txtPhuong" class="custom-select">
                                    <option value="<?= $coso->phuong?>"><?= $coso->phuong?></option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="txtDiaChi">Địa chỉ </label>
                        <input type="text" name="txtDiaChi" id="txtDiaChi" class="form-control" required value="<?= $coso->diachi?>">
                            </div>
                            <div class="form-group">
                            <label for="">Trạng thái hoạt động</label>
                            <select name="slTrangThai" id="slTrangThai" class="custom-select">
                            <?php if ($coso->trangthai == 0):?>
                            <option value="0" selected>Không hoạt động</option>
                            <option value="1" >Hoạt động</option>
                        <?php else:?>
                            <option value="0">Không hoạt động</option>
                            <option value="1" selected>Hoạt động</option>
                        <?php endif;?>
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
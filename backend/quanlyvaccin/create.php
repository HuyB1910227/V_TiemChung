<?php
    require_once '../../db_connect.php';

    use TC\OBS\Vaccine;

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $e = new Vaccine($PDO);
        $e->fill($_POST);
        
        $e->save();
        //var_dump($coso);
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
                    <label for="txtMavaccine">Mã Vắc xin: </label>
                    <input type="text" name="txtMavaccine" id="txtMavaccine" value="" readonly><br>
                    <label for="txtTenVaccine">Tên Vắc xin: </label>
                    <input type="text" name="txtTenVaccine" id="txtTenVaccine" required value=""><br>
                    <label for="txtHieuLuc">Hiệu lực: </label>
                    <input type="text" name="txtHieuLuc" id="txtHieuLuc" required value=""><br>
                    <select name="slLoaiVaccine" id="slLoaiVaccine">
                        <?php foreach($mangloai as $loai): ?>
                           
                                <option value="<?= $loai->layID();?>" ><?= $loai->ten; ?></option>
                            
                                
                            
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
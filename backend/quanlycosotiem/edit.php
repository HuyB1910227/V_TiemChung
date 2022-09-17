<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý cơ sở tiêm</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>
<?php 
if(isset($_GET['cs_id'])!=null){
    $cs_id = $_GET['cs_id'];
    var_dump($cs_id);
    include_once(__DIR__ . '/../../dbconnect.php');
    $sqlSelect = "SELECT * FROM co_so_tiem_chung WHERE cs_id = $cs_id";
    $data = mysqli_fetch_array(mysqli_query($conn, $sqlSelect), MYSQLI_ASSOC);
    var_dump($data);
}

?>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10">
                <h3 class="text-info">Sửa cơ sở</h3>
                
                <form action="edit.php" method="post">
                    <label for="txtMaCoSo">Mã cơ sở: </label>
                    <input type="text" name="txtMaCoSo" id="txtMaCoSo" value="<?= $data['cs_id']?>" readonly><br>
                    <label for="txtTenCoSo">Tên cơ sở: </label>
                    <input type="text" name="txtTenCoSo" id="txtTenCoSo" required value="<?= $data['cs_ten']?>"><br>
                    <label for="txtTinh">Tỉnh/Thành Phố: </label>
                    <input type="text" name="txtTinh" id="txtTinh" required value="<?= $data['cs_tinh']?>"><br>
                    <label for="txtQuan">Quận/Huyện: </label>
                    <input type="text" name="txtQuan" id="txtQuan" required value="<?= $data['cs_quan']?>"><br>
                    <label for="txtPhuong">Phường/Xã: </label>
                    <input type="text" name="txtPhuong" id="txtPhuong" required value="<?= $data['cs_phuong']?>"><br>
                    <label for="txtDiaChi">Địa chỉ: </label>
                    <input type="text" name="txtDiaChi" id="txtDiaChi" required value="<?= $data['cs_diachi']?>"><br>
                    <select name="slTrangThai" id="slTrangThai">
                        
                            <option value="0" selected>Không hoạt động</option>
                        
                            <option value="1" >Hoạt động</option>
                        
                        
                        
                    </select>
                    <button name="btnSave" id="btnSave">Sửa</button>
                </form>
            </div>
        </div>
    </div>
    <?php
                
                if(isset($_POST['btnSave'])){
                    var_dump($cs_id);
                    include_once(__DIR__ . '/../../dbconnect.php');
                    $maCoSo = $_POST['txtMaCoSo'];
                    $tenCoSo = $_POST['txtTenCoSo'];
                    $tinh = $_POST['txtTinh'];
                    $quan = $_POST['txtQuan'];
                    $phuong = $_POST['txtPhuong'];
                    $diaChi = $_POST['txtDiaChi'];
                    $trangThai = $_POST['slTrangThai'];
                    // var_dump($trangThai);
                    $sqlEdit = <<<EOF
                    UPDATE co_so_tiem_chung 
                    SET cs_ten = '$tenCoSo', cs_diachi = '$diaChi', cs_phuong = '$phuong', cs_quan='$quan', cs_tinh = '$tinh', cs_trangthai = $trangThai
                    WHERE cs_id = $maCoSo; 
EOF;                
                    mysqli_query($conn, $sqlEdit);
                    echo '<script>location.href="/V_TiemChung/backend/quanlycosotiem/index.php"</script>';
                }
                ?>






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
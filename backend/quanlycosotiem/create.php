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
                <h3 class="text-info">Thêm cơ sở</h3>
                
                <form action="create.php" method="post">
                    <label for="txtTenCoSo">Tên cơ sở: </label>
                    <input type="text" name="txtTenCoSo" id="txtTenCoSo" required><br>
                    <label for="txtTinh">Tỉnh/Thành Phố: </label>
                    <input type="text" name="txtTinh" id="txtTinh" required><br>
                    <label for="txtQuan">Quận/Huyện: </label>
                    <input type="text" name="txtQuan" id="txtQuan" required><br>
                    <label for="txtPhuong">Phường/Xã: </label>
                    <input type="text" name="txtPhuong" id="txtPhuong" required><br>
                    <label for="txtDiaChi">Địa chỉ: </label>
                    <input type="text" name="txtDiaChi" id="txtDiaChi" required><br>
                    <select name="slTrangThai" id="slTrangThai">
                        <option value="0" selected>Không hoạt động</option>
                        <option value="1">Hoạt động</option>
                    </select>
                    <button name="btnThem" id="btnThem">Thêm</button>
                </form>
            </div>
        </div>
    </div>
    <?php
                
                if(isset($_POST['btnThem'])){
                    include_once(__DIR__ . '/../../dbconnect.php');
                    $tenCoSo = $_POST['txtTenCoSo'];
                    $tinh = $_POST['txtTinh'];
                    $quan = $_POST['txtQuan'];
                    $phuong = $_POST['txtPhuong'];
                    $diaChi = $_POST['txtDiaChi'];
                    $trangThai = $_POST['slTrangThai'];
                    // var_dump($trangThai);
                    $sql_add = <<<EOF
                    INSERT INTO co_so_tiem_chung ( cs_ten, cs_diachi, cs_phuong,cs_quan, cs_tinh, cs_trangthai)
                    VALUES ('$tenCoSo', '$diaChi', '$phuong', '$quan', '$tinh',$trangThai);
EOF;                
                    mysqli_query($conn, $sql_add);
                    echo '<script>location.href="/V_TiemChung/backend/quanlycosotiem/index.php"</script>';
                }
                ?>






    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
</body>

</html>
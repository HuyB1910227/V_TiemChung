<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin giảng viên</title>
</head>
<body>
    <h3>Sửa giảng viên: </h3>
    <form action="edit.php" method="post">
        <label for="txtMaGV">Mã giảng viên: </label>
        <input type="text" name="txtMaGV" id="txtMaGV"><br>
        <label for="txtTenGV">Tên giảng viên: </label>
        <input type="text" name="txtTenGV" id="txtTenGV"><br>
        <button name="btnSua" id="btnSua">Lưu dữ liệu</button>
    </form>
    <?php 
    if(isset($_POST['btnSua'])){
        include_once(__DIR__.'/../dbconnect.php');
        $ma = $_POST['txtMaGV'];
        $ten = $_POST['txtTenGV'];
        $sql = <<<EOT
        UPDATE giangvien 
        SET gv_ten = '$ten' 
        WHERE gv_ma = '$ma';
EOT;
        mysqli_query($conn, $sql);
    }
   

    ?>

</body>
</html>
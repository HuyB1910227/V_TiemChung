<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa giảng viên</title>
</head>
<body>
<?php $id = $_GET['gv_ma']?>
<h3>Xóa giảng viên: </h3>
    <form action="delete.php" method="post">
        <label for="txtMaGV">Mã giảng viên: </label>
        <input type="text" name="txtMaGV" id="txtMaGV" value="<?= $id?>" disabled><br>
        <button name="btnDelete">Xóa</button>
    </form>
    
    <?php 
    if(isset($_POST['btnDelete']))
    include_once(__DIR__.'/../dbconnect.php');
    $ma = $_POST['txtMaGV'];
    $sql = "DELETE from giangvien WHERE gv_ma LIKE '$ma';";
    mysqli_query($conn, $sql);
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm giảng viên</title>
</head>
<body>
    <h3>Thêm mới giảng viên: </h3>
    <form action="create.php" method="post">
        <label for="txtMaGV">Mã giảng viên: </label>
        <input type="text" name="txtMaGV" id="txtMaGV" required><br>
        <label for="txtTenGV">Tên giảng viên: </label>
        <input type="text" name="txtTenGV" id="txtTenGV" required><br>
        <label for="txtSDT">Số điện thoại: </label>
        <input type="text" name="txtSDT" id="txtSDT" required>
        <button name="btnThem" id="btnThem">Thêm</button>
    </form>
    <?php
        if(isset($_POST['btnThem'])){
            include_once(__DIR__ .'/../dbconnect.php');
            $ma = $_POST['txtMaGV'];
            $ten = $_POST['txtTenGV'];
            $sdt = $_POST['txtSDT'];
            settype($sdt, "int");
            $sql = "INSERT INTO giangvien (gv_ma,gv_ten,gv_sodienthoai) VALUES('$ma', '$ten', $sdt);";
            mysqli_query($conn, $sql);
            echo '<script>location.href="index.php"</script>';
        }
        
    ?>
    
    <!-- <script>
        const btnThem = document.querySelector('#btnThem');
        btnThem.onclick = function(){
            
        }
    </script> -->
</body>
</html>
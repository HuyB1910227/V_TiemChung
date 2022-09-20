<?php
    session_start();
    if(!isset($_SESSION['btnDangNhap'])){
        header('Location:dangnhap.php');
    }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/layouts/meta.php'; ?>
    <title>Quản lý V_Tiêm chủng</title>
    <?php include_once __DIR__ . '/layouts/styles.php'; ?>
</head>

<body>
    <?php 

    ?>
    <?php include_once __DIR__ . '/layouts/partials/header.php'; ?>
    
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/layouts/partials/sidebar.php'; ?>
            <div class="col">
                Đây là trang dashboard
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . '/layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/layouts/scripts.php'; ?>
</body>

</html>
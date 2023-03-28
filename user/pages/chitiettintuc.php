<?php
    use TC\OBS\TinTuc;
    require '../../db_connect.php';
    $cn = new TinTuc($PDO);
    if (isset($_GET["id"])) {
        $cn->find($_GET["id"]);
    } else {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Cẩm nang y tế</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>
<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">
        <div class="container">
            <img src="../../assets/uploads/<?= $cn->hinhanh?>" alt="" class="w-100" height="500px"> <br>
            <?= $cn->noidung?>
        </div>
    </main>
    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>

</html>
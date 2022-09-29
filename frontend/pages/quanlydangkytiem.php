
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Lịch sử tiêm chủng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">
        <div class="container p-4">
            <h5>Đăng ký tiêm chủng</h5>
            <div class="card p-4" style="width: 400px; position: relative;">
                <div class="badge badge-success mt-0" style="width: 100px; position: absolute; top: 0px; right: 1px">Đã xác nhận</div>
                <div class="">Ngày tiêm: </div>
                <div>Cơ sở:</div>
                <button class="w-50 btn rounded-pill btn-primary m-auto">Xem chi tiết</button>
            </div>
        </div>
        
        
    </main>


    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>

</html>
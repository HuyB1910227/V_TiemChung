
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
            <h5>Lịch sử đăng ký tiêm chủng.</h5>
            <?php foreach($arrpdk as $phieudk):?>
            
            <div class="card p-4 m-3" style="width: 400px; position: relative;">
            <!-- -->
                
                    <?php if($phieudk->trangthai == 0){
                            echo "<div class=\"badge badge-success mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Chưa xác nhận";
                        }
                        else if($phieudk->trangthai == 1){
                            echo "<div class=\"badge badge-success mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã xác nhận";
                        } else {
                            echo "<div class=\"badge badge-success mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã từ chối";
                        }
                    ?>
            
                </div>
                <div class="">Ngày tiêm: <?= $phieudk->findVaccinationSchedule()->ngaytiem?></div>
                <div>Cơ sở: <?= $phieudk->findVaccinationSchedule()->findLocation()->ten?></div>
                <!-- <button class="w-50 btn rounded-pill btn-primary m-auto">Xem chi tiết</button> -->
            </div>
            <?php endforeach;?>
        </div>
        
        
    </main>


    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>

</html>
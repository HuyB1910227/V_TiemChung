<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Chứng nhận tiêm</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>
<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">

        <div class="container-lg">
                <div class="text-center ">
                    <h3 class="text-info font-weight-bold">CHỨNG NHẬN TIÊM CHỦNG</h3>
                </div>
                <div class="row">
                    <div class="row mx-auto">
                        <div class="col jumbotron border bg-info rounded-0">
                            <p  class="text-center display-4 text-white"><i class="fa-solid fa-shield-virus"></i></p>
                            <hr>
                            <h3 class="text-center text-uppercase text-white-50">Đã tiêm <span style="color: red; font-size: 50px;"> 0<?= $kh->solantiem ?></span> mũi vacxin</h3>
                            <hr>
                        </div>
                        <div class="col jumbotron rounded-0">
                            <h2 class="text-info">Thông tin cá nhân</h2>
                            <table class="table">
                                <tr>
                                    <td>Họ tên:</td>
                                    <td><?= $kh->hoten?></td>
                                </tr>
                                <tr>
                                    <td>CMDN/CCCD:</td>
                                    <td><?= $kh->cmnd?></td>
                                </tr>
                                <tr>
                                    <td>Giới tính:</td>
                                    <td><?php if($kh->gioitinh == 1){
                                        echo "Nữ";
                                    } else if($kh->gioitinh == 0){
                                        echo "Nam";
                                    } else {
                                        echo "Khác";
                                    }?></td>
                                </tr>
                                <tr>
                                    <td>Ngày sinh: </td>
                                    <td><?= $kh->ngaysinh; ?></td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>  
                </div>
                <div class="row p-2">
                    <h5>Nếu thông tin giấy xác nhận có sai sót, xin quý khách chọn chức năng yêu cầu cập nhật giấy xác nhận tiêm chủng.</h5>
                    <button class="btn btn-warning"><i class="fa-solid fa-square-arrow-up-right"></i> Gửi yêu cầu cập nhật</button>
                </div>
        </div>
    </main>

    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    


    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Trang chủ</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
    <style>
        .card-member {
            background-color: #038546;
            color: white;
        }
    </style>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">
        <div class="container-lg">
            <div class="row">
                <div class="col-12 col-md-5 div_tc_cn">
                    <div class="div_tc_ha">
                        <img src="/V_TiemChung/assets/uploads/<?= $user->avatar ?>" alt="" class="rounded-circle" width="150px" height="150px">
                    </div>
                    <div class="row justify-content-center div_rounded div_tc_tt">
                        <h3 style="color: #616AC6; text-shadow: 1px 1px 2px #616AC6"><?= $user->ten ?></h3>
                        <h4 class="col-12 text-center font-weight-bold">Thông tin cá nhân</h4>

                        <div class="col">

                            <table class="table " style="font-size: 20px;">
                                <tr>
                                    <td class="w-50 font-weight-bold">Họ và tên: </td>
                                    <td class="w-50"><?= $kh->hoten ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Ngày sinh:</td>
                                    <td><?= $kh->ngaysinh ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Số điện thoại:</td>
                                    <td><?= $user->sdt ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Địa chỉ:</td>
                                    <td><?= $kh->diachi ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tỉnh/Thành phố:</td>
                                    <td><?= $kh->tinh ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Quận/huyện:</td>
                                    <td><?= $kh->quan ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Phường/xã:</td>
                                    <td><?= $kh->phuong ?></td>
                                </tr>
                            </table>
                        </div>


                    </div>

                    <div class="row m-2 div_rounded div_shadow div_family p-2" style="min-height: 300px;max-height: 725px; overflow: auto">
                        <h4 class="col-12 text-center font-weight-bold">Danh sách người thân</h4>
                        <?php if ($dsnguoithan == null) : ?>
                            <h5 class="col-12 text-center text-danger">Chưa có thành viên</h5>
                            <h5 class="col-12 text-primary">(*) Quý khách có thể sử dụng chức năng quản lý người thân để thêm thành viên trong gia đình.</h5>
                            <div class="col-12">
                                <a href="quanlynguoithan.php" class="btn btn-primary rounded-pill w-100">Quản lý người thân</a>
                            </div>

                        <?php else : ?>
                            <?php foreach ($dsnguoithan as $nguoithan) : ?>
                                <div class="card w-100 m-2 card-member" style="height: 250px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $nguoithan->hoten ?></h5>
                                        <hr>
                                        <p class="card-text"><?= $nguoithan->ngaysinh ?></p>
                                        <p class="card-text"><?php if ($nguoithan->gioitinh == 0) {
                                                                    echo "Nam";
                                                                } else if ($nguoithan->gioitinh == 1) {
                                                                    echo "Nữ";
                                                                } ?></p>
                                        <p class="card-text"><?= $kh->diachi . ', ' . $kh->phuong . ', ' . $kh->quan . ', ' . $kh->tinh ?></p>


                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="col-12 col-md-7 p-1">
                    <div class="row div_rounded div_shadow">

                        <div class="col-6 col-md-4 col-lg-3 my-2">

                            <a href="/V_TiemChung/user/pages/dangkytiemchung.php" class="card text-decoration-none" style="width: 8rem; height: 10rem; background-color: #c44b14;">
                                <img src="/V_TiemChung/assets/frontend/img/172813.png" class="rounded-circle mx-auto mt-4" alt="..." width="70px" height="70px" style="border: 5px solid #ff590c;">
                                <p class="text-center p-2 text-white font-weight-bold">Đăng ký tiêm</p>
                            </a>

                        </div>
                        <div class="col-6 col-md-4 col-lg-3 my-2">

                            <a href="/V_TiemChung/user/pages/lichsutiemchung.php" class="card text-decoration-none" style="width: 8rem; height: 10rem; background-color: #66d3c8;">
                                <img src="/V_TiemChung/assets/frontend/img/TrangChu/historyV.webp" class="rounded-circle mx-auto mt-4" alt="..." width="70px" height="70px" style="border: 5px solid #a3e7e0;">
                                <p class="text-center p-2 text-white font-weight-bold">Lịch sử tiêm</p>
                            </a>

                        </div>
                        <div class="col-6 col-md-4 col-lg-3 my-2">

                            <a href="/V_TiemChung/user/pages/chungnhantiemchung.php" class="card text-decoration-none" style="width: 8rem; height: 10rem; background-color:  #00bd84;">
                                <img src="/V_TiemChung/assets/frontend/img/TrangChu/certificateVaccination.jpg" class="rounded-circle mx-auto mt-4" alt="..." width="70px" height="70px" style="border: 5px solid #01d495;">
                                <p class="text-center p-2 text-white font-weight-bold">Chứng nhận</p>
                            </a>

                        </div>
                        <div class="col-6 col-md-4 col-lg-3 my-2">
                            <a href="tel: 0932988029" class="card text-decoration-none" style="width: 8rem; height: 10rem; background-color:#F8A964;">
                                <img src="/V_TiemChung/assets/frontend/img/email-mail.webp" class="rounded-circle mx-auto mt-4" alt="..." width="70px" height="70px" style="border: 5px solid #fcc89b;;">
                                <p class="text-center p-2 text-white font-weight-bold">Gọi tư vấn</p>
                            </a>
                        </div>

                    </div>
                    

                  
                    <div class="row mt-3 ">
                        <div class="col-12 col-md-7 contain p-0 div_rounded div_shadow ">
                            <div class="calendar">
                                <div class="month">
                                    <i class="fas fa-angle-left prev"></i>
                                    <div class="date">
                                        <h1></h1>
                                        <p></p>
                                    </div>
                                    <i class="fas fa-angle-right next"></i>
                                </div>
                                <div class="weekdays">
                                    <div>CN</div>
                                    <div>T2</div>
                                    <div>T3</div>
                                    <div>T4</div>
                                    <div>T5</div>
                                    <div>T6</div>
                                    <div>T7</div>
                                </div>
                                <div class="days"></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 pl-3 " style="height: 600px;">



                            <div class="row justify-content-center div_rounded div_shadow ml-1 " style="min-height: 300px;max-height: 600px; overflow: auto">
                                <h4 class="col-12 text-center font-weight-bold mt-2">Danh sách lịch hẹn</h4>
                                <?php $emptyL = 0; ?>
                                <?php foreach ($arrpdk as $phieudk) : ?>
                                    <?php if ($phieudk->trangthai == 1) : ?>
                                        <?php $emptyL = 1; ?>
                                        <div class="col-12 ">
                                            <div class="card p-4 my-2" style=" position: relative">


                                               
                                                <div class="badge badge-primary mt-0"  style="width: 100px; position: absolute; top: 0px; right: 1px">Đã xác nhận</div>
                                                <div class="">Họ và tên: <b> <?= $user->hoten ?></b></div>
                                                <div class="">Ngày tiêm: <b> <?= $phieudk->findVaccinationSchedule()->ngaytiem ?></b></div>
                                                <div>Cơ sở: <b><?= $phieudk->findVaccinationSchedule()->findLocation()->ten ?></b> </div>
                                                <div>Địa điểm: <b><i><?= $phieudk->findVaccinationSchedule()->findLocation()->diachi . ", " .
                                                                            $phieudk->findVaccinationSchedule()->findLocation()->phuong . ", " .
                                                                            $phieudk->findVaccinationSchedule()->findLocation()->quan . ", " . $phieudk->findVaccinationSchedule()->findLocation()->tinh ?></i></b> </div>
                                                
                                            </div>
                                        </div>
                                    <?php endif ?>

                                <?php endforeach; ?>

                                <?php foreach ($dsnguoithan as $nguoithan) : ?>
                                    <?php $dspdk = $phieudk->selectFromUser($nguoithan->layId()) ?>
                                    <?php foreach ($dspdk  as $phieudk) : ?>
                                        <?php if ($phieudk->trangthai == 1) : ?>
                                            <?php $emptyL = 1; ?>
                                            <div class="col-12 ">
                                                <div class="card p-4 my-2" style=" position: relative">


                                                <div class="badge badge-primary mt-0"  style="width: 100px; position: absolute; top: 0px; right: 1px">Đã xác nhận</div>
                                                    
                                                    <div class="">Họ và tên: <b> <?= $nguoithan->hoten ?></b></div>
                                                    <div class="">Ngày tiêm: <b> <?= $phieudk->findVaccinationSchedule()->ngaytiem ?></b></div>
                                                    <div>Cơ sở: <b><?= $phieudk->findVaccinationSchedule()->findLocation()->ten ?></b> </div>
                                                    <div>Địa điểm: <b><i><?= $phieudk->findVaccinationSchedule()->findLocation()->diachi . ", " .
                                                                                $phieudk->findVaccinationSchedule()->findLocation()->phuong . ", " .
                                                                                $phieudk->findVaccinationSchedule()->findLocation()->quan . ", " . $phieudk->findVaccinationSchedule()->findLocation()->tinh ?></i></b> </div>

                                                </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>


                                <?php if ($emptyL == 0) : ?>
                                    <h5 class="col-12 text-center text-danger">Chưa có lịch hẹn</h5>
                                    <h5 class="col-12 text-primary">(*) Quý khách có thể đăng ký tiêm chủng cho cá nhân hoặc cho người thân.</h5>
                                    <div class="col-12">
                                        <a href="dangkytiemchung.php" class="btn btn-primary rounded-pill w-100">Đăng ký tiêm</a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>






                    </div>

                   
                    <div class="row div_rounded div_shadow mt-3">
                        <?php foreach($dstintuc as $tintuc): ?>
                        <div class="col my-2">
                            <div class="card mx-auto" style="width: 14rem; height: 15rem;">
                                <a class="text-decoration-none text-dark" href="chitiettintuc.php?id=<?= $tintuc->layId()?>">
                                    <img src="../../assets/uploads/<?= $tintuc->hinhanh ?>" class="card-img-top " alt="..." height="150px">
                                    <div class="card-body">
                                        <p class="card-text "><?= $tintuc->tieude?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="col-12 pt-2">
                            <a href="https://covid19.gov.vn/ban-tin-covid-19.htm" class="banquyen">&copy;&nbsp; Bản quyền thuộc về covid19.gov.vn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../../assets/frontend/js/calendar.js"></script>
    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
    <!-- <script src="../../assets/frontend/js/calendar.js"></script> -->

</body>
</html>
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

                    <div class="row m-2 div_rounded div_shadow div_family p-2 style-scrollY" style="min-height: 300px;max-height: 725px; overflow: auto">
                        <h4 class="col-12 text-center font-weight-bold">Danh sách người thân</h4>
                        <?php if ($dsnguoithan == null) : ?>
                            <h5 class="col-12 text-center text-danger">Chưa có thành viên</h5>
                            <h5 class="col-12 text-primary">(*) Quý khách có thể sử dụng chức năng quản lý người thân để thêm thành viên trong gia đình.</h5>
                            <div class="col-12">
                                <a href="quanlynguoithan.php" class="btn btn-primary rounded-pill w-100">Quản lý người thân</a>
                            </div>

                        <?php else : ?>
                            <?php foreach ($dsnguoithan as $nguoithan) : ?>
                                <div class="card w-100 m-2 card-member" style="height: 200px;">
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

                            <a href="/V_TiemChung/frontend/pages/dangkytiemchung.php" class="card text-decoration-none" style="width: 8rem; height: 10rem; background-color: #c44b14;">
                                <img src="/V_TiemChung/assets/frontend/img/172813.png" class="rounded-circle mx-auto mt-4" alt="..." width="70px" height="70px" style="border: 5px solid #ff590c;">
                                <p class="text-center p-2 text-white font-weight-bold">Đăng ký tiêm</p>
                            </a>

                        </div>
                        <div class="col-6 col-md-4 col-lg-3 my-2">

                            <a href="/V_TiemChung/frontend/pages/lichsutiemchung.php" class="card text-decoration-none" style="width: 8rem; height: 10rem; background-color: #66d3c8;">
                                <img src="/V_TiemChung/assets/frontend/img/TrangChu/historyV.webp" class="rounded-circle mx-auto mt-4" alt="..." width="70px" height="70px" style="border: 5px solid #a3e7e0;">
                                <p class="text-center p-2 text-white font-weight-bold">Lịch sử tiêm</p>
                            </a>

                        </div>
                        <div class="col-6 col-md-4 col-lg-3 my-2">

                            <a href="/V_TiemChung/frontend/pages/chungnhantiemchung.php" class="card text-decoration-none" style="width: 8rem; height: 10rem; background-color:  #00bd84;">
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
                    

                    <!--  -->
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



                            <div class="row justify-content-center div_rounded div_shadow ml-1 style-scrollY" style="min-height: 300px;max-height: 600px; overflow: auto">
                                <h4 class="col-12 text-center font-weight-bold mt-2">Danh sách lịch hẹn</h4>
                                <?php $emptyL = 0; ?>
                                <?php foreach ($arrpdk as $phieudk) : ?>
                                    <?php if ($phieudk->trangthai == 1) : ?>
                                        <?php $emptyL = 1; ?>
                                        <div class="col-12 ">
                                            <div class="card p-4 my-2" style=" position: relative">


                                                <?php if ($phieudk->trangthai == 0) {
                                                    echo "<div class=\"badge badge-info mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Chưa xác nhận</div>";
                                                } else if ($phieudk->trangthai == 1) {
                                                    echo "<div class=\"badge badge-primary mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã xác nhận</div>";
                                                } else if ($phieudk->trangthai == 2) {
                                                    echo "<div class=\"badge badge-warning mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã từ chối</div>";
                                                } else if ($phieudk->trangthai == 3) {
                                                    echo "<div class=\"badge badge-danger mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã hủy</div>";
                                                } else if ($phieudk->trangthai == 4) {
                                                    echo "<div class=\"badge badge-success mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã hoàn thành</div>";
                                                }
                                                ?>
                                                <div class="">Họ và tên: <b> <?= $user->hoten ?></b></div>
                                                <div class="">Ngày tiêm: <b> <?= $phieudk->findVaccinationSchedule()->ngaytiem ?></b></div>
                                                <div>Cơ sở: <b><?= $phieudk->findVaccinationSchedule()->findLocation()->ten ?></b> </div>
                                                <div>Địa điểm: <b><i><?= $phieudk->findVaccinationSchedule()->findLocation()->diachi . ", " .
                                                                            $phieudk->findVaccinationSchedule()->findLocation()->phuong . ", " .
                                                                            $phieudk->findVaccinationSchedule()->findLocation()->quan . ", " . $phieudk->findVaccinationSchedule()->findLocation()->tinh ?></i></b> </div>
                                                <!-- <button class="w-50 btn rounded-pill btn-primary m-auto">Xem chi tiết</button> -->
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


                                                    <?php if ($phieudk->trangthai == 0) {
                                                        echo "<div class=\"badge badge-info mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Chưa xác nhận</div>";
                                                    } else if ($phieudk->trangthai == 1) {
                                                        echo "<div class=\"badge badge-primary mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã xác nhận</div>";
                                                    } else if ($phieudk->trangthai == 2) {
                                                        echo "<div class=\"badge badge-warning mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã từ chối</div>";
                                                    } else if ($phieudk->trangthai == 3) {
                                                        echo "<div class=\"badge badge-danger mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã hủy</div>";
                                                    } else if ($phieudk->trangthai == 4) {
                                                        echo "<div class=\"badge badge-success mt-0\"  style=\"width: 100px; position: absolute; top: 0px; right: 1px\">Đã hoàn thành</div>";
                                                    }
                                                    ?>
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

                    <!--  -->
                    <div class="row div_rounded div_shadow mt-3">
                        <div class="col my-2">
                            <div class="card mx-auto" style="width: 14rem; height: 15rem;">
                                <a class="text-decoration-none text-dark" href="https://covid19.gov.vn/tat-ca-huong-dan-ve-theo-doi-suc-khoe-cua-bo-y-te-ma-f0-dieu-tri-tai-nha-can-biet-171220315154101477.htm">
                                    <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt1.jpg" class="card-img-top " alt="..." height="150px">
                                    <div class="card-body">
                                        <p class="card-text ">Bộ y tế hướng dẫn theo dõi sức khỏe tại nhà.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col my-2">
                            <div class="card mx-auto" style="width: 14rem; height: 15rem;">
                                <a class="text-decoration-none text-dark" href="https://covid19.gov.vn/song-cung-f0-lam-sao-de-giam-nguy-co-lay-nhiem-171220228132225654.htm">
                                    <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt3.png" class="card-img-top " alt="..." height="150px">
                                    <div class="card-body">
                                        <p class="card-text">Giảm lây nhiễm khi sống cùng F0.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col my-2">
                            <div class="card mx-auto" style="width: 14rem; height: 15rem;">
                                <a class="text-decoration-none text-dark" href="https://moh.gov.vn/hoat-dong-cua-dia-phuong/-/asset_publisher/gHbla8vOQDuS/content/cham-soc-tre-f0-tai-nha-nhung-ieu-on-gian-khong-phai-cha-me-nao-cung-biet">
                                    <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt2.jpg" class="card-img-top" alt="..." height="150px">
                                    <div class="card-body">
                                        <p class="card-text">Chăm sóc trẻ F0 tại nhà.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col my-2">
                            <div class="card mx-auto" style="width: 14rem; height: 15rem;">
                                <a class="text-decoration-none text-dark" href="https://covid19.gov.vn/6-cach-khong-dung-thuoc-giup-giam-nhe-chung-covid-keo-dai-171220218114701263.htm">
                                    <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt4.jpg" class="card-img-top" alt="..." height="150px">
                                    <div class="card-body">
                                        <p class="card-text">Cách giảm nhẹ các triệu chứng COVID-19</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 pt-2">
                            <a href="https://covid19.gov.vn/ban-tin-covid-19.htm" class="banquyen">&copy;&nbsp; Bản quyền thuộc về covid19.gov.vn</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const date = new Date();

        const renderCalendar = () => {
            date.setDate(1);

            const monthDays = document.querySelector(".days");

            const lastDay = new Date(
                date.getFullYear(),
                date.getMonth() + 1,
                0
            ).getDate();

            const prevLastDay = new Date(
                date.getFullYear(),
                date.getMonth(),
                0
            ).getDate();

            const firstDayIndex = date.getDay();

            const lastDayIndex = new Date(
                date.getFullYear(),
                date.getMonth() + 1,
                0
            ).getDay();

            const nextDays = 7 - lastDayIndex - 1;

            const months = [
                "Tháng 1",
                "Tháng 2",
                "Tháng 3",
                "Tháng 4",
                "Tháng 5",
                "Tháng 6",
                "Tháng 7",
                "Tháng 8",
                "Tháng 9",
                "Tháng 10",
                "Tháng 11",
                "Tháng 12",
            ];

            document.querySelector(".date h1").innerHTML = months[date.getMonth()];

            document.querySelector(".date p").innerHTML = "Năm " + new Date().getFullYear();

            let days = "";

            for (let x = firstDayIndex; x > 0; x--) {
                days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
            }

            for (let i = 1; i <= lastDay; i++) {
                if (
                    i === new Date().getDate() &&
                    date.getMonth() === new Date().getMonth()
                ) {
                    days += `<div class="today">${i}</div>`;
                } else {
                    days += `<div>${i}</div>`;
                }
            }

            for (let j = 1; j <= nextDays; j++) {
                days += `<div class="next-date">${j}</div>`;
                monthDays.innerHTML = days;
            }
        };

        document.querySelector(".prev").addEventListener("click", () => {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
        });

        document.querySelector(".next").addEventListener("click", () => {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
        });

        renderCalendar();
    </script>

    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Trang chủ</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
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
                        <h4 class="col-12 text-center">Thông tin cá nhân</h4>

                        <div class="col">

                            <table class="table ">
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

                    <div class="row m-2 div_rounded div_shadow div_family">
                        <h4 class="col-12 text-center">Danh sách người thân</h4>
                        <?php if($dsnguoithan == null):?>
                            <h5>Chưa có thành viên</h5>
                        <?php else: ?>
                            
                        <?php endif;?>
                    </div>

                </div>
                <div class="col-12 col-md-7 p-1">
                    <div class="row div_rounded div_shadow">
                        <div class="col-6 col-md-4 col-lg-3 my-2">
                            <a href="" class="card text-decoration-none" style="width: 8rem; height: 10rem; background-color:#F8A964;">
                                <img src="/V_TiemChung/assets/frontend/img/email-mail.webp" class="rounded-circle mx-auto mt-4" alt="..." width="70px" height="70px" style="border: 5px solid #fcc89b;;">
                                <p class="text-center p-2 text-white font-weight-bold">Tư vấn</p>
                            </a>
                        </div>
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

                    </div>
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
                                        <p class="card-text">Sống cùng F0, làm sao để giảm nguy cơ lây nhiễm?</p>
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


                    </div>

                    <!--  -->
                    <div class="row div_rounded div_shadow mt-3 ">
                        <div class="col-7 contain p-0">
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
                                    <div>Sun</div>
                                    <div>Mon</div>
                                    <div>Tue</div>
                                    <div>Wed</div>
                                    <div>Thu</div>
                                    <div>Fri</div>
                                    <div>Sat</div>
                                </div>
                                <div class="days"></div>
                            </div>
                        </div>
                        <div class="col-5">
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
                            Đây là lịch hẹn
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
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ];

            document.querySelector(".date h1").innerHTML = months[date.getMonth()];

            document.querySelector(".date p").innerHTML = new Date().toDateString();

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
<?php

    use TC\OBS\LichHenTiem;
use TC\OBS\TinTuc;

    require '../db_connect.php';
    $lich = new LichHenTiem($PDO);
    $arrlichhen = $lich->all();

    $today = date('Y-m-d');
    $today = strtotime($today);
    $cn = new TinTuc($PDO);
    $arrcn = $cn->all();

  
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/layouts/meta.php'; ?>
    <title>V - Tiêm chủng</title>
    <?php include_once __DIR__ . '/layouts/styles.php'; ?>
    <title>V_Tiêm chủng</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <style>
        body {
            font-family: roboto;

        }

        .purple-square-container {
            height: 80%;
            display: flex;
            align-items: center;

        }

        .phone {
            border: 3px solid orange;
            background-color: #fab861;
            color: white;
        }

        h3.title {
            color: #616AC6;
            text-transform: uppercase;
            font-weight: bolder;
            text-align: center;
        }

        a.banquyen {
            text-decoration: none;
            color: grey;
            font-size: 1.1rem;
        }

        a.banquyen:hover {
            text-decoration: none;
            color: #616AC6;

        }
    </style>
</head>

<body class="container-fluid">
    <header class="row bg-light">
        <div class="container-lg">
            <nav class="navbar navbar-expand-md navbar-light bg-light row">
                <a class="navbar-brand" href="#">V-Tiêm chủng</a>
                <a class="btn rounded-pill ml-auto phone" href="tel:0932988029"><i class="fa-solid fa-phone"></i> 0932-988-029</a>

            </nav>
        </div>

    </header>

    <main class="row mt-2">
        <div class="container-lg ">
            <div class="row bg-info">
                <div class="col-12 col-md-6 p-0">
                    <img src="/V_TiemChung/assets/frontend/img/newseventsimage.webp" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-md-6">
                    <!-- <div class="text-light border"> -->
                    <div class="purple-square-container text-light">
                        <div>
                            <h1 class="font-weight-border">Xin chào!</h1>
                            <p class="font-weight-border">Chào mừng quý khách đã đến với V-Tiêm chủng, đây là trang quản lý tiêm chủng cá nhân và người thân trong gia đình.</p>

                        </div>
                    </div>
                    <!-- </div> -->

                    <div class="">

                        <a class="btn text-primary font-weight-bolder bg-white mr-2 shadow-lg" href="/V_TiemChung/user/pages/trangchu.php">Đăng nhập</a>
                        <a class="btn text-primary font-weight-bolder bg-white  shadow-lg" href="/V_TiemChung/user/dangky.php">Đăng ký</a>
                        <!-- <button class="btn border border-secondary bg-light">Tư vấn</button> -->
                    </div>
                </div>
            </div>
            <hr>

            <h3 class="title">Cẩm nang y tế</h3>

            <br>
            <div class="row">
                <?php foreach($arrcn as $cn):?>
                <div class="col my-2">
                    <div class="card" style="width: 14rem; height: 15rem;">
                        <a href="chittiettintuc.php?id=<?= $cn->layId()?>" class="text-decoration-none text-dark">
                            <img src="../assets/uploads/<?= $cn->hinhanh?>" class="card-img-top " alt="..." height="150px">

                            <div class="card-body">
                                <p class="card-text "><?= $cn->tieude?></p>
                            </div>
                        </a>

                    </div>
                </div>
                <?php endforeach;?>
                <!-- <div class="col my-2">
                    <div class="card" style="width: 14rem; height: 15rem;">
                        <a href="https://covid19.gov.vn/song-cung-f0-lam-sao-de-giam-nguy-co-lay-nhiem-171220228132225654.htm" class="text-decoration-none text-dark">
                            <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt3.png" class="card-img-top " alt="..." height="150px">

                            <div class="card-body">
                                <p class="card-text">Giảm lây nhiễm khi sống cùng F0.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col my-2">
                    <div class="card" style="width: 14rem; height: 15rem;">
                        <a href="https://moh.gov.vn/hoat-dong-cua-dia-phuong/-/asset_publisher/gHbla8vOQDuS/content/cham-soc-tre-f0-tai-nha-nhung-ieu-on-gian-khong-phai-cha-me-nao-cung-biet" class="text-decoration-none text-dark">
                            <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt2.jpg" class="card-img-top" alt="..." height="150px">
                            <div class="card-body">
                                <p class="card-text">Chăm sóc trẻ F0 tại nhà.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col my-2">
                    <div class="card" style="width: 14rem; height: 15rem;">
                        <a href="https://covid19.gov.vn/6-cach-khong-dung-thuoc-giup-giam-nhe-chung-covid-keo-dai-171220218114701263.htm" class="text-decoration-none text-dark">
                            <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt4.jpg" class="card-img-top" alt="..." height="150px">
                            <div class="card-body">
                                <p class="card-text">Cách giảm các triệu chứng COVID-19</p>
                            </div>
                        </a>
                    </div>
                </div> -->

            </div>
            <div class="row justify-content-center pt-2">
                <a href="https://covid19.gov.vn/ban-tin-covid-19.htm" class="banquyen">&copy;&nbsp; Bản quyền thuộc về covid19.gov.vn</a>
            </div>

            <!-- <br>
        </div>   -->
            <!-- Biểu đồ -->
            <hr>
            <h3 class="title">Bản đồ covid-19</h3>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="border m-2 shadow rounded">

                        <iframe src="https://api.ncovtrack.com/vaccine/vietnam/provinces?metric=cases&showTable=false&showMap=true" title="ncovtrack - COVID & Vaccination Statistics" height='550' width='100%' frameBorder="0"></iframe>


                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="border m-2 shadow rounded">

                        <iframe src="https://api.ncovtrack.com/vaccine/vietnam/provinces?metric=recovered&showTable=false&showMap=true" title="ncovtrack - COVID & Vaccination Statistics" height='550' width='100%' frameBorder="0"></iframe>


                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="border m-2 shadow rounded">

                        <iframe src="https://api.ncovtrack.com/vaccine/vietnam/provinces?metric=first_dose&showTable=true&showMap=true" title="ncovtrack - COVID & Vaccination Statistics" height='550' width='100%' frameBorder="0"></iframe>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="border m-2 shadow rounded">

                        <iframe src="https://api.ncovtrack.com/vaccine/vietnam/provinces?metric=second_dose&showTable=true&showMap=true" title="ncovtrack - COVID & Vaccination Statistics" height='550' width='100%' frameBorder="0"></iframe>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center pt-2">
                <a href="https://ncovtrack.com/vaccine/vietnam" class="banquyen">&copy;&nbsp; Bản quyền thuộc về ncovtrack.com</a>
            </div>
            <hr>
            <h3 class="title">Tổ chức tiêm chủng</h3>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-responsive-lg" id="lichhen">
                <thead>
                    <tr class="">
                        <!-- <th>Chọn</th> -->

                        <th>Mã lịch hẹn</th>
                        <th>Ngày hẹn tiêm</th>
                        <th>Cơ sở tiêm</th>
                        <th>Địa chỉ</th>
                        <th>Phường / Xã</th>
                        <th>Quận / Huyện</th>
                        <th>Thành phố / Tỉnh</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arrlichhen as $i => $lich) : ?>
                        <?php $coso = $lich->findLocation(); ?>
                        <?php if ($coso->trangthai == 1 && strtotime($lich->ngaytiem) >= $today) : ?>
                            <tr>

                                <td><?= $lich->getId() ?></td>
                                <td><?= $lich->ngaytiem ?></td>
                                <td><?= $coso->ten ?></td>
                                <td><?= $coso->diachi ?></td>
                                <td><?= $coso->phuong ?></td>
                                <td><?= $coso->quan ?></td>
                                <td><?= $coso->tinh ?></td>
                                
                            </tr>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>

            </table>
                </div>
            
            </div>
    </main>


    <?php include_once __DIR__ . '/layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/layouts/script.php'; ?>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            // var svg = $('svg');
            // svg.prop({
            //     "width": "500px",
               
            // }
               
            // )
            $('#lichhen').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
                },


            });
        });
    </script>
</body>

</html>
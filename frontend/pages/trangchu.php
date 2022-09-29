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
                <div class="col-12 col-md-5 border">
                    
                    <div class="row justify-content-center">
                        <h4 class="col-12 text-center">Thông tin cá nhân</h4>
                        <!-- <div class="row m-auto p-2 pb-5">
                            <img src="./newseventsimage.webp" alt="" class="rounded-circle" width="150px" height="150px">
                        </div> -->
                        <div class="col">
                            <table class="table ">
                                <tr>
                                    <td class="w-50 font-weight-bold">Họ và tên: </td>
                                    <td class="w-50"><?= $kh->hoten?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Ngày sinh:</td>
                                    <td><?= $kh->ngaysinh?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Số điện thoại:</td>
                                    <td><?= $user->sdt?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Địa chỉ:</td>
                                    <td><?= $kh->diachi?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tỉnh/Thành phố:</td>
                                    <td><?= $kh->tinh?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Quận/huyện:</td>
                                    <td><?= $kh->quan?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Phường/xã:</td>
                                    <td><?= $kh->phuong?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 col-md-7 ">
                        <div class="row border ">
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
                        <div class="row border">
                            <div class="col my-2">
                                <div class="card mx-auto" style="width: 14rem; height: 15rem;">
                                    <a class="text-decoration-none text-dark" href="https://covid19.gov.vn/tat-ca-huong-dan-ve-theo-doi-suc-khoe-cua-bo-y-te-ma-f0-dieu-tri-tai-nha-can-biet-171220315154101477.htm">
                                        <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt1.jpg" class="card-img-top " alt="..."  height="150px">
                                        <div class="card-body">
                                          <p class="card-text ">Bộ y tế hướng dẫn theo dõi sức khỏe tại nhà.</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col my-2">
                                <div class="card mx-auto" style="width: 14rem; height: 15rem;">
                                    <a class="text-decoration-none text-dark" href="https://covid19.gov.vn/song-cung-f0-lam-sao-de-giam-nguy-co-lay-nhiem-171220228132225654.htm">
                                        <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt3.png" class="card-img-top " alt="..."  height="150px">
                                        <div class="card-body">
                                          <p class="card-text">Sống cùng F0, làm sao để giảm nguy cơ lây nhiễm?</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col my-2">
                                <div class="card mx-auto" style="width: 14rem; height: 15rem;">
                                    <a class="text-decoration-none text-dark" href="https://moh.gov.vn/hoat-dong-cua-dia-phuong/-/asset_publisher/gHbla8vOQDuS/content/cham-soc-tre-f0-tai-nha-nhung-ieu-on-gian-khong-phai-cha-me-nao-cung-biet">
                                        <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt2.jpg" class="card-img-top" alt="..."  height="150px">
                                        <div class="card-body">
                                          <p class="card-text">Chăm sóc trẻ F0 tại nhà.</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col my-2">
                                <div class="card mx-auto" style="width: 14rem; height: 15rem;">
                                    <a class="text-decoration-none text-dark" href="https://covid19.gov.vn/6-cach-khong-dung-thuoc-giup-giam-nhe-chung-covid-keo-dai-171220218114701263.htm">
                                        <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt4.jpg" class="card-img-top" alt="..."  height="150px">
                                        <div class="card-body">
                                          <p class="card-text">Cách giảm nhẹ các triệu chứng COVID-19</p>
                                        </div>
                                    </a> 
                                </div>
                            </div>
                            
                            
                        </div>
                </div>
            </div>  
        </div>
    </main>

    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    


    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>
</html>
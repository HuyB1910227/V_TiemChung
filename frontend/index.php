<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once __DIR__ . '/layouts/meta.php'; ?>
    <title>Quản lý cơ sở tiêm</title>
    <?php include_once __DIR__ . '/layouts/styles.php'; ?>
    <title>V_Tiêm chủng</title>
    <style>
        
        .purple-square-container {
		  height: 80%;
		  display: flex;
		  align-items: center;
		  
		}

        
    </style>
</head>

<body class="container-fluid">
    <header class="row bg-light">
        <div class="container-lg">
            <nav class="navbar navbar-expand-md navbar-light bg-light row">
                <a class="navbar-brand" href="#">V-Tiêm chủng</a>
                
                
            </nav>
        </div>
        
    </header>
    
    <main class="row mt-2">
        <div class="container-lg ">
            <div class="row bg-info">
                <div class="col pl-0">
                    <img src="/V_TiemChung/assets/frontend/img/newseventsimage.webp" alt="" class="img-fluid" >
                </div>
                <div class="col">
                    <!-- <div class="text-light border"> -->
                        <div class="purple-square-container text-light">
                            <div>
                                <h1>Xin chào!</h1>
                                <p>Đây là trang quản lý tiêm chủng cá nhân, ......</p>
                            </div>
                        </div>
                    <!-- </div> -->
                    
                    <div class="">
                        
                        <a class="btn border border-secondary bg-white" href="/V_TiemChung/frontend/pages/trangchu.php">Đăng nhập</a>
                        <!-- <button class="btn border border-secondary bg-light">Tư vấn</button> -->
                    </div>
                </div>
            </div>
            <hr>
        <div class="row justify-content-center">
            <h2 class="text-uppercase text-success">Cẩm nang y tế</h2>
        </div>
        <br>
        <div class="row">
            <div class="col my-2">
                <div class="card" style="width: 14rem; height: 15rem;">
                    <a href="https://covid19.gov.vn/tat-ca-huong-dan-ve-theo-doi-suc-khoe-cua-bo-y-te-ma-f0-dieu-tri-tai-nha-can-biet-171220315154101477.htm" class="text-decoration-none text-dark">
                        <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt1.jpg" class="card-img-top " alt="..."  height="150px">

                        <div class="card-body">
                          <p class="card-text ">Bộ y tế hướng dẫn theo dõi sức khỏe tại nhà.</p>
                        </div>
                    </a>
                    
                </div>
            </div>
            <div class="col my-2">
                <div class="card" style="width: 14rem; height: 15rem;">
                    <a href="https://covid19.gov.vn/song-cung-f0-lam-sao-de-giam-nguy-co-lay-nhiem-171220228132225654.htm" class="text-decoration-none text-dark">
                        <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt3.png" class="card-img-top " alt="..."  height="150px">

                        <div class="card-body">
                        <p class="card-text">Sống cùng F0, làm sao để giảm nguy cơ lây nhiễm?</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col my-2">
                <div class="card" style="width: 14rem; height: 15rem;">
                    <a href="https://moh.gov.vn/hoat-dong-cua-dia-phuong/-/asset_publisher/gHbla8vOQDuS/content/cham-soc-tre-f0-tai-nha-nhung-ieu-on-gian-khong-phai-cha-me-nao-cung-biet" class="text-decoration-none text-dark">
                        <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt2.jpg" class="card-img-top" alt="..."  height="150px">
                        <div class="card-body">
                            <p class="card-text">Chăm sóc trẻ F0 tại nhà.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col my-2">
                <div class="card" style="width: 14rem; height: 15rem;">
                    <a href="https://covid19.gov.vn/6-cach-khong-dung-thuoc-giup-giam-nhe-chung-covid-keo-dai-171220218114701263.htm" class="text-decoration-none text-dark">
                        <img src="/V_TiemChung/assets/frontend/img/TrangChu/tt4.jpg" class="card-img-top" alt="..."  height="150px">
                        <div class="card-body">
                          <p class="card-text">Cách giảm nhẹ các triệu chứng COVID-19</p>
                        </div>
                    </a>
                </div>
            </div>
            
        </div>
        <br>
        </div>  
    </main>
   
    
    <?php include_once __DIR__ . '/layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/layouts/script.php'; ?>
</body>
</html>
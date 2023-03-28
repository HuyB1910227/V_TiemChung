<?php

require_once '../../db_connect.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
  <title>Thống kê</title>
  <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>
<style>
  .bc-scroll {
    height: 10px;
    background-color: blue;
    width: 100%;
    border-radius: 4px 4px 0px 0px;
  }

  div.card {
    box-shadow: 2px 2px 5px grey;
  }
</style>

<body>
  <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
  <div class="container-fluid">

    <div class="row">
      <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
      <div class="col-10 offset-2">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-2">
                <div class="bc-scroll" style="background-color: dodgerblue;"></div>
                <div class="card-body pb-0">
                  <h6>Tổng số người dùng</h6>
                  <div class="text-value" id="baocaoKhachHang_SoLuong">

                    <h2>0</h2>
                  </div>

                </div>
              </div>

            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-2">
                <div class="bc-scroll" style="background-color: orange;"></div>
                <div class="card-body pb-0">

                  <h6>Tiêm 1 mũi</h6>
                  <div class="text-value" id="baocaoSLKhachHang_1mui">
                    <h1>0</h1>
                  </div>

                </div>
              </div>

            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-2">
                <div class="bc-scroll" style="background-color: green;"></div>

                <div class="card-body pb-0">
                  <h6>Tiêm trên 1 mũi</h6>
                  <div class="text-value" id="baocaoSLKhachHang_t1mui">
                    <h1>0</h1>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-2">
                <div class="bc-scroll" style="background-color: grey;"></div>

                <div class="card-body pb-0">
                  <div>Tổng số cơ sở</div>
                  <div class="text-value" id="baocaoCoSo_SoLuong">
                    <h1>0</h1>
                  </div>

                </div>
              </div>
            </div>
            <div id="ketqua"></div>
          </div>

          <div class="row">

            <div class="col-12 col-sm-12 col-lg-6 p-2">
              <canvas id="chartOfobjChartThongKeTiemChung" class="shadow"></canvas>
            </div>
            <div class="col-12 col-sm-12 col-lg-6 p-2">
              <canvas id="chartOfobjChartThongKeVaccine" class="shadow"></canvas>
            </div>

          </div>
          <div class="row">

           

          </div>
        </div>
      </div>

    </div>

  </div>
  </div>






  <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

  <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
  <script src="../../assets/backend/js/dashboard.js"></script>
</body>

</html>
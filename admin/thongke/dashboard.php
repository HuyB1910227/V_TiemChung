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

            <div class="col-sm-6 col-lg-6 p-2">
              <canvas id="chartOfobjChartThongKeTiemChung" class="shadow"></canvas>
            </div>
            <div class="col-sm-6 col-lg-6 p-2">
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
  <script>
    $(document).ready(function() {
      // ----------------- Tổng số người tiêm 1 mũi --------------------------
      function getDuLieuBaoCaoTongSoKhachHangT1() {
        $.ajax('/V_TiemChung/admin/api/baocao_thongkenguoidung.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1 style="color: orange">${dataObj.Tiem1Lan}</h1>`;
            $('#baocaoSLKhachHang_1mui').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#baocaoSLKhachHang_1mui').html(htmlString);
          }
        });
      }


      // ----------------- Tổng số khách hàng --------------------------
      function getDuLieuBaoCaoTongSoKhachHang() {
        $.ajax('/V_TiemChung/admin/api/baocao_thongkenguoidung.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1 class="text-primary">${dataObj.SoLuong}</h1>`;
            $('#baocaoKhachHang_SoLuong').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#baocaoKhachHang_SoLuong').html(htmlString);
          }
        });
      }
      $('#refreshBaoCaoKhachHang').click(function(event) {
        event.preventDefault();
        getDuLieuBaoCaoTongSoKhachHang();
      });

      // ----------------- Tổng số tiem nhieu mui --------------------------
      function getDuLieuBaoCaoTongSoKhachHangTN() {
        $.ajax('/V_TiemChung/admin/api/baocao_thongkenguoidung.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1 style="color: green">${dataObj.TiemTren1Lan}</h1>`;
            $('#baocaoSLKhachHang_t1mui').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#baocaoSLKhachHang_t1mui').html(htmlString);
          }
        });
      }

      // ----------------- Tổng số cơ cở --------------------------
      function getDuLieuBaoCaoTongCoSo() {
        $.ajax('/V_TiemChung/admin/api/baocao_thongkecoso.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1 style="color:grey">${dataObj.SoLuong}</h1>`;
            $('#baocaoCoSo_SoLuong').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#baocaoCoSo_SoLuong').html(htmlString);
          }
        });
      }



      // ------------------ Vẽ biểu đồ thống kê  -----------------
      getDuLieuBaoCaoTongSoKhachHangT1()
      getDuLieuBaoCaoTongSoKhachHang();
      getDuLieuBaoCaoTongSoKhachHangTN()
      getDuLieuBaoCaoTongCoSo();


      var $objChartThongKeTiemChung;
      var $chartOfobjChartThongKeTiemChung = document.getElementById("chartOfobjChartThongKeTiemChung").getContext(
        "2d");

      function renderChartThongKeTiemChung() {
        $.ajax({
          url: '/V_TiemChung/admin/api/baocao_thongkeluottiem.php',
          type: "GET",
          success: function(response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function() {
              myLabels.push((this.Thang));
              myData.push(this.SoLuong);
            });
            myData.push(0);
            if (typeof $objChartThongKeTiemChung !== "undefined") {
              $objChartThongKeTiemChung.destroy();
            }
            $objChartThongKeTiemChung = new Chart($chartOfobjChartThongKeTiemChung, {

              type: "line",
              data: {
                labels: myLabels,
                datasets: [{
                  data: myData,
                  borderColor: "#616AC6",
                  fill: true,
                  backgroundColor: "#9ad0f5",
                  borderWidth: 3,
                  tension: 0.1
                }]
              },

              options: {
                legend: {
                  display: false
                },
                title: {
                  display: true,
                  text: "Biểu đồ thống kê lượt tiêm theo tháng"
                },
                responsive: true,




              }
            });
          }
        });
      };
      $('#refreshThongKeTiemChung').click(function(event) {
        event.preventDefault();
        renderChartThongKeTiemChung();
      });
      renderChartThongKeTiemChung();
      // 

      var $objChartThongKeVaccine;
      var $chartOfobjChartThongKeVaccine = document.getElementById("chartOfobjChartThongKeVaccine").getContext(
        "2d");

      function renderChartThongKeVaccine() {
        $.ajax({
          url: '/V_TiemChung/admin/api/baocao_thongkevaccine.php',
          type: "GET",
          success: function(response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function() {
              myLabels.push((this.Ten));
              myData.push(this.soLuong);
            });
            myData.push(0);
            if (typeof $objChartThongKeVaccine !== "undefined") {
              $objChartThongKeVaccine.destroy();
            }
            $objChartThongKeVaccine = new Chart($chartOfobjChartThongKeVaccine, {

              type: "bar",
              data: {
                labels: myLabels,
                datasets: [{
                  data: myData,
                  // borderColor: "#616AC6",
                  fill: true,
                  backgroundColor: [
                    '#64e386',
                    '#f5b67a',
                    '#de2cf2',
                    '#e67065',
                    '#ed815a',
                    '#de2cf2',
                    '#de2cf2',
                  ],
                  borderWidth: 3,
                 
                 
                }],
                
              },

              options: {
                legend: {
                  display: false
                },
                title: {
                  display: true,
                  text: "Biểu đồ so sánh vaccine đã tiêm theo số lượng người"
                },
                responsive: true,




              }
            });
          }
        });
      };
      renderChartThongKeVaccine();

    });
  </script>
</body>

</html>
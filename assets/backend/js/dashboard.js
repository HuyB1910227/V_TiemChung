$(document).ready(function () {

    function getDuLieuBaoCaoTongSoKhachHangT1() {
        $.ajax('/V_TiemChung/admin/api/baocao_thongkenguoidung.php', {
            success: function (data) {
                var dataObj = JSON.parse(data);
                var htmlString = `<h1 style="color: orange">${dataObj.Tiem1Lan}</h1>`;
                $('#baocaoSLKhachHang_1mui').html(htmlString);
            },
            error: function () {
                var htmlString = `<h1>Không thể xử lý</h1>`;
                $('#baocaoSLKhachHang_1mui').html(htmlString);
            }
        });
    }



    function getDuLieuBaoCaoTongSoKhachHang() {
        $.ajax('/V_TiemChung/admin/api/baocao_thongkenguoidung.php', {
            success: function (data) {
                var dataObj = JSON.parse(data);
                var htmlString = `<h1 class="text-primary">${dataObj.SoLuong}</h1>`;
                $('#baocaoKhachHang_SoLuong').html(htmlString);
            },
            error: function () {
                var htmlString = `<h1>Không thể xử lý</h1>`;
                $('#baocaoKhachHang_SoLuong').html(htmlString);
            }
        });
    }
    $('#refreshBaoCaoKhachHang').click(function (event) {
        event.preventDefault();
        getDuLieuBaoCaoTongSoKhachHang();
    });


    function getDuLieuBaoCaoTongSoKhachHangTN() {
        $.ajax('/V_TiemChung/admin/api/baocao_thongkenguoidung.php', {
            success: function (data) {
                var dataObj = JSON.parse(data);
                var htmlString = `<h1 style="color: green">${dataObj.TiemTren1Lan}</h1>`;
                $('#baocaoSLKhachHang_t1mui').html(htmlString);
            },
            error: function () {
                var htmlString = `<h1>Không thể xử lý</h1>`;
                $('#baocaoSLKhachHang_t1mui').html(htmlString);
            }
        });
    }


    function getDuLieuBaoCaoTongCoSo() {
        $.ajax('/V_TiemChung/admin/api/baocao_thongkecoso.php', {
            success: function (data) {
                var dataObj = JSON.parse(data);
                var htmlString = `<h1 style="color:grey">${dataObj.SoLuong}</h1>`;
                $('#baocaoCoSo_SoLuong').html(htmlString);
            },
            error: function () {
                var htmlString = `<h1>Không thể xử lý</h1>`;
                $('#baocaoCoSo_SoLuong').html(htmlString);
            }
        });
    }



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
            success: function (response) {
                var data = JSON.parse(response);
                var myLabels = [];
                var myData = [];
                $(data).each(function () {
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
    $('#refreshThongKeTiemChung').click(function (event) {
        event.preventDefault();
        renderChartThongKeTiemChung();
    });
    renderChartThongKeTiemChung();


    var $objChartThongKeVaccine;
    var $chartOfobjChartThongKeVaccine = document.getElementById("chartOfobjChartThongKeVaccine").getContext(
        "2d");

    function renderChartThongKeVaccine() {
        $.ajax({
            url: '/V_TiemChung/admin/api/baocao_thongkevaccine.php',
            type: "GET",
            success: function (response) {
                var data = JSON.parse(response);
                var myLabels = [];
                var myData = [];
                $(data).each(function () {
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
                            text: "Biểu đồ so sánh vaccine đã tiêm theo số lượng người!"
                        },
                        responsive: true,
                    }
                });
            }
        });
    };
    renderChartThongKeVaccine();
});
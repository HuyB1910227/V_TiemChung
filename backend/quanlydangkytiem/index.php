<?php
require_once '../../db_connect.php';

use TC\OBS\CoSoTiem;
use TC\OBS\PhieuDangKy;

$pdk = new PhieuDangKy($PDO);
$arrpdk = $pdk->all();

use TC\OBS\KhachHang;

$nt = new KhachHang($PDO);

use TC\OBS\LichHenTiem;

$lht = new LichHenTiem($PDO);
// $pdk1 = $arrpdk[2];
// var_dump($pdk1);
// $pdk1->detectUnusual();
// var_dump($pdk1->diembatthuong);
$cosotiem = new CoSoTiem($PDO);
$arrcoso = $cosotiem->all();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>

            <!-- style="max-height: 800px; overflow-y:scroll" -->
            <div class="col-10 offset-2 mt-1">
                <h3>Danh sách đăng ký tiêm vaccin</h3>
                <div class="row filter">
                    <h5 class="col-12"><i class="fa-solid fa-filter"></i>
                        Bộ lọc</h5>
                    <div class="col-2 ">
                        <div class="form-group">
                            <label for="">Trạng thái</label>

                            <select name="slTT" id="slTT" class="custom-select searchField" column="14">
                                <option value="">Tất cả</option>
                                <option value="Chưa xác nhận">Chưa xác nhận</option>
                                <option value="Đã xác nhận">Đã xác nhận</option>
                                <option value="Đã từ chối">Đã từ chối</option>
                                <option value="Đã hủy">Đã hủy</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Giới tính</label>

                            <select name="slTT" id="slTT" class="custom-select searchField" column="4">
                                <option value="">Tất cả</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>

                            </select>

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Ngày đăng ký</label>

                            <input type="date" id="dateNDK" class="form-control searchField" column="10">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Ngày tiêm dự kiến</label>

                            <input type="date" id="dateNDK" class="form-control searchField" column="11">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Cơ sở tiêm</label>

                            <select name="slTT" id="slTT" class="custom-select searchField" column="12">
                                <option value="">Tất cả</option>

                                <?php foreach ($arrcoso as $cosotiem) {
                                    echo "<option value=\"$cosotiem->ten \">$cosotiem->ten</option>";
                                } ?>

                            </select>

                        </div>
                    </div>
                    <!-- <div class="col-2 border">6</div> -->
                </div>
                <hr>
                <div class="bg-white m-2 row">
                    <div class="col-12">
                        <div class="float-right">
                            <!-- <button class="btn btn-warning text-white"><i class="fa-solid fa-ban" id="btn"></i> Từ chối</button> -->
                            <button class="btn btn-primary" id="btnXN"><i class="fa-solid fa-check"></i> Xác nhận</button>
                        </div>
                    </div>

                </div>

                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive-lg" id="tbDangKyTiem">
                        <thead>
                            <tr class="">
                                <th>Chọn</th>
                                <!-- <th>STT</th> -->
                                <th>Mã khách hàng</th>
                                <!-- <th>Số điện thoại</th> -->
                                <th>Họ và tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>CCCD</th>
                                <th>Tỉnh/Thành phố</th>
                                <th>Quận/Huyện</th>
                                <th>Xã/Phường</th>
                                <th>Địa chỉ</th>
                                <th>Ngày đăng ký</th>
                                <th>Lịch tiêm</th>
                                <th>Cơ sở tiêm</th>
                                <th>Điểm bất thường</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arrpdk as $i => $pdk) : ?>
                                <!-- -->
                                <?php
                                $nt = $pdk->findUser();
                                $lht = $pdk->findVaccinationSchedule();
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="chkChonPDK" name="chkChon" value="<?= $pdk->getID() ?>" <?php if ($pdk->trangthai != 0) {
                                                                                                                                    echo "disabled";
                                                                                                                                } ?>>
                                    </td>
                                    <!-- <td><?= ++$i ?></td> -->
                                    <td><?= $pdk->getId() ?></td>
                                    <!-- <td><?= $nt->sdt ?></td> -->
                                    <td><?= $nt->hoten ?></td>
                                    <td><?= $nt->ngaysinh ?></td>
                                    <td><?php
                                        if ($nt->gioitinh == 0) {
                                            echo "Nam";
                                        } else if ($nt->gioitinh == 1) {
                                            echo "Nữ";
                                        } else {
                                            echo "Khác";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $nt->cmnd ?></td>
                                    <td><?= $nt->tinh ?></td>
                                    <td><?= $nt->quan ?></td>
                                    <td><?= $nt->phuong ?></td>
                                    <td><?= $nt->diachi ?></td>
                                    <td><?= $pdk->ngaydangky ?></td>
                                    <td><?= $lht->ngaytiem ?></td>

                                    <td><?php echo $lht->findLocation()->ten ?></td>
                                    <td><?= $pdk->diembatthuong ?></td>
                                    <td><?php if ($pdk->trangthai == 1) {
                                            echo "<span class=\"text-info\">Đã xác nhận</span>";
                                        } else if ($pdk->trangthai == 2) {
                                            echo "<span class=\"text-warning\">Đã từ chối</span>";
                                        } else if ($pdk->trangthai == 3) {
                                            echo "<span class=\"text-danger\">Đã hủy</span>";
                                        } else if ($pdk->trangthai == 4) {
                                            echo "<span class=\"text-success\">Tiêm thành công</span>";
                                        } else if ($pdk->trangthai == 0) {
                                            echo "<span class=\"text-primary\">Chưa xác nhận</span>";
                                        } ?></td>
                                    <td>
                                        <!-- <a class="btn btn-light text-primary" data-toggle="modal" data-target="#viewDangKy" href="index.php?="><i class="fa-solid fa-eye"></i></a> -->
                                        <form action="<?= url('backend/quanlydangkytiem/viewUser.php') ?>" method="POST" style="display: inline;" >
                                            <input type="hidden" name="id" value="<?= $pdk->getId() ?>">
                                            <button type="submit" class="btn btn-light text-primary my-1" name="btnView" data-toggle="modal" data-target="#viewDangKy"><i class="fa-solid fa-eye"></i> </button>
                                        </form>
                                        <!-- <button class="btn btn-light btnView" type="button" data-toggle="modal" data-target="#viewDangKy" data-pdk_id=""><i class="fa-solid fa-eye"></i></button> -->

                                        <form action="<?= url('backend/quanlydangkytiem/edit.php') ?>" method="POST" style="display: inline;" >
                                            <input type="hidden" name="id_Confirm" value="<?= $pdk->getId() ?>">
                                            <button type="submit" class="btn btn-xs btn-primary btnConfirm my-1" name="btnConfirm" <?php if ($pdk->trangthai != 0) {
                                                                                                                                    echo "hidden";
                                                                                                                                } ?>>
                                                <i class="fa-solid fa-check"></i> </button>
                                        </form>
                                        <form action="<?= url('backend/quanlydangkytiem/edit.php') ?>" method="POST" style="display: inline;" >
                                            <input type="hidden" name="id_Refuse" value="<?= $pdk->getId() ?>">
                                            <button type="submit" class="btn btn-warning text-white btnRefuse my-1" name="btnRefuse" <?php if ($pdk->trangthai != 0) {
                                                                                                                                    echo "hidden";
                                                                                                                                } ?>><i class="fa-solid fa-ban"></i> </button>

                                        </form>



                                    </td>
                                </tr>
                                <!--  -->
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                    <form action="<?= url('backend/quanlydangkytiem/edit.php') ?>" method="POST" style="display: none;" id="frmXNA">
                        <input name="arrID" value="">
                        <button type="submit" class="btn btn-xs btn-primary" name="btnXNA" id="btnXNA">
                            <i class="fa-solid fa-check"></i></button>
                    </form>
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

            const btnXN = $('#btnXN');
            const frmXNA = $('#frmXNA');
            const btnXNA = $('#btnXNA');
            const inputFrmXNA = frmXNA.children('input');
            // console.log(inputFrmXNA);
            btnXN.on("click", function() {

                var pdk_id = $('.chkChonPDK');
                
                var listPDK = "";

                var i, j = 0;
                var n = 0;
                for (i = 0; i < pdk_id.length; i++) {
                    if (pdk_id[i].checked) {
                        ++n;
                        listPDK += pdk_id[i].value + ",";
                    }
                }
                inputFrmXNA.val(listPDK.slice(0, -1));
                // console.log(inputFrmXNA.val());
                if (inputFrmXNA.val() !== "") {
                    Swal.fire({
                        title: `Bạn có chắc chắn gửi xác nhận ${n} phiếu tiêm?`,
                        text: "Sau khi đồng ý, trạng thái phiếu tiêm không thể hoàn tác!",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý gửi!',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            btnXNA.click();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Đã xảy ra lỗi...',
                        text: 'Danh sách phiếu tiêm rỗng!',
                        
                    })
                }
                
            });


            // console.log($('.btnConfirm'));
            $('.btnConfirm').on("click", function(e) {
                e.preventDefault();
                const form = $(this).closest('form');


                Swal.fire({
                    title: 'Bạn có chắc chắn xác nhận?',
                    text: "Sau khi đồng ý xác nhận, trạng thái phiếu tiêm không thể hoàn tác!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý ',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.trigger('submit');
                    }
                })
            });

            $('.btnRefuse').on("click", function(e) {
                e.preventDefault();
                const form = $(this).closest('form');


                Swal.fire({
                    title: 'Bạn có chắc chắn từ chối?',
                    text: "Sau khi từ chối, trạng thái phiếu tiêm không thể hoàn tác!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f5ad42',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Từ chối',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.trigger('submit');
                    }
                })
            });
            $('#tbDangKyTiem').DataTable({
                // scrollX: true,
                scrollY: 500,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
                },
            });
            var table = $('#tbDangKyTiem').DataTable();
            $(".searchField").on("keyup change", function() {
                var input = $(this);
                var colIndex = parseInt(input.attr("column"));
                table.column(colIndex).search(input.val()).draw();

            });



        });



        // $('.btnView').on("click", function(){
        //     console.log("hi");    
        //     //$(this).data('cs_id');           
        //     var strPDKID = $(this).data("pdk_id");
        //     console.log(strPDKID);
        //     var div = $("#dd");
        //     var phpe = ;
        //     div.innerHTML = "<h1>co</h1>";
        //     div.append(phpe);
        //     //div.text(');
        //     // div.html('<\?php $p = '+ `${strPDKID}` + '>');
        //     // $p->find(2);
        //     // var_dump($p);
        //     // 
        // });


        // });
    </script>
    <script>

    </script>


</body>

</html>
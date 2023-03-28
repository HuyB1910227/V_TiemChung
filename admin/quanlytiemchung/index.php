<?php
require_once '../../db_connect.php';

use TC\OBS\PhieuDangKy;

$pdk = new PhieuDangKy($PDO);
$arrpdk = $pdk->all();

use TC\OBS\KhachHang;

$nt = new KhachHang($PDO);

use TC\OBS\LichHenTiem;
use TC\OBS\TaiKhoan;
use TC\OBS\Vaccine;

$lht = new LichHenTiem($PDO);

$vaccine = new Vaccine($PDO);
$Vaccines = $vaccine->all();
$tk = new TaiKhoan($PDO);
$ngh = new KhachHang($PDO);
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
            <div class="col-10 offset-2">
                <h3>Tiêm Vắc xin</h3>
               
                <div class="row filter">
                    <h5 class="col-12"><i class="fa-solid fa-filter"></i>
                        Bộ lọc</h5>
                    <div class="col-2 ">
                        <div class="form-group">
                            <label for="inputPassword">Ngày tiêm</label>

                            <select name="slTT" id="slTT" class="custom-select searchField" column="8">
                                <option value="">Tất cả</option>
                                <option value="<?= date("Y-m-d");?>">Hôm nay</option>
                                
                              
                            </select>

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Giới tính</label>

                            <select name="slTT" id="slTT" class="custom-select searchField" column="3">
                                <option value="">Tất cả</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                

                            </select>

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Ngày đăng ký</label>

                            <input type="date" id="dateNDK" class="form-control searchField" column="7">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Ngày tiêm dự kiến</label>

                            <input type="date" id="dateNDK" class="form-control searchField" column="8">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="inputPassword">Cơ sở tiêm</label>

                            <select name="slTT" id="slTT" class="custom-select searchField" column="9">
                                <option value="">Tất cả</option>

                                <?php 
                                use TC\OBS\CoSoTiem;
                                $cosotiem = new CoSoTiem($PDO);
                                $arrcoso = $cosotiem->all();
                                foreach ($arrcoso as $cosotiem) {
                                    echo "<option value=\"$cosotiem->ten \">$cosotiem->ten</option>";
                                } ?>

                            </select>

                        </div>
                    </div>
                    
                </div>
               
                <hr>
                <div class="bg-white p-2">

                    <div class="float-right">
                       
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive-lg table-striped" id="tbQuanLyTiem">
                        <thead>
                            <tr class="">
                                
                                <th>Mã phiếu</th>
                                
                                <th>Họ và tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>CMND/CCCD</th>
                                <th>Người giám hộ</th>
                                <th>Số điện thoại</th>
                                
                                
                                <th>Ngày đăng ký</th>
                                <th>Lịch tiêm</th>
                                <th>Cơ sở tiêm</th>
                                <th>Điểm bất thường</th>
                               
                                <th>Vắc xin</th>
                                <th>Lần tiêm</th>
                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach ($arrpdk as $i => $pdk) : ?>
                                <?php if ($pdk->trangthai == 1 && strtotime($pdk->findVaccinationSchedule()->ngaytiem) >= $today) : ?>
                                    <?php
                                    $nt = $pdk->findUser();
                                    $lht = $pdk->findVaccinationSchedule();
                                    ?>
                                    <tr>
                                        
                                        <form action="<?= url('admin/quanlytiemchung/execute.php') ?>" method="POST" style="display: inline;">
                                            
                                            <td><?= $pdk->getId() ?></td>
                                           
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
                                            <td><?= $nt->nt_id != "" ? $ngh->find($nt->nt_id)->hoten : "Không"?></td>
                                            <td><?= $nt->nt_id != "" ? $tk->findByNDID($nt->nt_id)->sdt : $tk->findByNDID($nt->layId())->sdt ?></td>
                                           
                                            
                                            <td><?= $pdk->ngaydangky ?></td>
                                            <td><?= $lht->ngaytiem ?></td>

                                            <td><?php echo $lht->findLocation()->ten ?></td>
                                            <td><?= $pdk->diembatthuong == "0" ? "Không" : "Có"?></td>
                                           
                                            <td>
                                                <div class="form-group">
                                                    <select name="slVaccineID" id="" class="custom-select">
                                                        <option value="">--Chọn--</option>
                                                        <?php foreach ($Vaccines as $vac) : ?>
                                                            <option value="<?= $vac->layID(); ?>"><?= $vac->ten ?></option>
                                                        <?php endforeach; ?>
                                                    </select><br>
                                                    <span class="text-primary">
                                                           (*) Chọn loại vắc xin tại đây
                                                    </span>
                                                </div>

                                            </td>
                                            <td><?= $nt->solantiem + 1; ?></td>
                                            <td>
                                                <input type="hidden" name="idKH" value="<?= $nt->layId() ?>">
                                                <input type="hidden" name="nbLanTiem" value="<?= (int)$nt->solantiem + 1 ?>">
                                                <input type="hidden" name="slCoSoID" value="<?= $lht->findLocation()->layID() ?>">
                                                <input type="hidden" name="idPDK" value="<?= $pdk->getId() ?>">
                                                <button type="submit" class="btn btn-primary" name="btnExecute" <?php 
                                                
                                                if(strtotime($lht->ngaytiem) > $today || strtotime($lht->ngaytiem) < $today  ){
                                                    echo "disabled";
                                                }
                                                
                                                
                                                ?>><i class="fa-solid fa-syringe"></i> Xác nhận tiêm</button>
                                        </form>
                                        <br>
                                        <form action="<?= url('admin/quanlytiemchung/viewUsers.php') ?>" method="POST" style="display: inline;">
                                            <input type="hidden" name="id" value="<?= $pdk->getId() ?>">
                                            <button type="submit" class="btn btn-light text-primary" name="btnView"><i class="fa-solid fa-eye"></i> Xem chi tiết</button>
                                        </form>


                                        </td>
                                    <?php endif; ?>




                                    </tr>
                                <?php endforeach; ?>
                        </tbody>

                    </table>
                    
                </div>




            </div>
        </div>
    </div>
    </div>
    </div>
    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
    <script src="../../assets/backend/js/WVaccine.js"></script>

</body>

</html>
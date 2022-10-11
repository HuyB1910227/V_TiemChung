<?php
    require_once '../../db_connect.php';
    use TC\OBS\PhieuDangKy;
    $pdk = new PhieuDangKy($PDO);
    $arrpdk = $pdk->all();
    use TC\OBS\KhachHang;
    $nt = new KhachHang($PDO);
    use TC\OBS\LichHenTiem;
    use TC\OBS\Vaccine;

    $lht = new LichHenTiem($PDO);
    // $pdk1 = $arrpdk[2];
    // var_dump($pdk1);
    // $pdk1->detectUnusual();
    // var_dump($pdk1->diembatthuong);
    $vaccine = new Vaccine($PDO);
    $Vaccines = $vaccine->all();
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
            <div class="col-10">
                <h3 class="text-info">Danh sách tiêm vaccin</h3>

                <div class="bg-white p-2">
                    <p class="float-left">Tổng số lượng</p>
                    <div class="float-right">
                        <!-- <button class="btn btn-warning text-white"><i class="fa-solid fa-ban"></i> Từ chối</button>
                        <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Xác nhận</button> -->
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive-lg">
                        <tr class="bg-primary text-center text-light">
                            <th>Chọn</th>
                            <th>STT</th>
                            <th>Mã phiếu</th>
                            <!-- <th>Số điện thoại</th> -->
                            <th>Họ và tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>CCCD</th>
                            <!-- <th>Tỉnh/Thành phố</th>
                            <th>Quận/Huyện</th>
                            <th>Xã/Phường</th> -->
                            <th>Địa chỉ</th>
                            <th>Ngày đăng ký</th>
                            <th>Lịch tiêm</th>
                            <th>Cơ sở tiêm</th>
                            <th>Điểm bất thường</th>
                            <th>Trạng thái</th>
                            <th>Vaccine</th>
                            <th>Lần tiêm</th>
                            <th>Thao tác</th>

                        </tr>
                        <?php foreach($arrpdk as $i => $pdk):?>
                            <?php if($pdk->trangthai == 1):?>
                                <?php 
                                    $nt = $pdk->findUser();
                                    $lht = $pdk->findVaccinationSchedule();
                                ?>
                                <tr>
                                    <td>
                                    <input type="checkbox" class="chkChonCoSo" name="chkChon" data-cs_id="<?= $pdk->getID()?>" >
                                    </td>
                                    <form action="<?=url('backend/quanlytiemchung/execute.php')?>" method="POST" style="display: inline;">
                                    <td><?= ++$i?></td>
                                    <td><?= $pdk->getId()?></td>
                                    <!-- <td><?= $nt->sdt?></td> -->
                                    <td><?= $nt->hoten?></td>
                                    <td><?= $nt->ngaysinh?></td>
                                    <td><?php 
                                            if($nt->gioitinh == 0){
                                                echo "Nam";
                                            } else if($nt->gioitinh == 1){
                                                echo "Nữ";
                                            } else {
                                                echo "Khác";
                                            }
                                            ?>
                                    </td>
                                    <td><?= $nt->cmnd?></td>
                                    <!-- <td><?= $nt->tinh?></td>
                                    <td><?= $nt->quan?></td>
                                    <td><?= $nt->phuong?></td> -->
                                    <td><?= $nt->diachi?></td>
                                    <td><?= $pdk->ngaydangky?></td>
                                    <td><?= $lht->ngaytiem?></td>
                                
                                    <td><?php echo $lht->findLocation()->ten?></td>
                                    <td><?= $pdk->diembatthuong?></td>
                                    <td><?php if($pdk->trangthai == 1) {
                                        echo "Đã xác nhận";

                                        } else if($pdk->trangthai == 2){
                                            echo "Đã từ chối";
                                        } else {
                                            echo "Chưa xác nhận";
                                        }?></td>
                                    </td>
                                    <td>
                                        <select name="slVaccineID" id="">
                                            <?php foreach($Vaccines as $vac):?>
                                                <option value="<?= $vac->layID();?>"><?= $vac->ten?></option>
                                            <?php endforeach;?> 
                                        </select>
                                    </td>
                                    <td><?= $nt->solantiem + 1;?></td>
                                    <td>
                                            <input type="hidden" name="idKH" value="<?=$nt->layId()?>">
                                            <input type="hidden" name="nbLanTiem" value="<?= (int)$nt->solantiem + 1?>">
                                            <input type="hidden" name="slCoSoID" value="<?= $lht->findLocation()->layID()?>"> 
                                            <input type="hidden" name="idPDK" value="<?=$pdk->getId()?>">
                                            <button type="submit" class="btn btn-primary" name="btnExecute">Xác nhận tiêm</button>
                                        </form>
                                        <form action="<?=url('backend/quanlytiemchung/viewUsers.php')?>" method="POST" style="display: inline;">
                                            <input type="hidden" name="id" value="<?=$pdk->getId()?>">
                                            <button type="submit" class="btn btn-light text-primary" name="btnView" ><i class="fa-solid fa-eye"></i></button>
                                        </form>
                                        
                                            
                                    </td>
                                <?php endif;?>
                                


                                
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                

                
                </div>
            </div>
        </div>
    </div>
    </div>




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>

    <script>
        $(function(){
            
            $('.btnView').on("click", function(){
                console.log("hi");    
                //$(this).data('cs_id');           
                var strPDKID = $(this).data("pdk_id");
                console.log(strPDKID);
                var div = $("#dd");
                var phpe = <?php $p->find($strPDKID); ?>;
                div.innerHTML = "<h1>co</h1>";
                div.append(phpe);
                //div.text('<?php $p->find('+ `${strPDKID}` + '); ?>);
                // div.html('<\?php $p = '+ `${strPDKID}` + '>');
                // $p->find(2);
                // var_dump($p);
                // 
            });
        });
    </script>


</body>

</html>
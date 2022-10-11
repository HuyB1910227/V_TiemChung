<?php
    require_once '../../db_connect.php';

    use TC\OBS\CoSoTiem;
    use TC\OBS\KhachHang;
    use TC\OBS\LichSuTiem;
    use TC\OBS\ThongTinTiem;

    $nt = new KhachHang($PDO);
    $tc = new ThongTinTiem($PDO);
    $lst = new LichSuTiem($PDO);
    $cs = new CoSoTiem($PDO);
    $arrLST = $lst->all();


    
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
                <h3 class="text-info">Danh sách đăng ký tiêm vaccin</h3>

                <div class="bg-white p-2">
                    <p class="float-left">Tổng số lượng: <?= count($arrLST)?></p>
                    <div class="float-right">
                        <!-- <button class="btn btn-warning text-white"><i class="fa-solid fa-ban"></i> Từ chối</button>
                        <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Xác nhận</button> -->
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive">
                        <tr class="bg-primary text-center text-light">
                            
                            <th>STT</th>
                            
                            <!-- <th>Số điện thoại</th> -->
                            <th>Họ và tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>CCCD</th>
                            <th>Tỉnh/Thành phố</th>
                            <th>Quận/Huyện</th>
                            <th>Xã/Phường</th>
                            <th>Địa chỉ</th>
                            
                            <th>Mã lịch tiêm</th>
                            <th>Ngày tiêm</th>
                            <th>Cơ sở tiêm</th>
                            
                            <th>Lần tiêm</th>
                            <th>Trạng thái sau tiêm</th>
                            

                        </tr>
                        <?php foreach($arrLST as $i => $lst):?>
                            <?php 
                                $nt->find($lst->kh_id) ;
                                $tc->find($lst->tc_id);
                            ?>
                            <tr>
                                
                                <td><?= ++$i?></td>
                                <td><?= $nt->hoten?></td>
                                <!-- <td><?= $nt->sdt?></td> -->
                                
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
                                <td><?= $nt->tinh?></td>
                                <td><?= $nt->quan?></td>
                                <td><?= $nt->phuong?></td>
                                <td><?= $nt->diachi?></td>
                                <td><?= $tc->getID()?></td>
                                <td><?= $tc->ngaytiem?></td>
                               
                                <td><?= $cs->find($tc->cs_id)->ten ?></td>
                                <td><?= $tc->lantiem?></td>
                                <!-- <?php //$nt->updateNOV($tc->lantiem);
                                   // $nt->updateLastVaccinated($tc->ngaytiem);?> -->
                                
                                <td><?= $lst->ttsautiem?></td>
                                    
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

    


</body>

</html>
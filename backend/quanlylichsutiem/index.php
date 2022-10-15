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
            <div class="col-10 offset-2">
                <h3>Lịch sử tiêm</h3>

                <div class="bg-white p-2">
                    
                    <div class="float-right">
                        <!-- <button class="btn btn-warning text-white"><i class="fa-solid fa-ban"></i> Từ chối</button>
                        <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Xác nhận</button> -->
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive">
                        <thead>
                            <tr class="">
                            
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
                            <th>Thao tác</th>

                        </tr>
                        </thead>
                        <tbody>
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
                                 <td>
                                    <button type="button" class="btn btn-primary btnttst" data-toggle="modal" data-target="#exampleModal" data-lst_id="<?= $lst->getID()?>">
                                            Thêm trạng thái sau tiêm
                                </button>
                                 
                                 </td>   
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        
                    </table>

                    <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Launch demo modal
                                </button> -->

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <form action="edit.php" method="post" id="frmSuaTrangThai">
                                            <div>
                                                <input type="text" class="form-control" name="lstID"  id="lstID" hidden>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="txtTTST">Trạng thái sau tiêm</label>
                                                <input type="text" class="form-control" name="txtTTST">


                                            </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                    </div>
                                </div>
                                </div>
                </div>

                

                
                
                
                </div>
            </div>
        </div>
    </div>
    </div>




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
    
    <script>
        $(document).ready(function(){
            var btnTTST = $('.btnttst');
            const frmTrangThai = $('#lstID');
            btnTTST.on("click", function(){
                var lstID = $(this).data('lst_id');
                frmTrangThai.val(lstID);
             })
        });
    </script>


</body>

</html>
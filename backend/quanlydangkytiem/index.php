<?php
    require_once '../../db_connect.php';
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
            <div class="col-10 mt-1">
                <h3>Danh sách đăng ký tiêm vaccin</h3>
               
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
                                <!-- <th>Chọn</th> -->
                                <th>STT</th>
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
                        <?php foreach($arrpdk as $i => $pdk):?>
                            <?php if($pdk->trangthai == 0):?>
                            <?php 
                                $nt = $pdk->findUser();
                                $lht = $pdk->findVaccinationSchedule();
                            ?>
                            <tr>
                                <!-- <td>
                                <input type="checkbox" class="chkChonCoSo" name="chkChon" data-cs_id="<?= $pdk->getID()?>" >
                                </td> -->
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
                                <td><?= $nt->tinh?></td>
                                <td><?= $nt->quan?></td>
                                <td><?= $nt->phuong?></td>
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
                                <td>
                                    <!-- <a class="btn btn-light text-primary" data-toggle="modal" data-target="#viewDangKy" href="index.php?="><i class="fa-solid fa-eye"></i></a> -->
                                    <form action="<?=url('backend/quanlydangkytiem/viewUser.php')?>" method="POST" style="display: inline;">
									    <input type="hidden" name="id" value="<?=$pdk->getId()?>">
                                        <button type="submit" class="btn btn-light text-primary" name="btnView" data-toggle="modal" data-target="#viewDangKy"><i class="fa-solid fa-eye"></i></button>
								    </form>
                                    <!-- <button class="btn btn-light btnView" type="button" data-toggle="modal" data-target="#viewDangKy" data-pdk_id=""><i class="fa-solid fa-eye"></i></button> -->
                                    <form action="<?=url('backend/quanlydangkytiem/delete.php')?>" method="POST" style="display: inline;">
									    <input type="hidden" name="id" value="<?=$pdk->getId()?>">
										<!-- <button type="submit" class="btn btn-xs btn-danger" name="btn"> -->
									    <!-- <i alt="Delete" class="fa fa-trash"></i></button> -->
								    </form>
                                    <form action="<?=url('backend/quanlydangkytiem/edit.php')?>" method="POST" style="display: inline;">
									    <input type="hidden" name="id" value="<?=$pdk->getId()?>">
										<button type="submit" class="btn btn-xs btn-primary" name="btnConfirm">
									    <i class="fa-solid fa-check"></i></button>
								    </form>
                                    <form action="<?=url('backend/quanlydangkytiem/edit.php')?>" method="POST" style="display: inline;">
									    <input type="hidden" name="id" value="<?=$pdk->getId()?>">
                                        <button type="submit" class="btn btn-warning text-white" name="btnRefuse"><i class="fa-solid fa-ban" ></i></button>

								    </form>
                                


                                </td>
                            </tr>
                            <?php endif;?>
                        <?php endforeach; ?>
                        </tbody>
                        
                    </table>
                </div>

                

                <!-- Modal view -->
                <!-- Button trigger modal -->
                
                <!-- Modal -->
                <!-- <div class="modal fade" id="viewDangKy" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thông tin đăng ký</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col" id="dd"></div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                    </div>
                </div> -->
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
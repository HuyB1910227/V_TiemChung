<?php

	require_once '../../db_connect.php';
	use TC\OBS\CoSoTiem;
	$coso = new CoSoTiem($PDO);
	$mangcoso = $coso->all();
    //var_dump($mangcoso);
	
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý cơ sở tiêm</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10">
                <h3 class="text-info">Danh sách cơ sở tiêm chủng</h3>
                
                <div class="bg-white p-2">
                    <p class="float-left">Tổng số lượng: <?= count($mangcoso);?></p>
                    <div class="float-right">
                        <button type="button" id="btnXoaN" class="btn btn-danger">Xóa</button>
                        <a class="btn btn-primary btn-link text-light" href="<?= url('backend/quanlycosotiem/create.php') ?>">Thêm</a>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive-lg">
                        <tr class="bg-primary text-center text-light">
                            <th>Chọn</th>
                            <th>STT</th>
                            <th>Tên cơ sở</th>
                            <th>Địa chỉ</th>
                            <th>Phường / Xã</th>
                            <th>Quận / Huyện</th>
                            <th>Thành phố / Tỉnh</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php foreach($mangcoso as $i => $coso):?>
                        <tr>
                            <td>
                                <input type="checkbox" class="chkChonCoSo" name="chkChon" data-cs_id="<?= $coso->layID()?>" >
                            </td>
                            <td><?= ++$i?></td>
                            <td><?= $coso->ten?></td>
                            <td><?= $coso->diachi?></td>
                            <td><?= $coso->phuong?></td>
                            <td><?= $coso->quan?></td>
                            <td><?= $coso->tinh?></td>
                            <?php if ($coso->trangthai == 0):?>
                                <td><button class="btn btn-warning">Không hoạt động</button></td>
                            <?php else:?>
                                <td>
                                <button class="btn btn-success">Hoạt động</button>
                                </td>
                            <?php endif;?>
                            <td>
                                <a class="btn btn-warning text-white" href="edit.php?id=<?= $coso->layID()?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <!-- <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> -->
                                <!-- <a href="delete.php?cs_id=">Xóa</a> -->
                                <!-- <button class="btn btn-danger btnDelete" type="button" data-cs_id="">Xóa</button> -->
                                <form action="<?=url('backend/quanlycosotiem/delete.php')?>" method="POST" style="display: inline;">
									<input type="hidden" name="id" value="<?=$coso->layId()?>">
										<button type="submit" class="btn btn-xs btn-danger" name="delete-contact">
									<i alt="Delete" class="fa fa-trash"></i></button>
								</form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
           
        </div>
        
    </div>
    </div>
    
    




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
    <script>
        $(document).ready(function(){
            
            $('.btnDelete').click(function(){
                console.log('co click')
                var cs_id = $(this).data('cs_id');
                console.log(cs_id);
                var url = "delete.php?id="+ cs_id;
                
                location.href = url;
            });
            // $('#btnXoaN').click(function(){
            //     console.log('hi');
            //     var a = [1,2,3,4];

            //     var arr= $('.chkChonCoSo').data('cs_id');
            //     // arr.array.forEach(element => {
            //     //     console.log(element);
            //     // });
            //     if($('.chkChonCoSo').checked){
            //         console.log('yes');
            //     }
            //     console.log(arr);
            // });


        });
    </script>
</body>

</html>
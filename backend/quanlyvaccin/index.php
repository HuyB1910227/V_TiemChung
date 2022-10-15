<?php
    require_once '../../db_connect.php';

    // use TC\OBS\LoaiVaccine;

    

    use TC\OBS\Vaccine;
    use TC\OBS\LoaiVaccine;

    $vaccine = new Vaccine($PDO);
    $mangvaccine = $vaccine->all();
    // var_dump($mangvaccine);



    // $loai = new LoaiVaccine($PDO);
    // $mangloai = $loai->all();
    // var_dump($mangloai);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý vaccin tiêm chủng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3>Danh sách vacxin</h3>
                
                <div class="bg-white p-2">
                  
                    <div class="float-right">
                       
                        <a class="btn btn-primary btn-link text-light" href="/V_TiemChung/backend/quanlyvaccin/create.php">Thêm</a>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white">
                        <thead>
                            <tr class="">
                            <!-- <th>Chọn</th> -->
                            <th>STT</th>
                            <th>Mã vaccine</th>
                            <th>Tên</th>
                            <th>Hiệu lực</th>
                            
                            <th>Loại</th>
                            <th>Thao tác</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($mangvaccine as $k => $vaccine):?>
                        <tr>
                            <!-- <td>
                                <input type="checkbox" class="chkChonCoSo" name="chkChon" data-cs_id="<?= $e['cs_id']?>" >
                            </td> -->
                            <td><?= ++$k?></td>
                            <td><?= $vaccine->layID()?></td>
                            <td><?= $vaccine->ten?></td>
                            <td><?= $vaccine->hieuluc . " ngày"?></td>
                           
                            <td><?php //$loaivaccine = new LoaiVaccine($PDO);
                                    //$loaivaccine->find($vaccine->lvc_id);
                                    // var_dump($vaccine->lvc_id);
                                    //echo $loaivaccine->ten;
                                    $k = $vaccine->findVaccineType();
                                    echo $k->ten;
                            ?></td>
                            
                            <td>
                            <a class="btn btn-warning text-white" href="edit.php?id=<?= $vaccine->layID()?>"><i class="fa-solid fa-pen-to-square"></i></a>

                                <!-- <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> -->
                                <!-- <a href="delete.php?cs_id=">Xóa</a> -->
                                <form action="<?=url('backend/quanlyvaccin/delete.php')?>" method="POST" style="display: inline;">
									<input type="hidden" name="id" value="<?=$vaccine->layId()?>">
										<button type="submit" class="btn btn-xs btn-danger" name="delete-contact">
									<i alt="Delete" class="fa fa-trash"></i></button>
								</form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                        
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
                var cs_id = $(this).data('cs_id');
                console.log(cs_id);
                var url = "delete.php?cs_id=" + cs_id;
                location.href = url;
            });
            

        });
    </script>
</body>

</html>
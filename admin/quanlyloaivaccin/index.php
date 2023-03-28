<?php
    require_once '../../db_connect.php';



    

    use TC\OBS\Vaccine;
    use TC\OBS\LoaiVaccine;

    $vaccine = new Vaccine($PDO);
    $mangvaccine = $vaccine->all();
 



    $loai = new LoaiVaccine($PDO);
    $mangloai = $loai->all();
   
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý loại vắc xin</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3>Quản lý loại vắc xin</h3>
                
                <div class="bg-white mx-2 row">
                  
                    <div class="">
                       
                        <a class="btn btn-primary btn-link text-light" href="/V_TiemChung/admin/quanlyloaivaccin/create.php"><i class="fa-solid fa-prescription-bottle-medical"></i> Thêm loại vắc xin</a>
                    </div>
                </div>
                <hr>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-striped" id="tbLoaiVaccine">
                        <thead>
                            <tr class="">
                           
                            <th>STT</th>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Mô tả</th>
                            
                          
                            <th>Thao tác</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($mangloai as $k => $loai):?>
                        <tr>
                            
                            <td><?= ++$k?></td>
                            <td><?= $loai->layID()?></td>
                            <td class="ttxoa"><?= $loai->ten?></td>
                            <td><?= $loai->mota?></td>
                           
                            
                            <td>
                            <a class="btn btn-warning text-white" href="edit.php?id=<?= $loai->layID()?>"><i class="fa-solid fa-pen-to-square"></i></a>

                               
                                <form action="<?=url('admin/quanlyloaivaccin/delete.php')?>" method="POST" style="display: inline;">
									<input type="hidden" name="id" value="<?=$loai->layId()?>">
										<button type="submit" class="btn btn-xs btn-danger btnDelete" >
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
            
          
           
            $('.btnDelete').on("click", function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const nameTd = $(this).closest('tr').find('td:first');
                const nameTd2 = nameTd.siblings('.ttxoa');
                
                console.log(nameTd2.text());
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success ml-2',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Bạn chắc chắn muốn xóa?',
                    text: `Loại vắc xin: ${nameTd2.text()}.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Có',
                    cancelButtonText: 'Hủy',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.trigger('submit');
                    } 
                    
                })
            });

            $('#tbLoaiVaccine').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
                },
            });

        });
    </script>
</body>

</html>
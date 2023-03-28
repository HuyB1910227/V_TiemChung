<?php

use TC\OBS\TinTuc;
use TC\OBS\Vaccine;

    require_once '../../db_connect.php';
    $camnang = new TinTuc($PDO);
    $arrCN = $camnang->all();




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Cẩm nang y tế</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3>cẩm nang y tế</h3>
                
                <div class="bg-white mx-2 row">
                  
                    <div class="">
                       
                        <a class="btn btn-primary btn-link text-light" href="/V_TiemChung/admin/quanlytintuc/create.php"><i class="fa-solid fa-prescription-bottle-medical"></i> Thêm cẩm nang</a>
                    </div>
                </div>
                <hr>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-striped" id="tbTinTuc">
                        <thead>
                            <tr class="">
                           
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Thao tác</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($arrCN as $k => $camnang):?>
                        <tr>
                            
                            <td><?= ++$k?></td>
                        
                            <td>
                              <img src="../../assets/uploads/<?= $camnang->hinhanh?>" alt="" width="100px" height="100px">
                              </td>
                            <td class="ttxoa"><?= $camnang->tieude?></td>
                            <td><?= htmlspecialchars($camnang->noidung)?></td>
                           
                            
                            <td>
                            <a class="btn btn-warning text-white" href="edit.php?id=<?= $camnang->layID()?>"><i class="fa-solid fa-pen-to-square"></i></a>

                               
                                <form action="<?=url('admin/quanlytintuc/delete.php')?>" method="POST" style="display: inline;">
									<input type="hidden" name="id" value="<?=$camnang->layId()?>">
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
        $(document).ready(function() {
            $('#tbTinTuc').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
                },
            });
            $('.btnDelete').on("click", function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const nameTd = $(this).closest('tr').find('td:first');
                const nameTd2 = nameTd.siblings('.ttxoa');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success ml-2',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Bạn chắc chắn muốn xóa?',
                    text: `Bộ cẩm nang: ${nameTd2.text()}.`,
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
        });
    </script>
  
</body>

</html>
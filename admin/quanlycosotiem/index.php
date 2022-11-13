<?php

require_once '../../db_connect.php';

use TC\OBS\CoSoTiem;

$coso = new CoSoTiem($PDO);
$mangcoso = $coso->all();

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
            <div class="col-10 offset-2 mt-1">
                <h3>Danh sách cơ sở tiêm chủng</h3>
                <div class="bg-white mx-2 row">
                    
                    <div class="float-right">
                        
                        <a class="btn btn-primary btn-link text-light" href="<?= url('admin/quanlycosotiem/create.php') ?>"><i class="fa-regular fa-hospital"></i> Thêm cơ sở</a>
                    </div>
                </div>
                <hr>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive-lg" id="tbCoSoTiem">
                        <thead>
                            <tr class="text-center">

                                <th>STT</th>
                                <th>Tên cơ sở</th>
                                <th>Địa chỉ</th>
                                <th>Phường / Xã</th>
                                <th>Quận / Huyện</th>
                                <th>Thành phố / Tỉnh</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mangcoso as $i => $coso) : ?>
                                <tr>
                                    
                                    <td><?= ++$i ?></td>
                                    <td><?= $coso->ten ?></td>
                                    <td><?= $coso->diachi ?></td>
                                    <td><?= $coso->phuong ?></td>
                                    <td><?= $coso->quan ?></td>
                                    <td><?= $coso->tinh ?></td>
                                    <?php if ($coso->trangthai == 0) : ?>
                                        <td><button class="btn btn-warning">Không hoạt động</button></td>
                                    <?php else : ?>
                                        <td>
                                            <button class="btn btn-success">Hoạt động</button>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <a class="btn btn-warning text-white" href="edit.php?id=<?= $coso->layID() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                      
                                        <form action="<?= url('admin/quanlycosotiem/delete.php') ?>" method="POST" style="display: inline;">
                                            <input type="hidden" name="id" value="<?= $coso->layId() ?>">
                                            <button type="submit" class="btn btn-xs btn-danger btnDelete" name="delete" id="">
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

            
            console.log("hi");
            console.log($('.btnDelete'))
            $('.btnDelete').on("click", function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const nameTd = $(this).closest('tr').find('td:first');
                const nameTd2 = nameTd.siblings('td:first');
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
                    text: `Cơ sở: ${nameTd2.text()}.`,
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

            $('#tbCoSoTiem').DataTable({
                // scrollX: true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
                },
            });



        });
    </script>
</body>

</html>
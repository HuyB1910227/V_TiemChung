<?php
require_once '../../db_connect.php';

use TC\OBS\LichHenTiem;

$lich = new LichHenTiem($PDO);
$arrlichhen = $lich->all();

use TC\OBS\CoSoTiem;

$coso = new CoSoTiem($PDO);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lịch hẹn tiêm</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3>Danh sách lịch hẹn</h3>
                <div class="bg-white mx-2 row">

                    <div class="float-right">
                        
                        <a class="btn btn-primary btn-link text-light" href="/V_TiemChung/admin/quanlylichhentiem/create.php"><i class="fa-solid fa-calendar-plus"></i> Thêm lịch hẹn</a>
                    </div>
                </div>
                <hr>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive-lg " id="tbLichHenTiem">
                        <thead>
                            <tr class="">
                                <!-- <th>Chọn</th> -->
                                <th>STT</th>
                                <th>Mã lịch hẹn</th>
                                <th>Ngày hẹn tiêm</th>
                                <th>Cơ sở tiêm</th>
                                <th>Địa chỉ</th>
                                <th>Phường / Xã</th>
                                <th>Quận / Huyện</th>
                                <th>Thành phố / Tỉnh</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arrlichhen as $i => $lich) : ?>
                                <?php $coso = $lich->findLocation(); ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $lich->getId() ?></td>
                                    <td><?= $lich->ngaytiem ?></td>
                                    <td><?= $coso->ten ?></td>
                                    <td><?= $coso->diachi ?></td>
                                    <td><?= $coso->phuong ?></td>
                                    <td><?= $coso->quan ?></td>
                                    <td><?= $coso->tinh ?></td>
                                    <td><?= $coso->trangthai ?></td>
                                    <td>
                                        <a class="btn btn-warning text-white" href="edit.php?id=<?= $lich->getID() ?>"><i class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="<?= url('admin/quanlylichhentiem/delete.php') ?>" method="POST" style="display: inline;">
                                            <input type="hidden" name="id" value="<?= $lich->getID() ?>">
                                            <button type="submit" class="btn btn-xs btn-danger btnDelete">
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
            $('.btnDelete').on("click", function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const nameTd = $(this).closest('tr').find('td:first');
                const nameTd2 = nameTd.siblings('td:first');
                // const nameTd3 = nameTd2.siblings('td:first');
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
                    text: `Mã lịch hẹn: ${nameTd2.text()}.`,
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

            $('#tbLichHenTiem').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
                },
            });
        })
    </script>
</body>

</html>
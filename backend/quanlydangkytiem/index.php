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
                    <p class="float-left">Tổng số lượng: 1</p>
                    <div class="float-right">
                        <button class="btn btn-warning text-white"><i class="fa-solid fa-ban"></i> Từ chối</button>
                        <button class="btn btn-primary"><i class="fa-solid fa-check"></i> Xác nhận</button>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive">
                        <tr class="bg-primary text-center text-light">
                            <th>Chọn</th>
                            <th>STT</th>
                            <th>Số điện thoại</th>
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
                            
                            <th>Thao tác</th>

                        </tr>
                        <!-- <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                0987654321
                            </td>
                            <td>
                                Nguyễn Văn A
                            </td>
                            <td>
                                18/12/2001
                            </td>
                            <td>
                                Nam
                            </td>
                            <td>
                                0987654321
                            </td>
                            <td>
                                Thành phố Cần Thơ
                            </td>
                            <td>
                                Quận Bình Thủy
                            </td>
                            <td>
                                Phường Long Tuyền
                            </td>
                            <td>
                                332/41
                            </td>
                            <td>
                                21/9/2021
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                <button class="btn btn-info"><i class="fa-solid fa-eye"></i></button>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
</body>

</html>
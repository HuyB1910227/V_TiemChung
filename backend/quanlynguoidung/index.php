<?php

	require_once '../../db_connect.php';
	use TC\OBS\KhachHang;
	$khachhang = new KhachHang($PDO);
	$mangkhachhang = $khachhang->all();
    // var_dump($mangkhachhang);
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý người dùng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10">
                <h3 class="text-info">Danh sách thông tin cá nhân</h3>
                <div class="bg-white p-2">
                    <p class="float-left">Tổng số lượng: 1</p>
                    <div class="float-right">
                        
                        <a class="btn btn-primary btn-link text-light" href="/V_TiemChung/backend/quanlycosotiem/create.php">Thêm</a>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive-lg">
                        <tr class="bg-primary text-center text-light">
                            
                            <th>STT</th>
                            <th>Mã khách hàng</th>
                            <th>Họ tên</th>
                            <th>CMND/CCCD</th>
                            <th>Số điện thoại</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Phường/Xã</th>
                            <th>Quận/Huyện</th>
                            <th>Tỉnh/Thành Phố</th>
                            <th>Địa chỉ</th>
                            <th>Số lần tiêm</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php foreach($mangkhachhang as $k => $kh):?>
                        <tr>
                            
                            <td><?= ++$k?></td>
                            <td><?= $kh->layID()?></td>
                            <td><?= $kh->hoten?></td>
                            <td><?= $kh->cmnd?></td>
                            <td><?= $kh->sdt?></td>
                            <td><?= $kh->ngaysinh?></td>
                            <?php if ($kh->gioitinh == 0): ?>
                                <td>Nam</td>
                            <?php else:?>
                                <td>Nữ</td>
                            <?php endif;?>

    
                            <td><?= $kh->phuong?></td>
                            <td><?= $kh->quan?></td>
                            <td><?= $kh->tinh?></td>
                            <td><?= $kh->diachi?></td>
                            <td><?= $kh->solantiem?></td>
                            
                            <td>
                                <a class="btn btn-warning" href="edit.php?cs_id=<?= $e['kh_id']?>">Sửa</a>
                               
                                <button class="btn btn-danger btnDelete" type="button" data-cs_id="<?= $e['kh_id']?>">Xóa</button>
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
    
</body>

</html>
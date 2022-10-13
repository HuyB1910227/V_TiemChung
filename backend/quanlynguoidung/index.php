<?php

use TC\OBS\KhachHang;

    require_once '../../db_connect.php';
    $khachhang = new KhachHang($PDO);
    $arrkhachhang = $khachhang->all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý khách hàng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10">
                <h3>Danh sách người dùng</h3>
                <div class="bg-white p-2">
                    
                    <div class="float-right">
                        <!-- <button type="button" id="btnXoaN" class="btn btn-danger">Xóa</button> -->
                        <!-- <a class="btn btn-primary btn-link text-light" href="/V_TiemChung/backend/quanlylichhentiem/create.php">Thêm</a> -->
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive-lg " id="tbNguoiDung">
                        <thead>
                            <tr class="">
                            
                            <th>STT</th>
                            <th>Mã khách hàng</th>
                            <th>Họ và tên</th>
                            <th>CMND / CCCD</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Địa chỉ</th>
                            <th>Phường / Xã</th>
                            <th>Quận / Huyện</th>
                            <th>Tỉnh / Thành phố</th>
                            <th>Số lần tiêm</th>
                            <th>Thẻ bảo hiểm</th>
                            
                            <th>Dân tộc</th>
                            <th>Tôn giáo</th>
                            <th>Nghề nghiệp</th>
                            
                          
                            
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($arrkhachhang as $i => $khachhang):?>
                       
                        <tr>
                            <td><?= ++$i?></td>
                            <td><?= $khachhang->layID()?></td>
                            <td><?= $khachhang->hoten?></td>
                            <td><?= $khachhang->cmnd?></td>
                            <td><?= $khachhang->ngaysinh?></td>
                            <td><?= $khachhang->gioitinh?></td>
                            <td><?= $khachhang->diachi?></td>
                            <td><?= $khachhang->phuong?></td>
                            <td><?= $khachhang->quan?></td>
                            <td><?= $khachhang->tinh?></td>
                            <td><?= $khachhang->solantiem?></td>
                            <td><?= $khachhang->baohiem?></td>
                            <td><?= $khachhang->dantoc?></td>
                            <td><?= $khachhang->tongiao?></td>
                            <td><?= $khachhang->nghenghiep?></td>
                            
                            
                        </tr>
                        <?php endforeach;?>
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
			
			$('#tbNguoiDung').DataTable();

			
		});
        
    </script>
    
</body>

</html>
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
                <?php 
                 include_once(__DIR__ . '/../../dbconnect.php');
                 $sql = "SELECT * FROM khach_hang;";
                 $result = mysqli_query($conn, $sql);

                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $data[] = array(
                        'kh_id' => $row['kh_id'],
                        'kh_hoten' => $row['kh_hoten'],
                        'kh_cmnd' => $row['kh_cmnd'],
                        'kh_sodienthoai' => $row['kh_sodienthoai'],
                        'kh_ngaysinh' => $row['kh_ngaysinh'],
                        'kh_gioitinh' => $row['kh_gioitinh'],
                        'kh_diachi' => $row['kh_diachi'],
                        'kh_phuong' => $row['kh_phuong'],
                        'kh_quan' => $row['kh_quan'], 
                        'kh_tinh' => $row['kh_tinh'], 
                        'kh_solantiem' => $row['kh_solantiem']
                    );
                }
                ?>
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
                        <?php foreach($data as $k => $e):?>
                        <tr>
                            
                            <td><?= ++$k?></td>
                            <td><?= $e['kh_id']?></td>
                            <td><?= $e['kh_hoten']?></td>
                            <td><?= $e['kh_cmnd']?></td>
                            <td><?= $e['kh_sodienthoai']?></td>
                            <td><?= $e['kh_ngaysinh']?></td>
                            <?php if ($e['kh_gioitinh'] == 0): ?>
                                <td>Nam</td>
                            <?php else:?>
                                <td>Nữ</td>
                            <?php endif;?>

    
                            <td><?= $e['kh_phuong']?></td>
                            <td><?= $e['kh_quan']?></td>
                            <td><?= $e['kh_tinh']?></td>
                            <td><?= $e['kh_diachi']?></td>
                            <td><?= $e['kh_solantiem']?></td>
                            
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
    <script>
        $(document).ready(function(){
            
            $('.btnDelete').click(function(){
                var cs_id = $(this).data('cs_id');
                console.log(cs_id);
                var url = "delete.php?cs_id=" + cs_id;
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
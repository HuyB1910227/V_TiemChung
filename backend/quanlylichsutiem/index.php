<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý lịch sử tiêm chủng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10">
                <h3 class="text-info">Danh sách lịch sử tiêm chủng</h3>
                <?php 
                 include_once(__DIR__ . '/../../dbconnect.php');
                 $sql = "SELECT cs_id, cs_ten, cs_diachi, cs_phuong,cs_quan, cs_tinh, cs_trangthai FROM co_so_tiem_chung;";
                 $result = mysqli_query($conn, $sql);

                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $data[] = array(
                        'cs_id' => $row['cs_id'],
                        'cs_ten' => $row['cs_ten'],
                        'cs_diachi' => $row['cs_diachi'],
                        'cs_phuong' => $row['cs_phuong'],
                        'cs_quan' => $row['cs_quan'], 
                        'cs_tinh' => $row['cs_tinh'], 
                        'cs_trangthai' => $row['cs_trangthai']
                    );
                }
                ?>
                <div class="bg-white p-2">
                    <p class="float-left">Tổng số lượng: 1</p>
                    <div class="float-right">
                        <!-- <button type="button" id="btnXoaN" class="btn btn-danger">Xóa</button> -->
                        <a class="btn btn-primary btn-link text-light" href="/V_TiemChung/backend/quanlycosotiem/create.php">Thêm</a>
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white table-responsive">
                        <tr class="bg-primary text-center text-light">
                            <!-- <th>Chọn</th> -->
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>CMND/CCCD</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Phường / Xã</th>
                            <th>Quận / Huyện</th>
                            <th>Thành phố / Tỉnh</th>
                            <th>Ngày tiêm</th>
                            <th>Lần tiêm</th>
                            <th>Nhân viên tiêm</th>
                            <th>Trạng thái sau tiêm</th>
                            <th>Cơ sở tiêm</th>
                        </tr>
                        
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
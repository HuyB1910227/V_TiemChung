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
            <div class="col-10">
                <h3 class="text-info">Danh sách vacxin</h3>
                <?php 
                 include_once(__DIR__ . '/../../dbconnect.php');
                 $sql = "
                 SELECT * FROM vaccin 
                JOIN lo_vaccine ON  vaccin.lv_id = lo_vaccine.lv_id
                JOIN loai_vaccine ON vaccin.lvc_id = loai_vaccine.lvc_id;
                 ";
                 $result = mysqli_query($conn, $sql);

                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $data[] = array(
                        'v_id' => $row['v_id'],
                        'v_ten' => $row['v_ten'],
                        'v_hieuluc' => $row['v_hieuluc'],
                        'lv_id' => $row['lv_id'],
                        'lv_ngaysanxuat' => $row['lv_ngaysanxuat'],
                        'lv_hansudung' => $row['lv_hansudung'],
                        'lvc_ten' => $row['lvc_ten']
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
                    <table class="table table-bordered bg-white">
                        <tr class="bg-primary text-center text-light">
                            <!-- <th>Chọn</th> -->
                            <th>STT</th>
                            <th>Mã vaccine</th>
                            <th>Tên</th>
                            <th>Hiệu lực</th>
                            <th>Số lô</th>
                            <th>Ngày sản xuất</th>
                            <th>Hạn sử dụng</th>
                            <th>Loại</th>
                            <th>Thao tác</th>
                            
                        </tr>
                        <?php foreach($data as $k => $e):?>
                        <tr>
                            <!-- <td>
                                <input type="checkbox" class="chkChonCoSo" name="chkChon" data-cs_id="<?= $e['cs_id']?>" >
                            </td> -->
                            <td><?= ++$k?></td>
                            <td><?= $e['v_id']?></td>
                            <td><?= $e['v_ten']?></td>
                            <td><?= $e['v_hieuluc']?></td>
                            <td><?= $e['lv_id']?></td>
                            <td><?= $e['lv_ngaysanxuat']?></td>
                            <td><?= $e['lv_hansudung']?></td>
                            <td><?= $e['lvc_ten']?></td>
                            
                            <td>
                                <a class="btn btn-warning" href="edit.php?cs_id=<?= $e['v_id']?>">Sửa</a>
                                <!-- <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> -->
                                <!-- <a href="delete.php?cs_id=">Xóa</a> -->
                                <button class="btn btn-danger btnDelete" type="button" data-cs_id="<?= $e['v_id']?>">Xóa</button>
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
            

        });
    </script>
</body>

</html>
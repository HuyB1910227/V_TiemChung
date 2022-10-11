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
                <h3 class="text-info">Danh sách tài khoản</h3>
                <?php 
                 include_once(__DIR__ . '/../../dbconnect.php');
                 $sql = "SELECT * FROM tai_khoan where tk_vaitro = 2;";
                 $result = mysqli_query($conn, $sql);

                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $data[] = array(
                        'tk_id' => $row['tk_id'],
                        'tk_ten' => $row['tk_ten'],
                        'tk_hoten' => $row['tk_hoten'],
                        'tk_sodienthoai' => $row['tk_sodienthoai'],
                        'tk_matkhau' => $row['tk_matkhau'],
                        
                    );
                }
                ?>
                <div class="bg-white p-2">
                    <p class="float-left">Tổng số lượng: <?= count($data)?></p>
                    <div class="float-right">
                        
                        <!-- <a class="btn btn-primary btn-link text-light" href="/V_TiemChung/backend/quanlycosotiem/create.php">Thêm</a> -->
                    </div>
                </div>
                <div class="mt-2">
                    <table class="table table-bordered bg-white">
                        <tr class="bg-primary text-center text-light">
                            
                            <!-- <th>STT</th> -->
                            <th>Mã tài khoản</th>
                            <th>Tên tài khoản</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            
                        </tr>
                        <?php foreach($data as $k => $e):?>
                        <tr>
                            
                            <!-- <td><?= ++$k?></td> -->
                            <td><?= $e['tk_id']?></td>
                            <td><?= $e['tk_ten']?></td>
                            <td><?= $e['tk_hoten']?></td>
                            <td><?= $e['tk_sodienthoai']?></td>
                           
                            

    
                            
                            
                            <!-- <td>
                                
                               
                                <button class="btn btn-danger btnDelete" type="button" data-cs_id="<?= $e['tk_id']?>">Xóa</button>
                            </td> -->
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
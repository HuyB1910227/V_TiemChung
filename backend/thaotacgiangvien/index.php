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
            <div class="col">
                <h1>Sach giang vien</h1>
                <?php
                include_once(__DIR__ . '/../../dbconnect.php');
                $sql = "SELECT gv_ma, gv_ten, gv_sodienthoai FROM giangvien;";
                $result = mysqli_query($conn, $sql);

                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $data[] = array(
                        'ma giang vien' => $row['gv_ma'],
                        'ten giang vien' => $row['gv_ten'],
                        'so dien thoai' => $row['gv_sodienthoai'],
                    );
                }
                ?>
                <h3>DANH SÁCH GIẢNG VIÊN CỦA TRUNG TÂM</h3>
                <table class="table table-bordered table-striped">
                    <tr class="bg-primary">
                        <th>STT</th>
                        <th>Ma giang vien</th>
                        <th>Ten giang vien</th>
                        <th>So dien thoai</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php foreach ($data as $k => $ele) : ?>
                        <tr>
                            <td><?= ++$k; ?></td>
                            <td><?= $ele['ma giang vien']; ?></td>
                            <td><?= $ele['ten giang vien']; ?></td>
                            <td><?= $ele['so dien thoai']; ?></td>
                            <td>
                                <a href="#">Sửa</a>
                                <a href="delete.php?gv_ma=<?= $ele['ma giang vien'] ?>">Xóa theo GET</a>

                                <!-- <form name="frmDelete" id="frmDelete" method="post" action="delete.php">
                    <input type="hidden" name="gv_ma" value="<? $ele['ma giang vien'] ?>">    
                    <button>Xoa theo POST</button>
                    </form> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
                <a href="./create.php">Thêm</a>

            </div>
        </div>
    </div>




    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
</body>

</html>
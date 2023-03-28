<?php 
    require '../../db_connect.php';

use TC\OBS\TinTuc;

    $loai = new TinTuc($PDO);
    $id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
    if ($id < 0 || !($loai->find($id))) {
		header('Location : index.php');
	}
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $loai->fill($_POST);
    $targetDir = __DIR__ . "/../../assets/uploads/";
    $avatarName = date("YmdHi") . '_' . basename($_FILES["fileToUpload"]["name"]);
    $targetFile = $targetDir . $avatarName;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        $safeImageName = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
        $loai->fillImage($avatarName);
    }
    $loai->save();
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Cẩm nang y tế</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3 class="">Sửa cẩm nang y tế</h3>
                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="" method="post" id="frmQLVC" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtTieuDe">Tiêu đề </label>
                                <input type="text" name="txtTieuDe" id="txtTieuDe" class="form-control" required value="<?= $loai->tieude?>">
                            </div>
                            <div class="form-group">
                                <label for="fileToUpload">Hình ảnh </label><br>
                                <input type="file" name="fileToUpload" id="fileToUpload" value="<?= $loai->hinhanh?>">
                            </div>
                            <div class="form-group">
                                <label for="txtNoiDung">Nội dung</label>
                                <textarea type="text" name="txtNoiDung" id="textile-demo" class="form-control" required >
                                    <?= $loai->noidung?>
                                </textarea>

                            </div>
                            <a class="btn btn-light rounded-circle border border-primary text-primary " href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                            <button name="btnSave" id="btnSave" class="btn btn-primary rounded-pill w-75 float-right">Cập nhập</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>







    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>

    <?php include_once __DIR__ . '/../layouts/scripts.php'; ?>
    <script>
        $(document).ready(function() {
            $("#textile-demo").textileToolbar({
                toolbar: ["strong","italic","underline", "h1", "h2", "h3", "paragraph", "spacer","ul","ol","url"],
            });
        });
    </script>
</body>

</html>
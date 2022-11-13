<?php
require_once '../../db_connect.php';


use TC\OBS\TinTuc;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $e = new TinTuc($PDO);
    $e->fill($_POST);
    $targetDir = __DIR__."/../../assets/uploads/";
    $avatarName = date("YmdHi") . '_' . basename($_FILES["fileToUpload"]["name"]);
    $targetFile = $targetDir . $avatarName;
    $hasErrors = false;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $extensions = array("jpeg", "jpg", "png", "gif");


    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ". ";
        } else {
            echo "File is not an image.";
            $hasErrors = true;
        }
    }


    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $hasErrors = true;
    }


    if ($_FILES["fileToUpload"]["size"] > 100000000) {
        echo "Sorry, your file is too large.";
        $hasErrors = true;
    }


    if (!in_array($imageFileType, $extensions)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $hasErrors = true;
    }


    if ($hasErrors) {
        echo "Sorry, your file was not uploaded.";
        
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            $safeImageName = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));

            $e->fillImage($avatarName);
            // echo " có";
            
           
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    $e->save();
    // var_dump($e);
   
    header('Location: index.php');
}








?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Quản lý Vaccine </title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once __DIR__ . '/../layouts/partials/sidebar.php'; ?>
            <div class="col-10 offset-2">
                <h3 class="">Thêm cẩm nang y tế</h3>
                <div class="card frmCreate">
                    <div class="card-body">
                        <form action="" method="post" id="frmQLVC" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtTieuDe">Tiêu đề </label>
                                <input type="text" name="txtTieuDe" id="txtTieuDe" class="form-control" required value="">
                            </div>
                            <div class="form-group">
                                <label for="fileToUpload">Hình ảnh </label><br>
                                <input type="file" name="fileToUpload" id="fileToUpload" value="">
                            </div>
                            <div class="form-group">
                                <label for="txtNoiDung">Nội dung</label>
                                <textarea type="text" name="txtNoiDung" id="textile-demo" class="form-control" required value="" ></textarea>

                            </div>
                            <a class="btn btn-light rounded-circle border border-primary text-primary " href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                            <button name="btnSave" id="btnSave" class="btn btn-primary rounded-pill w-75 float-right">Thêm</button>
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
            $("#textile-demo").textileToolbar();
        });
    </script>
</body>

</html>
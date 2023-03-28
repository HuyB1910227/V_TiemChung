<div style="display: none">
<?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
</div>

<?php
$targetDir = __DIR__."/../../assets/uploads/";
$avatarName = date("YmdHi") . '_' . basename($_FILES["fileToUpload"]["name"]);
$targetFile = $targetDir . $avatarName;
$hasErrors = false;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$extensions = array("jpeg", "jpg", "png", "gif");


if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "Đây không phải là file ảnh - " . $check["mime"] . ". ";
    } else {
        echo "Đây không phải là file ảnh.";
        $hasErrors = true;
    }
}


if (file_exists($targetFile)) {
    echo "File ảnh đã tồn tại.";
    $hasErrors = true;
}


if ($_FILES["fileToUpload"]["size"] > 100000000) {
    echo "File vừa cập nhật quá lớn.";
    $hasErrors = true;
}


if (!in_array($imageFileType, $extensions)) {
    echo "Chỉ được phép cập nhật file có đuôi: .jpeg, .jpg, .png, .gif.";
    $hasErrors = true;
}


if ($hasErrors) {
    echo "Không thể thay đổi ảnh! .";
    
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        $safeImageName = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));

        $user->fillAvatar($avatarName);
        $user->changeAvatarName();
        echo "<script>alert('Thay đổi ảnh đại diện thành công!')</script>";
        echo "<script>window.location = 'thongtincanhan.php'</script>";
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

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

        $user->fillAvatar($avatarName);
        $user->changeAvatarName();
        echo "<script>alert('Thay đổi ảnh đại diện thành công!')</script>";
        echo "<script>window.location = 'thongtincanhan.php'</script>";
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

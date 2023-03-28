<?php
require_once '../../db_connect.php';
use TC\OBS\PhieuDangKy;
$phieudangky = new PhieuDangKy($PDO);
if (isset($_POST['khachHangID']) && isset($_POST['lichHenTiemID'])) {
    $phieudangky->fill($_POST);
    var_dump($phieudangky);
    $phieudangky->save();
    header('Location: dangkytiemchung.php');
} else {
    echo "Có lỗi xảy ra!!!";
}

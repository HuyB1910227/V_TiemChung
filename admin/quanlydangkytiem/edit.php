<?php
require_once '../../db_connect.php';
use TC\OBS\PhieuDangKy;
$pdk = new PhieuDangKy($PDO);
if (isset($_POST['id_Confirm']) && ($pdk->find($_POST['id_Confirm'])) !== null) {
    $pdk->confirm();
    header('Location: index.php');
}
if (isset($_POST['id_Refuse']) && ($pdk->find($_POST['id_Refuse'])) !== null) {
    $pdk->refuse();
    header('Location: index.php');
}
if (isset($_POST['arrID'])) {
    $arr = explode(',', $_POST['arrID']);
    foreach ($arr as $e) {
        $pdk->find($e);
        $pdk->confirm();
    }
    header('Location: index.php');
} else {
    echo "Lỗi!";
}
?>
<?php
require_once '../../db_connect.php';


use TC\OBS\LichSuTiem;

$e = new LichSuTiem($PDO);

if (isset($_POST['lstID']) && ($e->find($_POST['lstID'])) !== null) {
    $e->UpdateTTST($_POST['txtTTST']);
    header('Location: index.php');
} else {
    echo "Đã xảy ra lỗi";
}
?>
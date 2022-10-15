<?php

require_once '../../db_connect.php';

use TC\OBS\LichHenTiem;

$e = new LichHenTiem($PDO);

if (isset($_POST['id']) && ($e->find($_POST['id'])) !== null) {
   
    try {
        $e->delete();
        header('Location: index.php');
    } catch (Exception $e) {

        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <span style="color:red">Không thể xóa lịch hẹn này! Lịch hẹn đã hoặc đang được sử dụng </span>
    <a href="index.php">Quay về</a>
</body>
</html>
';
    }
} else {
    echo "oh no";
}

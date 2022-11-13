<?php

use TC\OBS\CoSoTiem;

require_once '../../db_connect.php';
$coso = new CoSoTiem($PDO);
$arrcoso= $coso->all();
$data[] = array(
    'SoLuong' => count($arrcoso)
);
echo json_encode($data[0]);




?>
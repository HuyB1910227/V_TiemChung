<?php

use TC\OBS\KhachHang;

require_once '../../db_connect.php';
$khachhang = new KhachHang($PDO);
$arrkhachhang = $khachhang->all();
$chuatiem = 0;
$datiem1 = 0;
$datiemN = 0;
foreach ($arrkhachhang as $khachhang) {
    if ($khachhang->solantiem == 0) {
        $chuatiem += 1;
    } else if ($khachhang->solantiem == 1) {
        $datiem1 += 1;
    } else {
        $datiemN += 1;
    }
};
$data[] = array(
    'SoLuong' => count($arrkhachhang),
    'ChuaTiem' => $chuatiem,
    'Tiem1Lan' => $datiem1,
    'TiemTren1Lan' => $datiemN
);
echo json_encode($data[0]);
?>
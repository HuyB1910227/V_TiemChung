<?php             
require_once '../../db_connect.php';
$data = [];
for ($i = 1; $i <= 12; $i++) {
    $sql = $PDO->query("SELECT COUNT(*) as soluong FROM lich_hen_tiem where month(lht_ngaytiem) = $i;");
    $result = $sql->fetch();
    $t = $result["soluong"];
    $data[] = array(
        'Thang' => "$i",
        'SoLuong' => "$t"
    );
}             
echo json_encode($data);
?>
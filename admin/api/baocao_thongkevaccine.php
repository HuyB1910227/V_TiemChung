<?php             
require_once '../../db_connect.php';
$data = [];
// for ($i = 1; $i <= 12; $i++) {
//     $sql = $PDO->query("SELECT COUNT(*) as soluong FROM thong_tin_tiem_chung where month(tc_ngaytiem) = $i;");
//     $result = $sql->fetch();
//     $t = $result["soluong"];
//     $data[] = array(
//         'Thang' => "$i",
//         'SoLuong' => "$t"
//     );
// }          
$sql = $PDO->query("SELECT v.v_ten, count(*) as soluong FROM vaccine v JOIN thong_tin_tiem_chung t ON v.v_id = t.v_id GROUP BY v.v_id;");
while($row = $sql->fetch()){
    $data[] = array(
        'Ten' => $row["v_ten"],
        'soLuong' => $row["soluong"]
    );
}
echo json_encode($data);
?>
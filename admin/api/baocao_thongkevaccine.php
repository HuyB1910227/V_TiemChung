<?php             
require_once '../../db_connect.php';
$data = [];

$sql = $PDO->query("SELECT v.v_ten, count(*) as soluong FROM vaccine v JOIN thong_tin_tiem_chung t ON v.v_id = t.v_id GROUP BY v.v_id;");
while($row = $sql->fetch()){
    $data[] = array(
        'Ten' => $row["v_ten"],
        'soLuong' => $row["soluong"]
    );
}
echo json_encode($data);
?>
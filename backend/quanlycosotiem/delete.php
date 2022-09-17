<?php $cs_id = $_GET['cs_id'];
var_dump($cs_id);
if(isset($cs_id)){
    include_once(__DIR__ . '/../../dbconnect.php');
    $sqlDelete = <<<EOF
    DELETE FROM co_so_tiem_chung 
    WHERE cs_id = $cs_id;
EOF;
mysqli_query($conn, $sqlDelete);
echo '<script>location.href="/V_TiemChung/backend/quanlycosotiem/index.php"</script>';
}
?>
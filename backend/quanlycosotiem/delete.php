<?php

require_once '../../db_connect.php';

use CT275\Labs\CoSoTiem;

$coso = new CoSoTiem($PDO);

if (isset($_GET['id'])&& ($coso->find($_GET['id'])) !== null) {
   
    $coso->delete();
    header('Location: index.php');
}
else {
    echo "oh no";
}
?>
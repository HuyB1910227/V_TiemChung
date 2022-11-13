<?php  
    require_once '../../db_connect.php';
    use TC\OBS\CoSoTiem;
    $coso = new CoSoTiem($PDO);
    $mangcoso = $coso->all();




?>
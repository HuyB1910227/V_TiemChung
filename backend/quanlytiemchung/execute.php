<?php
require "../../db_connect.php";

use TC\OBS\LichSuTiem;
use TC\OBS\ThongTinTiem;

if(isset($_POST)){
    echo "có";
    var_dump($_POST);
    $tt = new ThongTinTiem($PDO);
    $tt->fill($_POST);
    var_dump($tt);
    $tt->save();
    
    $lst = new LichSuTiem($PDO);
    $lst->fill($_POST, $tt->getID());
    var_dump($lst);
    $lst->save();
} else {
    echo "ko";
}




?>

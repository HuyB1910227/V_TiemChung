<?php 

require_once '../db_connect.php';
use TC\OBS\TaiKhoan;
$user = new TaiKhoan($PDO);
$arrUser = $user->all();

var_dump($arrUser);

?>
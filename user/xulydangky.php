<?php

    use TC\OBS\KhachHang;
    use TC\OBS\TaiKhoan;

    require_once '../db_connect.php';
    $newKH = new KhachHang($PDO);
    $newTK = new TaiKhoan($PDO);
    if(isset($_POST)){
        $newKH->fill($_POST);
        $newKH->save();
        $id = $newKH->layID();
        $newTK->fill($_POST, $id);
        $newTK->save();

       header("Location: dangnhap.php");
        
    } else {
        echo "no";
    }


?>
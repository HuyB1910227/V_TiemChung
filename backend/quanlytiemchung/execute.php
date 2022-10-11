<?php
require "../../db_connect.php";

use TC\OBS\KhachHang;
use TC\OBS\LichSuTiem;
use TC\OBS\PhieuDangKy;
use TC\OBS\ThongTinTiem;

if(isset($_POST)){
    echo "có";
    var_dump($_POST);
    $tt = new ThongTinTiem($PDO);
    $tt->fill($_POST);
    
    $tt->save();
    
    $lst = new LichSuTiem($PDO);
    $lst->fill($_POST, $tt->getID());
    var_dump($lst);
    $lst->save();
    //
    $nt = new KhachHang($PDO);
    $nt->find($_POST['idKH']);
    $pdk = new PhieuDangKy($PDO);
    
    $pdk->find($_POST['idPDK']);
    if(true){
        // $ngaytiem = $tt->ngaytiem;
        // var_dump($ngaytiem);
        // var_dump($tt);
        $nt->updateNOV($tt->lantiem);
        
        $nt->updateLastVaccinated($nt->findDateLastVaccinated());

        var_dump($nt);
        $pdk->regCompleted();
        $arrpdk = $pdk->selectFromUser($nt->layId());
        $ngayhethieuluc = $nt->dateEXP();
        foreach($arrpdk as $p){
            $p->checkToCancel($ngayhethieuluc);
        }

    }

   
} else {
    echo "ko";
}




?>

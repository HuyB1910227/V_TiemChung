<?php
require "../../db_connect.php";

use TC\OBS\KhachHang;
use TC\OBS\LichSuTiem;
use TC\OBS\PhieuDangKy;
use TC\OBS\ThongTinTiem;
use TC\OBS\Vaccine;

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
    // $vaccine = new Vaccine($PDO);
    // $vaccine->find($_POST["slVaccineID"]);
    $pdk->find($_POST['idPDK']);
    
        // $ngaytiem = $tt->ngaytiem;
        // var_dump($ngaytiem);
        // var_dump($tt);
        $nt->updateNOV($_POST["nbLanTiem"]);
        
        $nt->updateLastVaccinated();

        $nt->updateLastNameOfVaccinated($_POST["slVaccineID"]);

        var_dump($nt);
        $pdk->regCompleted();
        

  
        header("Location: index.php");
   
} else {
    echo "ko";
}




?>

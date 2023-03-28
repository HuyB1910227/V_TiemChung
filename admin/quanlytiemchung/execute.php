<?php
require "../../db_connect.php";

use TC\OBS\KhachHang;
use TC\OBS\LichSuTiem;
use TC\OBS\PhieuDangKy;
use TC\OBS\ThongTinTiem;
use TC\OBS\Vaccine;

if(isset($_POST)){
    echo "có";
    if($_POST["slVaccineID"] == ""){
        echo "<script>alert(\"Bạn chưa chọn Vacxin!\")</script>";
        echo "<script>window.location= 'index.php';</script>";
    }
    $tt = new ThongTinTiem($PDO);
    $tt->fill($_POST);
    $tt->save();
    $lst = new LichSuTiem($PDO);
    $lst->fill($_POST, $tt->getID());
    var_dump($lst);
    $lst->save();
    $nt = new KhachHang($PDO);
    $nt->find($_POST['idKH']);
    $pdk = new PhieuDangKy($PDO);
    $pdk->find($_POST['idPDK']);
    $nt->updateNOV($_POST["nbLanTiem"]);
    $nt->updateLastVaccinated();
    $nt->updateLastNameOfVaccinated($_POST["slVaccineID"]);
    $pdk->regCompleted();
    header("Location: index.php");
} else {
    echo "ko";
}
?>

<?php

    require_once '../../db_connect.php';

    use TC\OBS\PhieuDangKy;

    $phieudangky = new PhieuDangKy($PDO);

    if (isset($_POST['khachHangID'])&&isset($_POST['lichHenTiemID'])) {
        // echo "có";
        // echo $_POST['khachHangID'].$_POST['lichHenTiemID']."<br>";
        // echo $_POST['rdTienSuBenh1']."<br>";
        // echo $_POST['rdTienSuBenh2']."<br>";
        // echo $_POST['rdTienSuBenh3']."<br>";
        // echo $_POST['rdTienSuBenh4']."<br>";
        // echo $_POST['rdTienSuBenh5']."<br>";
        // echo $_POST['rdTienSuBenh6']."<br>";
        // echo $_POST['rdTienSuBenh7']."<br>";
        // echo $_POST['rdTienSuBenh8']."<br>";
        // echo $_POST['rdTienSuBenh9']."<br>";
        // echo $_POST['rdTienSuBenh10']."<br>";
        $phieudangky->fill($_POST);
        var_dump($phieudangky);
        // var_dump($phieudangky->listUnusualYes());
        // var_dump($phieudangky->listUnusualUnclear());
        $phieudangky->save();
        header('Location: dangkytiemchung.php');

    }
    else {
        echo "oh no";
    }
    // ($coso->find($_POST['id'])) == null
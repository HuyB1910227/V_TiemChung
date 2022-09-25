<?php

    require_once '../../db_connect.php';

    use TC\OBS\LichHenTiem;

    $e = new LichHenTiem($PDO);

    if (isset($_POST['id'])&& ($e->find($_POST['id'])) !== null) {
        $e->delete();
        header('Location: index.php');
    }
    else {
        echo "oh no";
    }

<?php

    require_once '../../db_connect.php';

    use TC\OBS\CoSoTiem;

    $coso = new CoSoTiem($PDO);

    if (isset($_POST['id'])&& ($coso->find($_POST['id'])) !== null) {
        $coso->delete();
        header('Location: index.php');
    }
    else {
        echo "oh no";
    }

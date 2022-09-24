<?php

    require_once '../../db_connect.php';

    use TC\OBS\Vaccine;

    $ob = new Vaccine($PDO);

    if (isset($_POST['id'])&& ($ob->find($_POST['id'])) !== null) {
        echo $_POST['id'];
        $ob->delete();
        header('Location: index.php');
    }
    else {
        echo "oh no";
    }

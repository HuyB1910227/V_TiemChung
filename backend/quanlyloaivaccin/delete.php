<?php

    require_once '../../db_connect.php';

    use TC\OBS\LoaiVaccine;

    $ob = new LoaiVaccine($PDO);

    if (isset($_POST['id'])&& ($ob->find($_POST['id'])) !== null) {
        
       
        try{
            $ob->delete();
        header('Location: index.php');
        } catch(Exception $e){
            echo $e;
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <span style="color:red">Không thể xóa loại vắc xin này!  </span>
    <a href="index.php">Quay về</a>
</body>
</html>
';}
    }
    else {
        echo "oh no";
    }
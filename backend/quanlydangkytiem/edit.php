<?php 
    require_once '../../db_connect.php';

    use TC\OBS\PhieuDangKy;

    $pdk = new PhieuDangKy($PDO);

    if (isset($_POST['id'])&& ($pdk->find($_POST['id'])) !== null) {
        if(isset($_POST["btnConfirm"])){
            $pdk->confirm();
        } else if(isset($_POST["btnRefuse"])){
            $pdk->refuse();
        }
        
        header('Location: index.php');
    }
  
    else {
        echo "oh no";
    }


?>
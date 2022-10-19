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
    } elseif(isset($_POST["btnXNA"]) && isset($_POST['arrID'])){
        
        
        $arr = explode(',', $_POST['arrID']);
        foreach($arr as $e){
            $pdk->find($e);
            $pdk->confirm();
        }
        header('Location: index.php');
        
    }
  
    else {
        echo "oh no";
    }


?>
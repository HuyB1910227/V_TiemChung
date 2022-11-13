<?php 

    require_once '../../db_connect.php';
    if(isset($_POST["userName"])){
        $userName = $_POST["userName"];
        $query = $PDO->prepare('SELECT tk_id FROM tai_khoan WHERE tk_ten =:ten');
        $result = $query->execute([
            "ten" => $userName
        ]);
        $row = $query->rowCount();
        if ($row > 0) {

            $res = array("status" => "success");
        } else {
            $res = array("status" => "error");
        }
        echo json_encode($res);
    }
    if(isset($_POST["userContact"])){
        $userContact = $_POST["userContact"];
        $query = $PDO->prepare('SELECT tk_id FROM tai_khoan WHERE tk_sodienthoai =:ten');
        $result = $query->execute([
            "ten" => $userContact
        ]);
        $row = $query->rowCount();
        if ($row > 0) {

            $res = array("status" => "success");
        } else {
            $res = array("status" => "error");
        }
        echo json_encode($res);
    }
    
    
?> 
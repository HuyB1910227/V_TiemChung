<?php

use TC\OBS\TinTuc;

    require '../db_connect.php';
 

    $today = date('Y-m-d');
    $today = strtotime($today);
    $cn = new TinTuc($PDO);
    // $arrcn = $cn->all();
    if(isset($_GET["id"])){
        $cn->find($_GET["id"]);
    }
    else{
        header("location: index.php");
    }

  
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/layouts/meta.php'; ?>
    <title>Quản lý cơ sở tiêm</title>
    <?php include_once __DIR__ . '/layouts/styles.php'; ?>
    <title>V_Tiêm chủng</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <style>
        body {
            font-family: roboto;

        }

        .purple-square-container {
            height: 80%;
            display: flex;
            align-items: center;

        }

        .phone {
            border: 3px solid orange;
            background-color: #fab861;
            color: white;
        }

        h3.title {
            color: #616AC6;
            text-transform: uppercase;
            font-weight: bolder;
            text-align: center;
        }

        a.banquyen {
            text-decoration: none;
            color: grey;
            font-size: 1.1rem;
        }

        a.banquyen:hover {
            text-decoration: none;
            color: #616AC6;

        }
    </style>
</head>

<body class="container-fluid">
    <header class="row bg-light">
        <div class="container-lg">
            <nav class="navbar navbar-expand-md navbar-light bg-light row">
                <a class="navbar-brand" href="#">V-Tiêm chủng</a>
                <a class="btn rounded-pill ml-auto phone" href="tel:0932988029"><i class="fa-solid fa-phone"></i> 0932-988-029</a>

            </nav>
        </div>

    </header>

    <main class="row mt-2">

        <div class="container"> 
            <img src="../assets/uploads/<?= $cn->hinhanh?>" alt="" class="w-100" height="500px"> <br>
            <?= $cn->noidung?>
        </div>
    </main>


    <?php include_once __DIR__ . '/layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/layouts/script.php'; ?>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
 
</body>

</html>
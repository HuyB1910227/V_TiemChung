

<?php 
   

    if(isset($_POST['btnLuuThayDoi'])){
        
        $kh->fill($_POST);

        // var_dump($kh);
        $kh->save();
        echo "<meta http-equiv='refresh' content='0'>";
    } 
?>



<?php 
   

    if(isset($_POST['txtHoTen'])){
        
        $kh->fill($_POST);

        // var_dump($kh);
        $kh->save();
        $user->changeFullName($kh->hoten);
       echo "<meta http-equiv='refresh' content='0'>";
    } 
?>

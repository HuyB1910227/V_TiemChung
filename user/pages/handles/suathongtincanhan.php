
<?php
if (isset($_POST['txtHoTen'])) {
    $kh->fill($_POST);
    $kh->save();
    $user->changeFullName($kh->hoten);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

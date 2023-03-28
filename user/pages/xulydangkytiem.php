<?php
    require_once '../../db_connect.php';
    use TC\OBS\LichHenTiem;
    $lich = new LichHenTiem($PDO);
    $arrlichhen= $lich->find($_GET["id"]);

    use TC\OBS\CoSoTiem;
    $coso = new CoSoTiem($PDO);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Đăng ký tiêm chủng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">
    
        <div class="container-lg">

            <div class="p-5">
                <form action="guidangky.php" id="dangkytiem" name="dangkytiem" method="post" id="frmDangKyTiem">
                    <nav class="nav nav-pills flex-column flex-sm-row">
                        <a class="flex-sm-fill text-sm-center nav-link active" data-toggle="list" href="#thongtincanhan" role="tab">1. Thông tin cá nhân</a>
                        <a class="flex-sm-fill text-sm-center nav-link disabled" data-toggle="list" href="#tiensutiem" role="tab">2. Tiền sử bệnh</a>
                        <a class="flex-sm-fill text-sm-center nav-link disabled" data-toggle="list" href="#phieudongy" role="tab">3. Phiếu đồng ý</a>
                    </nav>
                    <hr>

                    <div class="tab-content">
                        <div class="tab-pane active" id="thongtincanhan" role="tabpanel">
                        <h6 class="text-danger">Vui lòng kiểm tra thông tin cá nhân! Nếu chưa chính xác, chọn "Chỉnh sửa thông tin cá nhân".</h6>

                            <input hidden type="text" name="khachHangID" value="<?= $kh->layID()?>" readonly>
                            <input hidden type="text" name="lichHenTiemID" value="<?= $lich->getId()?>" readonly>
                            <div class="form-group">
                                <label for="txtHoTen">Họ và tên </label>
                                <input type="text" name="txtHoTen" id="txtHoTen" placeholder="" class="form-control" value="<?= $kh->hoten ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="dtNgaySinh">Ngày sinh </label>
                                <input type="date" name="dtNgaySinh" id="dtNgaySinh" placeholder="" value="<?= $kh->ngaysinh ?>" class="form-control" disabled>
                            </div>
                            <legend class="col-form-label">Giới tính </legend>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="rdGioiTinh" id="rdGioiTinh1" value="0" <?php if($kh->gioitinh == 0){echo "checked";}?> class="form-check-input" disabled>
                                <label for="rdGioiTinh1" class="form-check-label">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="rdGioiTinh" id="rdGioiTinh2" value="1" class="form-check-input" disabled <?php if($kh->gioitinh == 1){echo "checked";}?>>
                                <label for="rdGioiTinh2" class="form-check-label">Nữ </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="rdGioiTinh" id="rdGioiTinh0" value="2" class="form-check-input" disabled <?php if($kh->gioitinh == 2){echo "checked";}?>>
                                <label for="rdGioiTinh0" class="form-check-label">Khác</label>
                            </div>
                            <div class="form-group">
                                <label for="txtCCCD">Số hộ chiếu/CMND/CCCD </label>
                                <input type="text" name="txtCCCD" id="txtCCCD" placeholder="" class="form-control" value="<?= $kh->cmnd ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="txtBHYT">Số thẻ BHYT </label>
                                <input type="text" name="txtBHYT" id="txtBHYT" placeholder="" class="form-control" value="<?= $kh->baohiem ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="txtDiaChi">Địa chỉ </label>
                                <input type="text" name="txtDiaChi" id="txtDiaChi" placeholder="" class="form-control" value="<?= $kh->diachi.', '.$kh->phuong.', '.$kh->quan.', '.$kh->tinh?>" disabled>
                            </div>
                            <a href="thongtincanhan.php">Chỉnh sửa thông tin cá nhân</a>
                            <hr>
                            <div class="form-group">
                                <label for="dtLichHen">Lịch hẹn </label>
                                <input type="date" name="dtLichHen" id="dtLichHen" placeholder="" class="form-control" value="<?= $lich->ngaytiem?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="txtDiaChi">Cơ sở tiêm </label>
                                <input type="text" name="txtCoSo" id="txtCoSo" placeholder="" class="form-control" value="<?= $coso->find($lich->cs_id)->ten ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="txtDiaChi">Địa chỉ cơ sở </label>
                                <input type="text" name="txtCoSo" id="txtCoSo" placeholder="" class="form-control" value="<?= $coso->find($lich->cs_id)->diachi.", ".$coso->find($lich->cs_id)->phuong.", ".$coso->find($lich->cs_id)->quan.", ".$coso->find($lich->cs_id)->tinh?>" disabled>
                            </div>
                            
                            <hr>

                            <a class="btn btn-light rounded-circle border border-primary text-primary " type="button" id="btnPrev1" href="dangkytiemchung.php"><i class="fa-solid fa-arrow-left"></i></a>
                            <button class="btn btn-primary rounded-pill float-right w-50" type="button" id="btnNext1">Tiếp tục</button>
                        </div>
                        <div class="tab-pane" id="tiensutiem" role="tabpanel">
                        <h6 class="text-danger">Vui lòng chọn đầy đủ vào bảng tiền sử bệnh!</h6>
                            <table class="table table-bordered table-striped">
                                <tr class="bg-info text-center text-light">
                                    <th>Tiền sử</th>
                                    <th style="width: 100px">Không</th>
                                    <th style="width: 100px">Có</th>
                                    <th style="width: 100px">Không rõ</th>
                                </tr>
                                <tr>
                                    <td>1. Tiền sử phản vệ từ độ 2 trở lên</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh1" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh1" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh1" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2. Tiền sử bị COVID-19 trong vòng 6 tháng</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh2" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh2" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh2" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3. Tiền sử tiêm vắc xin trong vòng 14 ngày qua</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh3" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh3" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh3" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4. Tiền sử suy giảm miễn dịch, ung thư giai đoạn cuối, cắt lách, xơ gan,...</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh4" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh4" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh4" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5. Đang dùng thuốc ức chế miễn dịch, corticoid liều cao</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh5" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh5" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh5" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6. Bệnh cấp tính</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh6" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh6" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh6" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7. Tiền sử bệnh mãn tính, đang tiến triễn</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh7" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh7" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh7" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8. Tiền sử bệnh mạn tính đã điều trị ổn</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh8" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh8" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh8" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>9. Tiền sử rối loạn đông máu hoặc đang dùng thuốc chống đông máu</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh9" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh9" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh9" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>10. Tiền sử dị dứng với các dị nguyên khác</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh10" value="0" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh10" value="1" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" name="rdTienSuBenh10" value="3" class="form-check-input mx-auto">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <button class="btn btn-light rounded-circle border border-primary text-primary" type="button" id="btnPrev2"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="btn btn-primary rounded-pill float-right w-50" type="button" id="btnNext2">Tiếp tục</button>
                        </div>
                        <div class="tab-pane" id="phieudongy" role="tabpanel">
                            <table class="table">
                                <tr>
                                    <td>
                                        <p class="display-2 text-success"><i class="fa-solid fa-shield-virus"></i></p>
                                    </td>
                                    <td>Tiêm chủng vắc xin là biện pháp phòng chống dịch hiệu quả, tuy nhiên vắc xin
                                        phòng chống bệnh COVID-19 có thể không phòng được bệnh hoàn toàn. Người được
                                        tiêm chủng vắc xin phòng COVID-19 có thể phòng được bệnh hoặc giảm mức độ nặng
                                        nếu mắc bệnh. Tuy nhiên, sau khi tiêm chủng vẫn phải tiếp tục thực hiện nghiêm
                                        các biện pháp phòng chóng dịch theo quy định</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="display-2 text-warning"><i class="fa-solid fa-syringe"></i></p>
                                    </td>
                                    <td>Tiêm chủng vắc xin phòng COVID-19 có thể gây ra một số hiện tượng bất thường về
                                        sức khỏe như các biểu hiện tại chỗ tiêm hoặc toàn thân, bao gồm phản ứng thông
                                        thường sau tiêm chủng và tai biến nặng sau tiêm chủng.</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="display-2 text-danger"><i class="fa-solid fa-truck-medical"></i></p>
                                    </td>
                                    <td>Khi có triệu chứng bất thường về sức khỏe, người được tiêm chủng cần đến ngay cơ
                                        sở y tế gần nhất để được tư vấn, thăm khám và điều trị kịp thời.</td>
                                </tr>
                                <tr>
                                    <td>Sau khi đọc các thông tin trên: </td>
                                    <td>
                                        <label class=""><input type="checkbox" name="chkDongYDKTiem" id="chkDongYDKTiem"> Đồng ý tiêm chủng và cam kết trong vòng 14 ngày qua
                                            chưa tiêm phòng, nếu sai tôi xin chịu trách nhiệm.</label>
                                    </td>
                                </tr>
                            </table>
                            <button class="btn btn-light rounded-circle border border-primary text-primary" type="button" id="btnPrev3"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="btn btn-primary rounded-pill float-right w-50" type="submit" id="btnSubmit">Hoàn thành đăng ký</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </main>





    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
    <script src="../../assets/frontend/js/ex-participateInVaccination.js"></script>
        
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
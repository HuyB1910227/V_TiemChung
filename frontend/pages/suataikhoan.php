<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Sửa tài khoản</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>

    <main class="row">

        <div class="container-lg ">
            <h3 class="titile">Sửa tài khoản</h3>
            <form action="" method="POST" id="signupForm" style="width: 500px; margin: auto">
                <div class="row ">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label for="txtTen">Tên đăng nhập <span class="required-fill-in">*</span></label>
                            <div class="input-group">

                                <input type="text" class="form-control" id="txtTen" name="txtTen" placeholder="Nhập vào tên đăng nhập...." value="<?= $user->ten ?>">


                            </div>
                            <div class="error-block mt-1">
                                <p id="error_tendangnhap"></p>
                            </div>


                        </div>

                        <div class="form-group">
                            <label for="txtSoDienThoai">Số điện thoại <span class="required-fill-in">*</span></label>
                            <div class="input-group">
                                <!-- <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        </div> -->
                                <input type="text" class="form-control" id="txtSoDienThoai" name="txtSoDienThoai" placeholder="Nhập vào số điện thoại...." value="<?= $user->sdt ?>">

                            </div>
                            <div class="error-block mt-1">
                                <p id="error_sdt"></p>
                            </div>

                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="doimatkhau" id="doimatkhau" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                                Đổi mật khẩu
                            </label>
                        </div>


                        <!-- <div class="form-group d-none">
                            <label for="pwd2">Mật khẩu hiện tại</label>
                            <div class="input-group">

                                <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Nhập vào mật khẩu....">
                            </div>
                            <div>
                                
                            </div>
                        </div> -->



                        <div class="form-group d-none">
                            <label for="npwd">Mật khẩu mới <span class="required-fill-in">*</span></label>
                            <div class="input-group">

                                <input type="password" class="form-control" id="npwd" name="npwd" placeholder="Nhập vào mật khẩu....">
                            </div>

                        </div>
                        <div class="form-group d-none">
                            <label for="npwd">Nhập lại mật khẩu <span class="required-fill-in">*</span></label>
                            <div class="input-group">

                                <input type="password" class="form-control" id="re_npwd" name="re_npwd" placeholder="Nhập vào mật khẩu....">
                            </div>

                        </div>
                        <hr>
                       


                    </div>
                </div>




                <!--  -->

                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-light rounded-circle border border-primary text-primary " href="trangchu.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary rounded-pill w-100 mt-2 " name="btnDangKy">Cập nhật</button>
                    </div>
                </div>





            </form>

        </div>

    </main>



    <?php


    if (isset($_POST["txtTen"])) {
        

        if (isset($_POST["doimatkhau"])) {
          
            if (isset($_POST['npwd']) && $_POST['npwd'] != '') {
                $user->fill($_POST, $kh->layId());
                $user->save();
                echo "<script>alert('Thay đổi thành công!');</script>";
                echo "<script>window.location.href = 'trangchu.php';</script>";
            }
           
        } else {
            $user->fill($_POST, $kh->layId());
            $user->save();
            echo "<script>window.location.href = 'trangchu.php';</script>";
        }
    }





    ?>









    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>



    <?php include_once __DIR__ . '/../layouts/script.php'; ?>

    <script>
        $(document).ready(function() {

            $('#doimatkhau').on("change", function() {
                if ($(this).is(":checked")) {
                    console.log("có");

                    console.log($('#pwd'));
                    $('#pwd2').parents("div.form-group").removeClass("d-none");

                    $('#npwd').parents("div.form-group").removeClass("d-none");
                    $('#re_npwd').parents("div.form-group").removeClass("d-none");


                } else {
                    console.log("ko");
                    $('#pwd2').val(null);
                    $('#npwd').val(null);
                    $('#re_npwd').val(null);
                    $('#pwd2').parents("div.form-group").addClass("d-none");

                    $('#npwd').parents("div.form-group").addClass("d-none");
                    $('#re_npwd').parents("div.form-group").addClass("d-none");
                }
            });

            $('#txtTen').on("keyup", function() {
                var userName = $(this).val();

                // console.log(userName)
                if (userName != '<?= $user->ten ?>') {
                    $.ajax({
                        url: 'scriptObject.php',
                        type: 'POST',
                        // dataType: 'json',
                        data: {
                            'userName': userName
                        },
                        success: function(response) {
                            var json = $.parseJSON(response);
                            if (json.status == 'error')
                                $('#error_tendangnhap').text("");
                            else if (json.status == 'success') {

                                $('#error_tendangnhap').show().text("Tên đăng nhập đã được sử dụng!");

                            }

                        }
                    });
                }


            });

            $('#txtSoDienThoai').on("keyup", function() {
                var userContact = $(this).val();
                if (userContact.toString() != '<?= $user->sdt ?>') {
                    console.log(userContact)
                    $.ajax({
                        url: 'scriptObject.php',
                        type: 'POST',
                        // dataType: 'json',
                        data: {
                            'userContact': userContact
                        },
                        success: function(response) {
                            var json = $.parseJSON(response);
                            if (json.status == 'error')
                                $('#error_sdt').hide();
                            else if (json.status == 'success') {

                                $('#error_sdt').show().text("Số điện thoại đã được sử dụng!");

                            }

                        }
                    });
                }


            });

            $('#signupForm').validate({
                rules: {
                    txtTen: {
                        required: true,
                        minlength: 8
                    },

                    txtSoDienThoai: {
                        required: true,
                        rangelength: [10, 10],
                        number: true
                    },


                    npwd: {
                        
                        minlength: 8
                    },
                    re_npwd: {
                       
                        minlength: 8,
                        equalTo: "#npwd"
                    },

                },
                messages: {
                    txtTen: {
                        required: "Bạn chưa nhập vào tên đăng nhập",
                        minlength: "Tên đăng nhập phải có ít nhất 8 ký tự!"
                    },

                    txtSoDienThoai: {
                        required: "Bạn chưa nhập vào số điện thoại",
                        rangelength: "Tên đăng nhập phải có 10 ký tự số!",
                        number: "Số điện thoại sai định dạng"
                    },

                    pwd: {
                        // required: "Bạn chưa nhập mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 8 ký tự!",
                    },
                    re_pwd: {
                        // required: "Bạn chưa nhập mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 8 ký tự!",
                        equalTo: "Mật khẩu không trùng khớp với mật khẩu vừa nhập!"
                    },

                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    if (element.prop("name") === "rdGioiTinh") {
                        error.insertAfter(element.parent("div").siblings("label.gioitinh"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });



        });
    </script>
</body>

</html>

$(document).ready(function () {

    $('#frmQLCS').validate({
        rules: {
            txtTenCoSo: {
                required: true,

            },

            txtTinh: {
                required: true
            },
            txtQuan: {
                required: true
            },
            txtPhuong: {
                required: true
            },
            txtDiaChi: {
                required: true
            },
            slTrangThai: {
                required: true
            }
        },
        messages: {
            txtTenCoSo: {
                required: "Bạn chưa nhập vào tên cơ sở",

            },



            txtTinh: {
                required: "Bạn chưa nhập Tỉnh hoặc Thành Phố",
            },
            txtQuan: {
                required: "Bạn chưa nhập Quận hoặc Huyện",
            },
            txtPhuong: {
                required: "Bạn chưa nhập Phường hoặc Xã",
            },
            txtDiaChi: {
                required: "Bạn chưa nhập địa chỉ",
            },


        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            if (element.prop("name") === "rdGioiTinh") {
                error.insertAfter(element.parent("div").siblings("label.gioitinh"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
})

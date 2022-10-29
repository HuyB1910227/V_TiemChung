
$(document).ready(function () {

    $('#frmQLVC').validate({
        rules: {
            txtTenVaccine: {
                required: true,

            },

            txtHieuLuc: {
                required: true
            },
            slLoaiVaccine: {
                required: true
            },
            
        },
        messages: {
            txtTenVaccine: {
                required: "Bạn chưa nhập vào tên vắc xin",

            },



            txtHieuLuc: {
                required: "Bạn chưa nhập hiệu lực",
            },
            slLoaiVaccine: {
                required: "Chọn loại vắc xin",
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


$(document).ready(function () {
    $.validator.addMethod("minVaccineDate", function(value) {
        var today = new Date();
        var cdate = new Date(value);
        var age = today.getFullYear() - cdate.getFullYear();

        if (age < 0) {
            return true;
        }

        var m = today.getMonth() - cdate.getMonth();

        if (m < 0 || (m === 0 && today.getDate() <= cdate.getDate())) {
            return true;
        }
        return false;
        
    }, "Ngày tiêm không hợp lệ");
    $('#frmQLLT').validate({
        rules: {
            dtNgayHenTiem: {
                required: true,
                minVaccineDate: true

            },

           
            slCoSo: {
                required: true
            },
            
        },
        messages: {
            dtNgayHenTiem: {
                required: "Bạn chưa chọn ngày tiêm",

            },



            slCoSo: {
                required: "Bạn chưa chọn cơ sở",
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

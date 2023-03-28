
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

    const tp = $('#txtTinh')
    const qh = $('#txtQuan')
    const px = $('#txtPhuong')

    $.getJSON(`https://provinces.open-api.vn/api/?depth=3`, function (data) {
        console.log(data);
        $.each(data, function (index, elementType) {
            
            tp.append(`<option value="${elementType.name}">${elementType.name}</option>`);
            
        })


        if(tp.val() !== ""){
            var indexTP
            var arrQH
            var tenPX
            var indexQH
            var arrPX
            indexTP = data.indexOf(data.find((data) => data.name === tp.val()))
            console.log(indexTP)
            arrQH = data[indexTP].districts
            $.each(arrQH, function (index, elementQH) {
                qh.append(`<option value="${elementQH.name}">${elementQH.name}</option>`);
            })
            indexQH = arrQH.indexOf(arrQH.find((arrQH) => arrQH.name === qh.val()))

            arrPX = arrQH[indexQH].wards
            $.each(arrPX, function (index, elementPX) {
                px.append(`<option value="${elementPX.name}">${elementPX.name}</option>`);
            })

            tp.on("change", function () {
              
                qh.find('option').remove().end().append('<option value="">--Chọn--</option>')
                px.find('option').remove().end().append('<option value="">--Chọn--</option>')
                var tenTP = $(this).val()
                indexTP = data.indexOf(data.find((data) => data.name === tenTP))
                console.log(indexTP)
                arrQH = data[indexTP].districts
                $.each(arrQH, function (index, elementQH) {
                   
                    qh.append(`<option value="${elementQH.name}">${elementQH.name}</option>`);
                 

                })

            })
            qh.on("change", function () {
                px.find('option').remove().end().append('<option value="">--Chọn--</option>')
                tenPX = $(this).val()
                indexQH = arrQH.indexOf(arrQH.find((arrQH) => arrQH.name === tenPX))
                
                arrPX = arrQH[indexQH].wards
                $.each(arrPX, function (index, elementPX) {
                    px.append(`<option value="${elementPX.name}">${elementPX.name}</option>`);
                })
            })
        } else {
            var indexTP
            var arrQH

            tp.on("change", function () {
                
                qh.find('option').remove().end().append('<option value="">--Chọn--</option>')
                px.find('option').remove().end().append('<option value="">--Chọn--</option>')
                var tenTP = $(this).val()
                indexTP = data.indexOf(data.find((data) => data.name === tenTP))
                console.log(indexTP)
                arrQH = data[indexTP].districts
                $.each(arrQH, function (index, elementQH) {
                    var quanhuyen = elementQH.name
                    qh.append(`<option value="${elementQH.name}">${elementQH.name}</option>`);
                    

                })

            })
            qh.on("change", function () {
                px.find('option').remove().end().append('<option value="">--Chọn--</option>')
                var tenPX = $(this).val()
                var indexQH = arrQH.indexOf(arrQH.find((arrQH) => arrQH.name === tenPX))
                console.log(indexQH)
                var arrPX = arrQH[indexQH].wards
                $.each(arrPX, function (index, elementPX) {
                    px.append(`<option value="${elementPX.name}">${elementPX.name}</option>`);
                })
            })

        }




        

    }).fail(function (error) {

    });
})

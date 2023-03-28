$(document).ready(function() {
    const btnXN = $('#btnXN');
    const frmXNA = $('#frmXNA');
    const btnXNA = $('#btnXNA');
    const inputFrmXNA = frmXNA.children('input');
    btnXN.on("click", function() {
        var pdk_id = $('.chkChonPDK');
        var listPDK = "";
        var i, j = 0;
        var n = 0;
        for (i = 0; i < pdk_id.length; i++) {
            if (pdk_id[i].checked) {
                ++n;
                listPDK += pdk_id[i].value + ",";
            }
        }
        inputFrmXNA.val(listPDK.slice(0, -1));

        if (inputFrmXNA.val() !== "") {
            Swal.fire({
                title: `Bạn có chắc chắn gửi xác nhận ${n} phiếu tiêm?`,
                text: "Sau khi đồng ý, trạng thái phiếu tiêm không thể hoàn tác!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý gửi!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    btnXNA.click();
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi...',
                text: 'Danh sách phiếu tiêm rỗng!',

            })
        }

    });



    $('.btnConfirm').on("click", function(e) {
        e.preventDefault();
        const form = $(this).closest('form');
        Swal.fire({
            title: 'Bạn có chắc chắn xác nhận?',
            text: "Sau khi đồng ý xác nhận, trạng thái phiếu tiêm không thể hoàn tác!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý ',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                form.trigger('submit');
            }
        })
    });

    $('.btnRefuse').on("click", function(e) {
        e.preventDefault();
        const form = $(this).closest('form');
        Swal.fire({
            title: 'Bạn có chắc chắn từ chối?',
            text: "Sau khi từ chối, trạng thái phiếu tiêm không thể hoàn tác!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f5ad42',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Từ chối',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                form.trigger('submit');
            }
        })
    });
    $('#tbDangKyTiem').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        },
    });
    var table = $('#tbDangKyTiem').DataTable();
    $(".searchField").on("keyup change", function() {
        var input = $(this);
        var colIndex = parseInt(input.attr("column"));
        table.column(colIndex).search(input.val()).draw();

    });
    
});
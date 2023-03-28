$(document).ready(function() {
    var btnTTST = $('.btnttst');
    const frmTrangThai = $('#lstID');
    btnTTST.on("click", function() {
        var lstID = $(this).data('lst_id');
        frmTrangThai.val(lstID);
    })

    $('#tbLichSuTiem').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        },
    });
});
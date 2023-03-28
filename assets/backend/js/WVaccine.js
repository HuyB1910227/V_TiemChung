$(document).ready(function() {
    $('#tbQuanLyTiem').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        },
    });
    var table = $('#tbQuanLyTiem').DataTable();
    $(".searchField").on("keyup change", function() {
        var input = $(this);
        var colIndex = parseInt(input.attr("column"));
        table.column(colIndex).search(input.val()).draw();

    });
});
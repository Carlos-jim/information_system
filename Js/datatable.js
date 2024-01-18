$(document).ready(function() {
    $('#datatable').DataTable({
        "lengthMenu": [25, 50, 100, 250, 500],
        "language": {
            "sEmptyTable": "No se encontraron resultados",
            "sInfo": "Mostrando _END_ de _TOTAL_ entidades",
            "sInfoEmpty": "Mostrando 0 resultados",
            "sInfoFiltered": "(filtrado de _MAX_ total de resultados)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Mostrar _MENU_ entidades",
            "sLoadingRecords": "Cargando...",
            "sProcessing": "Procesando...",
            "sSearch": "Buscar:",
            "sZeroRecords": "No se encontraron resultados",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
});

new DataTable('#example');
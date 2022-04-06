$(document).ready(function(){
  table=$('#tablaSala').DataTable({
    "ajax":{
      "url":"mostrar.php",
      "type":"POST"
    },"columns": [
      {"data":"n_serie"},
      {"data":"ip_address"},
      {"data":"tipo_entrega"},
      {"data":"perfil"},
      {"data":"adm_general"},
      {"data":"proveedor"}
    ],
    "oLanguage": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar<select>"+
                          "<option value='10'>10</option>"+
                          "<option value='25'>25</option>"+
                          "<option value='-1'>Todos</option>"+
                          "</select>registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Usuarios del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Usuarios del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "<<",
            "sLast":     ">>",
            "sNext":     ">",
            "sPrevious": "<"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    "dom": '<"botones3"B><"tablaMargen2"lfrtip>',
    "buttons": {
        "dom": {
          "button": {
            "tag": "button",
            "className": "waves-effect waves-light btn green darken-2 hoverable"
          }
        },
        "buttons": [{ 'extend': 'excel', 'text': 'Descarga Excel<i class="material-icons right">get_app</i>'}]
    }
  });
  setInterval( function () {
      table.ajax.reload( null, false );
  }, 5000 );
  $("select").val('10');
  $('select').formSelect();
  $('.modal').modal();
});

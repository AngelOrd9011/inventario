$(document).ready(function(){
  $.ajax({
    url:'modal.php',
    data:{infoEmpleado:true},
    type:'POST'
  }).done(function(data){
    $("#infoEmpleado").html(data);
    $('.modal').modal();
  });
  table=$('#tablaHome').DataTable({
    "ajax":{
      "url":"mostrar.php",
      "type":"POST"
    },"columns": [
      {"data":"n_empleado"},
      {"data":"RFC_8"},
      {"data":"nombre_s"},
      {"data":"puesto"},
      {"data":"adm_general"},
      {"data":"n_serie"},
      {"data":"ver"},
      {"data":"ip_address"},
      {"data":"perfil"},
      {"data":"tipo_entrega"},
      {"data":"proveedor"}
    ],
    "oLanguage": {
                  "sProcessing":     "Procesando...",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "sZeroRecords":    "No se encontraron resultados",
                  "sEmptyTable":     "Ningún dato disponible en esta tabla",
                  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
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
    "columnDefs": [ {
                        "targets": 6,
                        "orderable": false
                        },
                        {
                          "targets":7,
                          "visible":false
                        },
                        {
                          "targets":8,
                          "visible":false
                        },
                        {
                          "targets":9,
                          "visible":false
                        },
                        {
                          "targets":10,
                          "visible":false
                        }
                      ]
  });
  setInterval( function () {
    table.ajax.reload( null, false ); 
  }, 5000 );
  $("select").val('10');
  $('select').formSelect();
});

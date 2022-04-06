$(document).ready(function(){
  function confirma(id){
    data={'confirma':id}
    $.ajax({
      data: data,
      url:'elimina.php',
      type:'POST',
      success:function(response){
        if(response=="1"){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se ha eliminado el historial.',
            confirmButtonColor: '#4caf50'
          })
        }
        else{
          Swal.fire({
            icon: 'error',
            title: 'Hubo un problema!',
            text: 'No se ha podido eliminar el historial.',
            confirmButtonColor: '#f44336'
            })
        }
      }
    });
  }
  function eliminaAlert(id){
    Swal.fire({
      title: '¿Seguro que deseas eliminar el historial?',
      text: 'No podra recuperarse despues',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#f44336',
      cancelButtonColor: '#4caf50',
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        confirma(id);
      }
    })
  }
  $(document).on('click',".limpiar",function(){
    var id = $(this).attr('id');
    eliminaAlert(id);
  });
  table=$('#tablaHistorial').DataTable({
    "ajax":{
      "url":"mostrar.php",
      "type":"POST"
    },"columns": [
    {"data":"fch_hr",
            "render":function (data, type, row) {

          if (row.fch_hr) {
            return '<strong>'+row.fch_hr+'</strong>';
          }
        }
      },
    {"data":"rfc_8"},
    {"data":"nombre_s"},
    {"data":"equipo"},
    {"data":"new_equipo"},
    {"data":"evento",
            "render": function (data, type, row) {

        if (row.evento === 'Baja') {
          return '<strong class="red-text darken-1">'+row.evento+'</strong>';
        }
        else if (row.evento === 'Modificado') {
          return '<strong class="green-text">'+row.evento+'</strong>';
        }
        else {
          return '<strong class="green-text">'+row.evento+'</strong>';
        }
      }
    }
  ],
    "language": {
                  "sProcessing":     "Procesando...",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "sZeroRecords":    "No se encontraron resultados",
                  "sEmptyTable":     "No hay registros en el historial",
                  "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_",
                  "sInfoEmpty":      "Registros del 0 al 0 de un total de 0",
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
              "order": [[ 0, "desc" ]],
              "dom":"<'tablaMargen'lfrtip>"
  });
  setInterval( function () {
      table.ajax.reload( null, false );
  }, 5000 );
  $("select").val('10');
  $('.modal').modal();
  $("select").formSelect();
});

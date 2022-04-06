$(document).ready(function(){
  function confirma(id,rfc){
    data={'id':id,'rfc_8':rfc}
    $.ajax({
      data: data,
      url:'elimina.php',
      type:'POST',
      success:function(response){
        if(response=="1"){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se ha eliminado a el usuario.',
            confirmButtonColor: '#4caf50'
            })
        }
        else{
          Swal.fire({
            icon: 'error',
            title: 'Hubo un problema!',
            text: 'No se ha podido eliminar a el usuario.',
            confirmButtonColor: '#f44336'
            })
        }
      }
    });
  }
  function eliminaAlert(id,rfc){
    Swal.fire({
      title: 'RFC: ' + rfc,
      text: '¿Seguro que deseas eliminar a este usuario?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#f44336',
      cancelButtonColor: '#4caf50',
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        confirma(id,rfc);
      }
    })
  }
  $(document).on('click',".eliminar",function(){
    var id = $(this).attr('id');
    var rfc = $(this).attr('alt');
    eliminaAlert(id,rfc);
  });
  function agregarCSV(){
    Swal.fire({
      title: 'Selecciona un archivo CSV',
      showCancelButton: true,
      confirmButtonText: 'Subir',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#4caf50',
      cancelButtonColor: '#f44336',
      input: 'file',
    }).then((file) => {
        if (file.value) {
            var formData = new FormData();
            var file = $('.swal2-file')[0].files[0];
            formData.append("file", file);
            $.ajax({
                method: 'post',
                url: 'agregacsv.php',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json'
              }).done( function (response) {
                  var dataJSON = (response);                
                  data = JSON.parse(JSON.stringify(dataJSON));
                  Swal.fire({
                    icon: data.status,
                    title: data.title,
                    text: data.text
                  })
                }
            )
        }
    })
  }
  table=$('#tablaAdmin').DataTable({
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
      {"data":"administrar"},
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
      "columnDefs": [ {
        "width": "20%",
        "targets": 6,
        "orderable": false
    },
    {
      "targets":[7,8,9,10],
      "visible":false
    }],
    "dom": '<"botones2 botones3"B><"tablaMargen2"lfrtip>',
    "buttons": {
        "dom": {
          "button": {
            "tag": "button",
            "className": "waves-effect waves-light btn green darken-2 hoverable"
          }
        },
        "buttons": [
          { "text": 'Agregar usuario<i class="material-icons right">person_add</i>',"action": function () { window.location.href = '../add/'; } },
          { 'extend': 'excel', 'text': 'Descarga Excel<i class="material-icons right">get_app</i>','exportOptions':{'columns':[1,2,3,4,5,7,8,9,10]}},
          { "text": 'Agregar usuarios CSV<i class="material-icons right">file_upload</i>',"attr":{"id":'swal_upload'},"action": function () { agregarCSV(); } }
        ]
    }
  });
  setInterval( function () {
      table.ajax.reload( null, false );
  }, 5000 );
  $("select").val('10');
  $('select').formSelect();
  $('.modal').modal();
  $('.dropdown-trigger').dropdown();
  $.ajax({
    url:'modal.php',
    data:{infoEmpleado:true},
    type:'POST'
  }).done(function(data){
    $('#infoEmpleado').html(data);
    $('.modal').modal();
  });
});

$(document).ready(function(){
  function confirmaEliminadoProv(id){
    data={'proveedor':id}
    $.ajax({
      data: data,
      url:'elimina.php',
      type:'POST',
      success:function(response){
        if(response=="1"){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se ha eliminado el proveedor.',
            confirmButtonColor: '#4caf50'
            }).then(function () {
            location.reload();
          })
        }
        else{
          Swal.fire({
            icon: 'error',
            title: 'Hubo un problema!',
            text: 'No se ha podido eliminar el proveedor.',
            confirmButtonColor: '#f44336'
            }).then(function () {
            location.reload();
          })
        }
      }
    });
  }
  function eliminadoProv(id,num){
    Swal.fire({
      title: '¿Seguro que deseas eliminar este proveedor?',
      text: 'Si este proveedor es eliminado, '+num+' equipos se veran afectados',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#f44336',
      cancelButtonColor: '#4caf50',
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        confirmaEliminadoProv(id);
      }
    })
  }
  $(document).on('click',".eliminarProv",function(){
    var id = $(this).attr('alt');
    var num = $(this).attr('id');
    eliminadoProv(id,num);
  });
  function confirmaEliminado(id){
    data={'serie':id}
    $.ajax({
      data: data,
      url:'elimina.php',
      type:'POST',
      success:function(response){
        if(response=="1"){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se ha eliminado el equipo.',
            confirmButtonColor: '#4caf50'
            }).then(function () {
            table.ajax.reload();
          })
        }
        else{
          Swal.fire({
            icon: 'error',
            title: 'Hubo un problema!',
            text: 'No se ha podido eliminar el equipo.',
            confirmButtonColor: '#f44336'
            }).then(function () {
            location.reload();
          })
        }
      }
    });
  }
  function equipoEliminado(id){
    Swal.fire({
      title: id,
      text: '¿Seguro que deseas eliminar este equipo?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#f44336',
      cancelButtonColor: '#4caf50',
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        confirmaEliminado(id);
      }
    })
  }
  $(document).on('click',".eliminarEquipo",function(){
    var id = $(this).attr('alt');
    equipoEliminado(id);
  });
  function equipoAgregado(){
    $.ajax({
      data: $("#formAgregar").serialize(),
      url:'agrega.php',
      type:'POST',
      success:function(response){
        if(response=="1"){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se ha agregado un nuevo equipo.',
            confirmButtonColor: '#4caf50'
            }).then(function () {
              location.reload();
          })
        }
        else{
          M.toast({html: '<strong>Debes llenar ambos campos!</strong>', classes: 'rounded red darken-2 white-text', displayLength: 1000})
        }
      }
    });
  }
  $(document).on('click',".agregarEquipo",function(){
    equipoAgregado();
  });
  function proveedorAgregado(){
    $.ajax({
      data: $("#formAgregar2").serialize(),
      url:'agrega.php',
      type:'POST',
      success:function(response){
        if(response=='1'){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se ha agregado un nuevo proveedor.',
            confirmButtonColor: '#4caf50'
            }).then(function () {
              location.reload();
          })
        }
        else{
          M.toast({html: '<strong>No has ingresado el proveedor!</strong>', classes: 'rounded red darken-2 white-text', displayLength: 1000})
        }
      }
    });
  }
  $(document).on('click',".agregarProveedor",function(){
    proveedorAgregado();
  });
  $(document).on('click',".cancelModifica",function(){
    table.ajax.reload();
  });
  function equipoModificado(id){
    var data=$("#formModificar").serialize()+ "&id=" + id;
    $.ajax({
      data: data,
      url:'modifica.php',
      type:'POST',
      success:function(response){
        if(response=="1"){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se ha modificado el equipo.',
            confirmButtonColor: '#4caf50'
            }).then(function () {
            table.ajax.reload()
          })
        }
        else{
          M.toast({html: '<strong>Debes llenar ambos campos!</strong>', classes: 'rounded red darken-2 white-text', displayLength: 1000})
        }
      }
    });
  }
  $(document).on('click',".sendModifica",function(){
    var id = $(this).attr('alt');
    equipoModificado(id);
  });
  function provModificado(id){
    var data=$("#formModificarProv"+id).serialize()+ "&id=" + id;
    $.ajax({
      data: data,
      url:'modifica.php',
      type:'POST',
      success:function(response){
        if(response=="1"){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se ha actualizado el nombre del proveedor.',
            confirmButtonColor: '#4caf50'
            }).then(function () {
            location.reload();
          })
        }
        else{
          M.toast({html: '<strong>El nombre del proveedor no puede quedar vacio!</strong>', classes: 'rounded red darken-2 white-text', displayLength: 1000})
        }
      }
    });
  }
  $(document).on('click',".modificarProv",function(){
    var id = $(this).attr('alt');
    provModificado(id);
  });
  $(document).on('click',".modificarEquipo",function(){
    id = $(this).attr('id');
    serie = $(this).attr('alt');
    $(".editar").addClass("disabled");
    document.getElementById(id).innerHTML="<td colspan='3'>"
    +"<form id='formModificar'>"
      +"<div class='input-field col s3 green-text text-darken-2'>"
        +"<input value='"+serie+"' id='equipo' name='equipo' type='text' class='validaAlfanumerico' onkeyup='capital(this)' maxlength='15' autocomplete='off'>"
        +"<label class='active' for='equipo'>No. Serie del equipo</label>"
      +"</div>"
      +"<div class='input-field col s5 green-text text-darken-2'>"
        +"<select id='proveedor' name='proveedor'>"
        +"</select>"
        +"<label>Proveedores</label>"
      +"</div>"
      +"<div class='botones col s4'>"
        +"<a class='red darken-1 white-text hoverable btn cancelModifica'><i class='material-icons'>cancel</i></a>"
        +"<a alt='"+id+"'class='green darken-2 white-text btn hoverable sendModifica'><i class='material-icons'>send</i></a>"
      +"</div>"
    +"</form>"
    +"</td>";
    $.ajax({
      url:"select.php",
      data:{proveedor:true},
      type:'POST'
    }).done(function(data){
      $("#proveedor").html(data);
      $('select').formSelect();
    });
  });
  table =  $('#tablaEquipos').DataTable({
    "dom":"ftipr",
    "ajax":{
      "url":"mostrar.php",
      "type":"POST"
    },
    "rowId":"id_equipo",
    "columns":[
      {"data":"n_serie"},
      {"data":"proveedor"},
      {"data":"administrar"}
    ],
    "language": {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Equipos del _START_ al _END_ de un total de _TOTAL_",
          "sInfoEmpty":      "Equipos del 0 al 0 de un total de 0",
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
    "columnDefs": [
      {
        "targets": 2,
        "orderable": false
      }
    ]
});
  $("select").val('10');
  $('select').formSelect();
  $('.modal').modal();
  $('.collapsible').collapsible();
  $.ajax({
    url:"select.php",
    data:{proveedor:true},
    type:'POST'
  }).done(function(data){
    $("#proveedor").html(data);
    $('select').formSelect();
  }).done(function(){
    $.ajax({
      url:"select.php",
      data:{listaProveedores:true},
      type:'POST'
    }).done(function(data){
      $("#listaProveedores").html(data);
    });
  });
});

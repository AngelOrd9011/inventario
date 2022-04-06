$(document).ready(function(){
  $('.modal').modal();
  function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }
  var id = getParameterByName('id');
  $.ajax({
    url:'compruebaID.php',
    data:{'id':id},
    type:'POST',
    success:function(response){
      if(response=='error'){
        Swal.fire({
          icon: 'error',
          title: 'Hubo un problema!',
          text: 'Se recibio un ID invalido',
          confirmButtonColor: '#f44336'
          }).then(function () {
          window.location.href='../admin/';
        })
      }
      else{
        cargaUsuario(response);
      }
    }
  });

  function usuarioModificado(id){
    var data=$("#formUsuModifica").serialize()+ "&id=" + id;
    $.ajax({
      data: data,
      url:'modifica.php',
      type:'POST',
      success:function(response){
        if(response=="1"){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se han actualizado los datos del usuario.',
            confirmButtonColor: '#4caf50'
            }).then(function () {
            window.location.href='../admin/';
          })
        }
        else{
        	M.toast({html: response, classes: 'rounded red darken-2 white-text'})
        }
      }
    });
  }
  $(document).on('click',".modificarUsuario",function(){
    var id = getParameterByName('id');
    //alert($("#formUsuModifica").serialize()+ "&id=" + id);
    usuarioModificado(id);
  });
});
function cargaUsuario(id){
  $.ajax({
    url:'select.php',
    data:{'id':id,formUsuModifica:true},
    type:'POST',
    dataType:'json'
  }).done(function(data){
      $('#tituloRFC').append(data.titulo);
      $('input[name="nombre_s"]').val(data.nombre_s);
      $('input[name="a_pat"]').val(data.a_pat);
      $('input[name="a_mat"]').val(data.a_mat);
      $('input[name="n_empleado"]').val(data.n_empleado);
      $('input[name="rfc_8"]').val(data.rfc_8);
      $('input[name="ip_address"]').val(data.ip_address);
      $("#puesto").html(data.puesto);
      $("#adm_general").html(data.adm_general);
      $("#n_serie").html(data.n_serie);
      $("#perfil").html(data.perfil);
      $("#entrega").html(data.entrega);
      $('select').formSelect();
      M.updateTextFields();
  });
}

$(document).ready(function(){
  $('.modal').modal();
  function usuarioAgregado(){
    $.ajax({
      data: $("#formUsuario").serialize(),
      url:'agrega.php',
      type:'POST',
      success:function(response){
        if(response=="1"){
          Swal.fire({
            icon: 'success',
            title: 'Listo!',
            text: 'Se ha agregado un nuevo usuario.',
            confirmButtonColor: '#4caf50'
          }).then(function () {
            location.reload();
          })
        }
        else{
          M.toast({html: response, classes: 'rounded red darken-2 white-text', displayLength: 1000})
        }
      }
    });
  }
  $(document).on('click',".agregarUsuario",function(){
    usuarioAgregado();
  });
  $('#rfc_8').bind('focus',function(e) {
			M.toast({html: '<p>El RFC debe tener <strong>8 caracteres</strong>', classes: 'rounded grey lighten-1 red-text text-darken-4 alertas', displayLength: 2000})
	    e.preventDefault(); return false;
	});
  $.ajax({
    url:'select.php',
    data:{formUsuario:true},
    type:'POST',
    dataType:'json'
  }).done(function(data){
      $("#puesto").html(data.puesto);
      $("#adm_general").html(data.adm_general);
      $("#n_serie").html(data.n_serie);
      $("#perfil").html(data.perfil);
      $("#entrega").html(data.entrega);
      $('select').formSelect();
  });
});

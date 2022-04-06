$(document).ready(function() {
	$('#enviar').click(function(e){
		e.preventDefault();
		bandera=0;
		dato=document.getElementById("name").value;
		if(dato.length<=0 || dato=='Nombre'){
			bandera++;
			document.getElementById("name").focus();
			M.toast({html: '<p>Debes llenar el campo <strong>Administrador</strong>!</p>', classes: 'rounded red darken-2 white-text alertas'})
		}
		else{
			dato=document.getElementById("password").value;
			if(dato.length<=0 || dato=='Contraseña'){
				bandera++;
				document.getElementById("password").focus();
				M.toast({html: '<p>Debes llenar el campo <strong>Contraseña</strong>!</p>', classes: 'rounded red darken-2 white-text alertas'})
			}
		}
		if(bandera==0){
    		var formData = $("#login-form").serialize();
			$.ajax({
				data: formData,
				url: '../login.php',
				type: 'POST',
				success: function(response) {
					if(response=='error'){
						Swal.fire({
							icon: 'error',
							title: 'El administrador y/o la contraseña son incorrectos!',
							confirmButtonColor: '#f44336'
						})
					}
					else{
						window.location.href='../admin/';
        			}
        		}
  		  });
		}
	});
	function confirma(formData,id){
		data=formData+"&confirma="+"confirma"+"&id="+id;
		$.ajax({
		data: data,
        url:'../actualiza.php',
        type:'POST',
        success:function(response){
			if(response==2){
				Swal.fire({
				icon: 'success',
				title: 'Listo!',
				text: 'Es necesario volver a iniciar sesión.',
				confirmButtonColor: '#4caf50'
				}).then(function () {
				window.location.href='../close.php';
				})
			}
			else{
				Swal.fire({
				icon: 'error',
				title: 'Algo fallo!',
				text: response,
				confirmButtonColor: '#f44336'
				})
			}
		}
		});
	}
	$(document).on('click','.actualiza',function(){
		var formData = $("#formAdmin").serialize();
		var id = $(this).attr('id');
		$.ajax({
			data: formData+"&id="+id,
			url: '../actualiza.php',
			type: 'POST',
			success: function(response) {
				if(response==1){
					Swal.fire({
			    	title: 'Confirma',
			    	text: '¿Seguro deseas actualizar esta información?',
			    	icon: 'warning',
			        showCancelButton: true,
			        confirmButtonColor: '#4caf50',
			        cancelButtonColor: '#f44336',
			        confirmButtonText: 'Actualizar!',
			        cancelButtonText: 'Cancelar'
			    }).then((result) => {
			        if (result.value) {
							confirma(formData,id);
			        }
			    })
				}
				else{
					M.toast({html: response, classes: 'rounded red darken-2 white-text alertas'})
        }
    }
		});
	});
});
$('.validaAlfanumerico').keypress(function (tecla) {
    if ((tecla.charCode < 48 || tecla.charCode > 57)//Numeros
    && (tecla.charCode < 97 || tecla.charCode > 122)//letras mayusculas
    && (tecla.charCode < 65 || tecla.charCode > 90) //letras minusculas
		&& (tecla.charCode = 32)
    )return false;
});
$('.validaTexto').keypress(function (tecla) {
    if ((tecla.charCode < 97 || tecla.charCode > 122)//letras mayusculas
    && (tecla.charCode < 65 || tecla.charCode > 90) //letras minusculas
    && (tecla.charCode != 241) //ñ
     && (tecla.charCode != 209) //Ñ
     && (tecla.charCode != 32) //espacio
     && (tecla.charCode != 225) //á
     && (tecla.charCode != 233) //é
     && (tecla.charCode != 237) //í
     && (tecla.charCode != 243) //ó
     && (tecla.charCode != 250) //ú
     && (tecla.charCode != 193) //Á
     && (tecla.charCode != 201) //É
     && (tecla.charCode != 205) //Í
     && (tecla.charCode != 211) //Ó
     && (tecla.charCode != 218) //Ú
    )return false;
});
$('.validaIP').keypress(function (tecla) {
    if ((tecla.charCode < 48 || tecla.charCode > 57)//Numeros
    &&(tecla.charCode != 46)//punto
    )return false;
});
$('.validaNumero').keypress(function (tecla){
    if ((tecla.charCode < 48 || tecla.charCode > 57))return false;
});
$('.infoCopyPaste').bind('copy paste',function(e) {
		M.toast({html: '<strong>Esta accion no esta permitida</strong>', classes: 'rounded red darken-2 white-text', displayLength: 1000})
    e.preventDefault(); return false;
});
$('.infoCopy').bind('copy',function(e) {
		M.toast({html: '<strong>Para copiar esta información necesitas iniciar sesión!</strong>', classes: 'rounded red darken-2 white-text', displayLength: 2000})
    e.preventDefault(); return false;
});
$('.infoPaste').bind('paste',function(e) {
		M.toast({html: '<strong>Esta accion no esta permitida!</strong>', classes: 'rounded red darken-2 white-text', displayLength: 1000})
    e.preventDefault(); return false;
});
function capital(e) {
    e.value=e.value.toUpperCase();
};

function firstCapital(e) {
    var palabra = e.value;
	if(!e.value) return;
	var mayuscula = palabra.substring(0,1).toUpperCase();
	if (palabra.length > 0) {
    var minuscula = palabra.substring(1);
	}
    e.value = mayuscula.concat(minuscula);
}

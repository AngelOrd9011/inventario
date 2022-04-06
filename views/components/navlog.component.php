<?php session_start();
@$varsesion=$_SESSION['usu']['id'];
if($varsesion==null || $varsesion=''){
  echo "<script type='text/javascript'>
          Swal.fire({
            icon: 'error',
            title: 'Acceso denegado!',
            text: 'Necesitas iniciar sesión para ver este contenido',
            confirmButtonColor: '#f44336'
            }).then(function () {
            window.location.href='../home/';
          })
        </script>";
  die();
}
?>
<header>
  <div class="navbar-fixed">
    <nav class="nav nav-extended grey lighten-2">
      <div class="nav-wrapper container">
        <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/views/admin/">
          <img class="responsive-img imagen_logo" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/assets/images/Logo_HACIENDA_SAT.png">
        </a>
        <ul class="right grey-text text-darken-3">
          <li class="nombre">
            <a href="#adminModal" class="green-text text-darken-2 modal-trigger"><?php echo $_SESSION['usu']['nombre']; ?><i class="material-icons left">account_circle</i></a>
          </li>
          <li>
            <a href="../close.php" class="green darken-2 white-text btn hoverable">Salir</a>
          </li>
        </ul>
      </div>
      <div class="nav-content z-depth-2 pags">
        <ul class="tabs tabs-transparent">
          <li class="tab disabled"><a></a></li>
          <li class="tab"><a class="black-text hoverable" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/views/admin/">Inventario</a></li>
          <li class="tab"><a class="black-text hoverable" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/views/equipos">Equipos</a></li>
          <li class="tab"><a class="black-text hoverable" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/views/story">Historial</a></li>
          <li class="tab"><a class="black-text hoverable" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inventario/views/sala">Sala de Internet</a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>

<div id="adminModal" class="modal grey lighten-1 adminModal">
  <form id="formAdmin" method="post">
    <div class="modal-content green-text text-darken-2">
      <div class="nombre"><?php echo $_SESSION['usu']['nombre']; ?></div>
      <div class="z-depth-1 formMargen grey lighten-2">
        <div class="row">
          <div class="input-field col m12">
            <input id="nombre_admin" name="nombre_admin" type="text" class="validaTexto" onkeyup="firstCapital(this)" maxlength="50" autocomplete="off">
            <label for="nombre_admin">Nuevo nombre y apellido</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col m5">
            <input id="new_name" name="new_name" type="text" class="validaAlfanumerico infoCopyPaste" maxlength="12" autocomplete="off">
            <label for="new_name">Nuevo administrador</label>
          </div>
          <div class="input-field col m5 offset-m2">
            <input id="new_pass" name="new_pass" type="text" class="validaAlfanumerico infoCopyPaste" maxlength="12" autocomplete="off">
            <label for="new_pass">Nueva contraseña</label>
          </div>
        </div>
      </div>
      <div class="row z-depth-1 formMargen grey lighten-2">
          <div class="input-field col m6 offset-m3">
          <input id="current_pass" name="current_pass" type="password" class="validaAlfanumerico infoCopyPaste" maxlength="12" autocomplete="off">
          <label for="current_pass">Contraseña actual</label>
        </div>
      </div>
    </div>
    <div class="modal-footer flexbox grey lighten-1">
      <button type="reset" name="Cancelar" class="modal-close green darken-2 white-text btn">Cancelar</button>
      <button id='<?php echo $_SESSION['usu']['id']; ?>' type="button" name="ActualizaAdmin" class="green darken-2 white-text btn actualiza">Actualizar<i class="material-icons left">cached</i></button>
    </div>
  </form>
</div>

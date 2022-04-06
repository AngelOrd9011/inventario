<?php
include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
$id=0;
$reg=$objeto->empleados($id);
if (isset($_POST['infoEmpleado'])) {
  for($i=0;$i<count($reg);$i++){
    echo"
    <div id='modal".$reg[$i]['id_empleado']."' class='modal grey lighten-2'>
      <div class='modal-content col s5 tabla infoCopy'>
        <h5>".$reg[$i]['nombre_s']." ".$reg[$i]['a_pat']." ".$reg[$i]['a_mat']."</h5>
        <table class='highlight z-depth-3 grey lighten-2 formMargen'>
          <tbody>
            <tr>
              <td><p>Dirección IP:</p></td>
              <td><p>".$reg[$i]['ip_address']."</p></td>
            </tr>
            <tr>
              <td><p>Perfil:</p></td>
              <td><p>".$reg[$i]['perfil']."</p></td>
            </tr>
            <tr>
              <td><p>Tipo de entrega:</p></td>
              <td><p>".$reg[$i]['tipo_entrega']."</p></td>
            </tr>
            <tr>
              <td><p>Proveedor: </p></td>
              <td><p>".$reg[$i]["proveedor"]."</p></td>
            </tr>
          </tbody>
        </table>
      </div>
    <div class='modal-footer grey lighten-2 flexbox'>
      <a class='modal-close waves-effect waves-green btn-flat green darken-2 white-text'>Aceptar</a>
    </div>
  </div>";
  }
}


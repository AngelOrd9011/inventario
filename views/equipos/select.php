<?php
include('../../controllers/consultas.controller.php');
if(isset($_POST['proveedor'])){
  $objeto=new cConsulta();
  $reg=$objeto->proveedor();
  if($reg){
    echo "<option value='' disabled selected>Selecciona un proveedor</option>";
    for($i=0;$i<count($reg);$i++){
      echo "<option value='".$reg[$i][0]."'>".$reg[$i][1]."</option>";
    }
  }
}
if(isset($_POST['listaProveedores'])){
  $objeto=new cConsulta();
  $reg=$objeto->proveedor();
  for($i=0;$i<count($reg);$i++){
    echo"<li>
          <div class='collapsible-header grey lighten-1'><i class='material-icons'>arrow_drop_down</i>".$reg[$i][1]."<span class='new badge green darken-2' data-badge-caption='Equipo(s)'>".$reg[$i][2]."</span></div>
          <div class='collapsible-body'>
            <div class='row'>
              <form id='formModificarProv".$reg[$i][0]."' method='POST'>
                <div class='input-field col s6 green-text text-darken-2'>
                  <input value='".$reg[$i][1]."' id='proveedores' name='proveedores' type='text' class='validate validaAlfanumerico infoPaste' maxlength='15' autocomplete='off'>
                  <label class='active' for='proveedores'>Nuevo nombre</label>
                </div>
                <div class='col s6 botones'>
                  <a alt='".$reg[$i][0]."' class='green darken-2 white-text hoverable btn modificarProv'><i class='material-icons'>cached</i></a>
                  <a id='".$reg[$i][2]."' alt='".$reg[$i][0]."' class='red darken-1 white-text btn hoverable eliminarProv'><i class='material-icons'>delete</i></a>
                </div>
              </form>
            </div>
          </div>
        </li>";
  }
}


<?php
include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
if(isset($_POST['equipo']) && isset($_POST['proveedor']) && $_POST['equipo']!='' && $_POST['proveedor']!=''){
  $equipo = trim($_POST['equipo']);
  $proveedor = $_POST['proveedor'];
  $res=$objeto->insert_equipos($equipo,$proveedor);
  if($res){
    echo 1;
  }
  else {
    echo 0;
  }
}
elseif(isset($_POST['proveedorAdd']) && $_POST['proveedorAdd']!=''){
  $proveedor = trim($_POST['proveedorAdd']);
  $res=$objeto->insert_proveedor($proveedor);
  if($res){
    echo 1;
  }
  else {
    echo 0;
  }
}
else {
  echo 0;
}


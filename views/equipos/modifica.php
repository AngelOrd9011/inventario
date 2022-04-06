<?php
include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
if(isset($_POST['equipo']) && isset($_POST['proveedor']) && isset($_POST['id']) && $_POST['equipo']!='') {
  $id = $_POST['id'];
  $equipo = trim($_POST['equipo']);
  $proveedor = $_POST['proveedor'];
  $res=$objeto->update_equipos($id,$equipo,$proveedor);
  if($res){
    echo 1;
  }
  else {
    echo 0;
  }
}
elseif (isset($_POST['proveedores']) && isset($_POST['id']) && $_POST['proveedores']!=''){
  $id=$_POST['id'];
  $proveedor=trim($_POST['proveedores']);
  $res=$objeto->update_proveedor($id,$proveedor);
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


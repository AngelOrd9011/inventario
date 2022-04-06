<?php
include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
if(isset($_POST['serie'])){
  $equipo=$_POST['serie'];
  $res=$objeto->delete_equipos($equipo);
  if($res){
    echo 1;
  }
  else {
    echo 0;
  }
}
elseif(isset($_POST['proveedor'])) {
  $proveedor=$_POST['proveedor'];
  $res=$objeto->delete_proveedor($proveedor);
  if($res){
    echo 1;
  }
  else {
    echo 0;
  }
}
else{
  echo 0;
}


<?php
$id=$_POST['id'];
$rfc=$_POST['rfc_8'];
include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
$res=$objeto->delete_empleado($id,$rfc);
if($res){
  echo 1;
}
else {
  echo 0;
}


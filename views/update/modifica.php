<?php include('../../controllers/consultas.controller.php');
if(isset($_POST['nombre_s']) &&
isset($_POST['a_pat']) &&
isset($_POST['a_mat']) &&
isset($_POST['n_empleado']) &&
isset($_POST['rfc_8']) &&
isset($_POST['puesto']) &&
isset($_POST['adm_general']) &&
isset($_POST['ip_address']) &&
isset($_POST['n_serie']) &&
isset($_POST['perfil']) &&
isset($_POST['entrega']) &&
isset($_POST['id']) &&
$_POST['nombre_s']!='' &&
$_POST['a_pat']!='' &&
$_POST['a_mat']!='' &&
$_POST['n_empleado']!='' &&
$_POST['rfc_8']!=''){
  $nombres=trim($_POST['nombre_s']);
  $aPat=trim($_POST['a_pat']);
  $aMat=trim($_POST['a_mat']);
  $nEmpleado=trim($_POST['n_empleado']);
  $rfc=trim($_POST['rfc_8']);
  $puesto=$_POST['puesto'];
  $admGnrl=$_POST['adm_general'];
  $ipAdd=trim($_POST['ip_address']);
  $nSerie=$_POST['n_serie'];
  $perfil=$_POST['perfil'];
  $tEngreta=$_POST['entrega'];
  $id=$_POST['id'];
  if(strlen($rfc)==8){
    //echo $nEmpleado." ".$rfc." ".$nombres." ".$aPat." ".$aMat." ".$puesto." ".$admGnrl." ".$ipAdd." ".$nSerie." ".$perfil." ".$tEngreta." ".$id;
    $objeto=new cConsulta();
    $res=$objeto->update_empleado($nEmpleado,$rfc,$nombres,$aPat,$aMat,$puesto,$admGnrl,$ipAdd,$nSerie,$perfil,$tEngreta,$id);
    if($res){
      echo 1;
    }
    else {
      echo 'Algo salio mal al intentar modificar los datos del usuario';
    }
  }
  else{
    echo "El RFC debe tener 8 caracteres.";
  }
}
else {
  echo 'Debes llenar todos los campos obligatorios.';
} 

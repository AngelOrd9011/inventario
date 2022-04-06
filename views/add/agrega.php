<?php include('../../controllers/consultas.controller.php');
if(isset($_POST['nombre_s']) && isset($_POST['a_pat']) && isset($_POST['a_mat']) && isset($_POST['n_empleado']) &&
isset($_POST['rfc_8']) && isset($_POST['ip_address'])){
  $nombres=trim($_POST['nombre_s']);
  $aPat=trim($_POST['a_pat']);
  $aMat=trim($_POST['a_mat']);
  $nEmpleado=trim($_POST['n_empleado']);
  $rfc=trim($_POST['rfc_8']);
  $ipAdd=trim($_POST['ip_address']);
  if(isset($_POST['puesto'])){$puesto=$_POST['puesto'];}else{$puesto=0;}
  if(isset($_POST['adm_general'])){$admGnrl=$_POST['adm_general'];}else{$admGnrl=0;}
  if(isset($_POST['n_serie'])){$nSerie=$_POST['n_serie'];}else{$nSerie=0;}
  if(isset($_POST['perfil'])){$perfil=$_POST['perfil'];}else{$perfil=0;}
  if(isset($_POST['entrega'])){$tEntrega=$_POST['entrega'];}else{$tEntrega=0;}
  if($nombres!='' && $aPat!='' && $aMat!='' && $nEmpleado!='' && $rfc!=''){
    if(strlen($rfc)==8){
      $objeto=new cConsulta();
      $res=$objeto->insert_empleado($nEmpleado,$rfc,$nombres,$aPat,$aMat,$puesto,$admGnrl,$ipAdd,$nSerie,$perfil,$tEntrega);
      if($res){
        echo 1;
      }
      else {
        echo 'Algo salio mal intentar agregar al usuario';
      }
    }
    else{
      echo "El RFC debe tener 8 caracteres.";
    }
  }
  else {
    echo 'Debes llenar todos los campos obligatorios.';
  }
}
else{
  echo 'Algo salio mal al enviar la informasión';
}


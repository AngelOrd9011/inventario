<?php
include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
if (isset($_POST['id'])) {
  $id=$_POST['id'];
  $reg=$objeto->empleados($id);
  $empleadoPDF="";
    for($i=0;$i<count($reg);$i++){
      $empleadoPDF.='[
                {"n_empleado":"'.$reg[$i]['n_empleado'].'"},
                {"RFC_8":"'.$reg[$i]['RFC_8'].'"},
                {"nombre_s":"'.$reg[$i]['nombre_s'].' '.$reg[$i]['a_pat'].' '.$reg[$i]['a_mat'].'"},
                {"puesto":"'.$reg[$i]['puesto'].'"},
                {"adm_general":"'.$reg[$i]['adm_general'].'"},
                {"n_serie":"'.$reg[$i]['n_serie'].'"},
                {"ip_address":"'.$reg[$i]['ip_address'].'"},
                {"perfil":"'.$reg[$i]['perfil'].'"},
                {"tipo_entrega":"'.$reg[$i]['tipo_entrega'].'"},
                {"proveedor":"'.$reg[$i]['proveedor'].'"}
              ]';

    }
    echo $empleadoPDF;;
}
else{
  echo "error";
}



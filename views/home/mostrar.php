<?php
header('Content-Type: application/json');

include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
$id=0;
$reg=$objeto->empleados($id);
$tabla="";
  for($i=0;$i<count($reg);$i++){
    $ver="<a class='modal-trigger btn green darken-2 white-text hoverable' href='#modal".$reg[$i]['id_empleado']."'><i class='material-icons'>visibility</i></a>";
    $tabla.='{
              "n_empleado":"'.$reg[$i]['n_empleado'].'",
              "RFC_8":"'.$reg[$i]['RFC_8'].'",
              "nombre_s":"'.$reg[$i]['nombre_s'].' '.$reg[$i]['a_pat'].' '.$reg[$i]['a_mat'].'",
              "puesto":"'.$reg[$i]['puesto'].'",
              "adm_general":"'.$reg[$i]['adm_general'].'",
              "n_serie":"'.$reg[$i]['n_serie'].'",
              "ver":"'.$ver.'",
              "ip_address":"'.$reg[$i]['ip_address'].'",
              "perfil":"'.$reg[$i]['perfil'].'",
              "tipo_entrega":"'.$reg[$i]['tipo_entrega'].'",
              "proveedor":"'.$reg[$i]['proveedor'].'"
            },';

  }
  $tabla=substr($tabla,0, strlen($tabla) -1);
  echo '{"data":['.$tabla.']}';



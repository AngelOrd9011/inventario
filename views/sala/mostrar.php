<?php
include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
$reg=$objeto->mostrar_sala();
$tabla="";
  for($i=0;$i<count($reg);$i++){
    $tabla.='{
              "n_serie":"'.$reg[$i]['n_serie'].'",
              "ip_address":"'.$reg[$i]['ip_address'].'",
              "tipo_entrega":"'.$reg[$i]['tipo_entrega'].'",
              "perfil":"'.$reg[$i]['perfil'].'",
              "adm_general":"'.$reg[$i]['adm_general'].'",
              "proveedor":"'.$reg[$i]['proveedor'].'"
            },';
  }
  $tabla=substr($tabla,0, strlen($tabla) -1);
  echo '{"data":['.$tabla.']}';


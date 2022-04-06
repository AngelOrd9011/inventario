<?php
include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
$reg=$objeto->historial();
$tabla="";
  for($i=0;$i<count($reg);$i++){
    $tabla.='{
              "fch_hr":"'.$reg[$i][1].'",
              "rfc_8":"'.$reg[$i][5].'",
              "nombre_s":"'.$reg[$i][6].'",
              "equipo":"'.$reg[$i][7].'",
              "new_equipo":"'.$reg[$i][8].'",
              "evento":"'.$reg[$i][2].'"
            },';
  }
  $tabla=substr($tabla,0, strlen($tabla) -1);
  echo '{"data":['.$tabla.']}';

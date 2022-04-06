<?php
include('../../controllers/consultas.controller.php');
$objeto=new cConsulta();
$reg=$objeto->equipos();
$tabla="";
  for($i=0;$i<count($reg);$i++){
    $editar="<a id='".$reg[$i][0]."' alt='".$reg[$i][1]."' class='green darken-2 white-text hoverable btn editar modificarEquipo'><i class='material-icons'>edit</i></a>";
    $eliminar="<a alt='".$reg[$i][1]."' class='red darken-1 white-text btn hoverable eliminarEquipo editar'><i class='material-icons'>delete</i></a>";
    $tabla.='{
              "id_equipo":"'.$reg[$i]['id_equipo'].'",
              "n_serie":"'.$reg[$i]['n_serie'].'",
              "proveedor":"'.$reg[$i]['proveedor'].'",
              "administrar":"'.$editar.' '.$eliminar.'"
            },';

  }
  $tabla=substr($tabla,0, strlen($tabla) -1);
  echo '{"data":['.$tabla.']}';



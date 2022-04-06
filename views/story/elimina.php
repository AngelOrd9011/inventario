<?php
  include('../../controllers/consultas.controller.php');
if(isset($_POST['confirma'])){
  $id=$_POST['confirma'];
  $objeto=new cConsulta();
  $res=$objeto->clear_historial();
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


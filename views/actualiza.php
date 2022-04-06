<?php
include('../controllers/login.controller.php');
if(isset($_POST['confirma']) &&
isset($_POST['nombre_admin']) &&
isset($_POST['new_name']) &&
isset($_POST['new_pass']) &&
isset($_POST['id']) &&
isset($_POST['current_pass'])){
  $confirma=$_POST['confirma'];
  $nom=trim($_POST['nombre_admin']);
  $n_name=$_POST['new_name'];
  $n_pass=$_POST['new_pass'];
  $id=$_POST['id'];
  $c_pass=$_POST['current_pass'];
  $objeto=new cLogin();
  $res=$objeto->actualiza($nom,$n_name,$n_pass,$id,$c_pass);
  if($res){
    echo 2;
  }
  else{
    echo 'La contraseña actual es incorrecta';
  }
}
elseif(isset($_POST['nombre_admin']) &&
isset($_POST['new_name']) &&
isset($_POST['new_pass']) &&
isset($_POST['id']) &&
isset($_POST['current_pass']) &&
$_POST['nombre_admin']!="" &&
$_POST['new_name']!="" &&
$_POST['new_pass']!="" &&
$_POST['id']!="" &&
$_POST['current_pass']!=""){
  if(strlen($_POST['new_pass'])>7){
      echo 1;
    }
    else{
      echo '<p>La nueva contraseña debe tener un minimo de <strong>8 digitos</strong>';
    }
}
else{
  echo "Para actualizar un Administrador debes llenar todos los campos";
}

 ?>

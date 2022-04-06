<?php
include('../../controllers/consultas.controller.php');
$objPuesto=new cConsulta();
$objAdm=new cConsulta();
$objEquipo=new cConsulta();
$objPerfil=new cConsulta();
$objEntrega=new cConsulta();
$resPuesto=$objPuesto->puesto();
$resAdm=$objAdm->adm_general();
$resEquipo=$objEquipo->disponibles();
$resPerfil=$objPerfil->perfiles();
$resEntrega=$objEntrega->entrega();
if (isset($_POST['formUsuario'])){
  if($resPuesto){
    $puesto="";
    $puesto.="<option value='0' disabled selected>Selecciona el puesto</option>";
    for($i=0;$i<count($resPuesto);$i++){
      $puesto.="<option value='".$resPuesto[$i][0]."'>".$resPuesto[$i][1]."</option>";
    }
    $puesto;
  }
  if($resAdm){
    $adm_general="";
    $adm_general.="<option value='0' disabled selected>Selecciona la administración</option>";
    for($i=0;$i<count($resAdm);$i++){
      $adm_general.="<option value='".$resAdm[$i][0]."'>".$resAdm[$i][1]."</option>";
    }
    $adm_general;
  }
  if($resEquipo){
    $equipo="";
    $equipo.="<option value='0' disabled selected>Selecciona un equipo</option>";
    for($i=0;$i<count($resEquipo);$i++){
      $equipo.="<option value='".$resEquipo[$i][0]."'>".$resEquipo[$i][1]."</option>";
    }
    $equipo;
  }
  elseif(!$resEquipo){
    $equipo="<option value='0' disabled>No hay equipos disponibles</option>";
  }
  if($resPerfil){
    $perfil="";
    $perfil.="<option value='0' disabled selected>Selecciona el perfil</option>";
    for($i=0;$i<count($resPerfil);$i++){
      $perfil.="<option value='".$resPerfil[$i][0]."'>".$resPerfil[$i][1]."</option>";
    }
    $perfil;
  }
  if($resEntrega){
    $entrega="";
    $entrega.="<option value='0' disabled selected>Selecciona el tipo de entrega</option>";
    for($i=0;$i<count($resEntrega);$i++){
      $entrega.="<option value='".$resEntrega[$i][0]."'>".$resEntrega[$i][1]."</option>";
    }
    $puesto;
  }
  $response = array('puesto' => $puesto,
                    'adm_general' => $adm_general,
                    'n_serie' => $equipo,
                    'perfil' => $perfil,
                    'entrega' => $entrega
                  );
  echo json_encode($response);

}


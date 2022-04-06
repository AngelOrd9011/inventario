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
if (isset($_POST['id']) && isset($_POST['formUsuModifica'])){
  $id=$_POST['id'];
  $objEmpleado=new cConsulta();
  $usu=$objEmpleado->empleados($id);
  if ($usu) {
    $titulo="<strong class='black-text'>".$usu[0]['RFC_8']."</strong>";
    $nombre_s=$usu[0]['nombre_s'];
    $a_pat=$usu[0]['a_pat'];
    $a_mat=$usu[0]['a_mat'];
    $n_empleado=$usu[0]['n_empleado'];
    $rfc=$usu[0]['RFC_8'];
    $ip_addresss=$usu[0]['ip_address'];
  }
  if($resPuesto){
    $puesto="";
    if($usu[0]['puesto']!=''){
      $puesto.="<option value='".$usu[0]['id_puesto']."' selected>".$usu[0]['puesto']."</option>";
    }
    $puesto.="<option value='0'>Ninguno</option>";
    for($i=0;$i<count($resPuesto);$i++){
      $puesto.="<option value='".$resPuesto[$i][0]."'>".$resPuesto[$i][1]."</option>";
    }
  }
  if($resAdm){
    $adm_general="";
    if($usu[0]['adm_general']!=''){
      $adm_general.="<option value='".$usu[0]['id_adm']."' selected>".$usu[0]['adm_general']."</option>";
    }
    $adm_general.="<option value='0'>Ninguna</option>";
    for($i=0;$i<count($resAdm);$i++){
      $adm_general.="<option value='".$resAdm[$i][0]."'>".$resAdm[$i][1]."</option>";
    }
  }
  if($resEquipo){
    $equipo="";
    if($usu[0]['n_serie']!=''){
      $equipo.="<option value='".$usu[0]['id_equipo']."' selected>".$usu[0]['n_serie']."</option>";
    }
    $equipo.="<option value='0'>Ninguno</option>";
    for($i=0;$i<count($resEquipo);$i++){
      $equipo.="<option value='".$resEquipo[$i][0]."'>".$resEquipo[$i][1]."</option>";
    }
  }
  if(!$resEquipo){
    $equipo="";
    if($usu[0]['n_serie']!=''){
      $equipo.="<option value='".$usu[0]['id_equipo']."' selected>".$usu[0]['n_serie']."</option>";
      $equipo.="<option value=''>Ninguno</option>";
    }
    else{
      $equipo="<option value='0' disabled>No hay equipos disponibles</option>";
    }
  }
  if($resPerfil){
    $perfil="";
    if($usu[0]['perfil']!=''){
      $perfil.="<option value='".$usu[0]['id_perfil']."' selected>".$usu[0]['perfil']."</option>";
    }
    $perfil.="<option value='0'>Ninguno</option>";
    for($i=0;$i<count($resPerfil);$i++){
      $perfil.="<option value='".$resPerfil[$i][0]."'>".$resPerfil[$i][1]."</option>";
    }
  }
  if($resEntrega){
    $entrega="";
    if($usu[0]['tipo_entrega']!=''){
      $entrega.="<option value='".$usu[0]['id_entrega']."' selected>".$usu[0]['tipo_entrega']."</option>";
    }
    $entrega.="<option value='0'>Ninguna</option>";
    for($i=0;$i<count($resEntrega);$i++){
      $entrega.="<option value='".$resEntrega[$i][0]."'>".$resEntrega[$i][1]."</option>";
    }
  }
  $response = array('titulo' => $titulo,
                    'nombre_s' => $nombre_s,
                    'a_pat' => $a_pat,
                    'a_mat' => $a_mat,
                    'n_empleado' => $n_empleado,
                    'rfc_8' => $rfc,
                    'ip_address' => $ip_addresss,
                    'puesto' => $puesto,
                    'adm_general' => $adm_general,
                    'n_serie' => $equipo,
                    'perfil' => $perfil,
                    'entrega' => $entrega
                  );
  echo json_encode($response);
}


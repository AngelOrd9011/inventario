<?php
include 'conexion.model.php';
Class mConsulta {
  public function mostrarEquipos(){
    $sql="SELECT id_equipo,n_serie,proveedor
          FROM equipos eq
          LEFT JOIN proveedores pr ON(eq.id_proveedor=pr.id_proveedor)";
    $res=mysqli_query(conexion::con(),$sql);
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
  public function mostrarempleados($id){
    $sql="SELECT em.*, pu.puesto, adm.adm_general, eq.n_serie, pe.perfil, en.tipo_entrega, pr.proveedor
          FROM empleado em
          LEFT JOIN puestos pu ON ( em.id_puesto = pu.id_puesto )
          LEFT JOIN equipos eq ON ( em.id_equipo = eq.id_equipo )
          LEFT JOIN perfiles pe ON ( em.id_perfil = pe.id_perfil )
          LEFT JOIN entrega en ON ( em.id_entrega = en.id_entrega )
          LEFT JOIN proveedores pr ON ( eq.id_proveedor = pr.id_proveedor )
          LEFT JOIN adm_general adm ON ( em.id_adm = adm.id_adm )";
        if ($id!=0) {
            $sql2=$sql."WHERE id_empleado=$id";
            $res=mysqli_query(conexion::con(),$sql2);
        }
        else{
          $res=mysqli_query(conexion::con(),$sql);
        }
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
  public function mostrarProveedor(){
    $sql="SELECT pr.id_proveedor, pr.proveedor, count( eq.id_proveedor ) AS equipos_por_proveedor
          FROM proveedores pr LEFT JOIN equipos eq
          ON (eq.id_proveedor=pr.id_proveedor)
          GROUP BY pr.id_proveedor";
    $res=mysqli_query(conexion::con(),$sql);
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
  public function insertarEquipo($equipo,$proveedor){
    $sql = "INSERT INTO equipos (n_serie,id_proveedor,asignacion) VALUES('$equipo','$proveedor',0)";
    $res=mysqli_query(conexion::con(),$sql);
    return @$res;
  }
  public function eliminarEquipo($equipo){
      $sql = "DELETE FROM equipos WHERE n_serie='$equipo'
              order by id_equipo desc
              limit 1";
      $res=mysqli_query(conexion::con(),$sql);
      return @$res;
  }
  public function modificaEquipo($id,$equipo,$proveedor){
    $sql="UPDATE equipos
          SET n_serie='$equipo',id_proveedor=$proveedor
          WHERE id_equipo=$id";
    $res=mysqli_query(conexion::con(),$sql);
    return @$res;
  }
  public function insertarProveedor($proveedores){
    $sql="INSERT INTO proveedores(proveedor) VALUES('$proveedores')";
    $res=mysqli_query(conexion::con(),$sql);
    return @$res;
  }
  public function mostrarPuestos(){
    $sql="SELECT * FROM puestos
          ORDER BY puesto";
    $res=mysqli_query(conexion::con(),$sql);
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
  public function mostrarAdm(){
    $sql="SELECT * FROM adm_general";
    $res=mysqli_query(conexion::con(),$sql);
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
  public function equiposDisponibles(){
    $sql="SELECT * FROM equipos WHERE asignacion=0
          ORDER BY n_serie";
    $res=mysqli_query(conexion::con(),$sql);
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
  public function mostrarPerfiles(){
    $sql="SELECT * FROM perfiles
          ORDER BY perfil";
    $res=mysqli_query(conexion::con(),$sql);
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
  public function mostrarEntrega(){
    $sql="SELECT * FROM entrega
          ORDER BY tipo_entrega";
    $res=mysqli_query(conexion::con(),$sql);
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
  public function insertarEmpleado($nEmpleado,$rfc,$nombres,$aPat,$aMat,$puesto,$admGnrl,$ipAdd,$nSerie,$perfil,$tEngreta){
    $sql="INSERT INTO empleado(n_empleado,rfc_8,nombre_s,a_pat,a_mat,id_puesto,id_adm,ip_address,id_equipo,id_perfil,id_entrega)
          VALUES('$nEmpleado','$rfc','$nombres','$aPat','$aMat',$puesto,$admGnrl,'$ipAdd',$nSerie,$perfil,$tEngreta)";
    $res=mysqli_query(conexion::con(),$sql);
    if($res){
      $sql2="UPDATE equipos set asignacion=1 WHERE id_equipo=$nSerie";
      $res2=mysqli_query(conexion::con(),$sql2);
    }
    return @$res;
  }
  public function eliminaEmpleado($id,$rfc){
    $sql = "DELETE FROM empleado
            WHERE id_empleado=$id AND rfc_8='$rfc'";
    $res=mysqli_query(conexion::con(),$sql);
    if($res){
      $sql2="UPDATE equipos eq
            LEFT JOIN empleado em
            ON eq.id_equipo = em.id_equipo
            SET asignacion = 0
            WHERE em.id_equipo IS NULL";
      $res2=mysqli_query(conexion::con(),$sql2);
    }
    return @$res;
  }
  public function eliminaProveedor($proveedor){
      $sql = "DELETE FROM proveedores WHERE id_proveedor=$proveedor
              order by id_proveedor desc
              limit 1";
      $res=mysqli_query(conexion::con(),$sql);
      return @$res;
  }
  public function modificaProveedor($id,$proveedor){
      $sql="UPDATE proveedores
            SET proveedor='$proveedor'
            WHERE id_proveedor=$id";
      $res=mysqli_query(conexion::con(),$sql);
      return @$res;
  }
  public function modificaEmpleado($nEmpleado,$rfc,$nombres,$aPat,$aMat,$puesto,$admGnrl,$ipAdd,$nSerie,$perfil,$tEngreta,$id){
    $sql="UPDATE empleado SET
          n_empleado='$nEmpleado',RFC_8='$rfc',nombre_s='$nombres',a_pat='$aPat',a_mat='$aMat',id_puesto='$puesto',id_adm='$admGnrl',ip_address='$ipAdd',id_equipo='$nSerie',id_perfil='$perfil',id_entrega='$tEngreta'
          WHERE id_empleado=$id";
    $res=mysqli_query(conexion::con(),$sql);
    if($res){
      $sql2="UPDATE equipos set asignacion=1 WHERE id_equipo=$nSerie";
      $res2=mysqli_query(conexion::con(),$sql2);
      $sql2="UPDATE equipos eq
            LEFT JOIN empleado em
            ON eq.id_equipo = em.id_equipo
            SET asignacion = 0
            WHERE em.id_equipo IS NULL";
      $res2=mysqli_query(conexion::con(),$sql2);
    }
    return @$res;
  }
  public function mostrarHistorial(){
    $sql="SELECT hi.*,eq.n_serie, eq2.n_serie
          FROM historial hi
          LEFT JOIN equipos eq ON(hi.id_equipo = eq.id_equipo)
          LEFT JOIN equipos eq2 ON(hi.nid_equipo = eq2.id_equipo)";
    $res=mysqli_query(conexion::con(),$sql);
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
  public function limpiarHistorial(){
    $sql="DELETE FROM historial";
    $res=mysqli_query(conexion::con(),$sql);
    return @$res;
  }
  public function SalaDeInternet(){
    $sql="SELECT adm.adm_general, ip_address, eq.n_serie, pe.perfil, en.tipo_entrega, pr.proveedor
          FROM empleado em
          LEFT JOIN puestos pu ON ( em.id_puesto = pu.id_puesto )
          LEFT JOIN equipos eq ON ( em.id_equipo = eq.id_equipo )
          LEFT JOIN perfiles pe ON ( em.id_perfil = pe.id_perfil )
          LEFT JOIN entrega en ON ( em.id_entrega = en.id_entrega )
          LEFT JOIN proveedores pr ON ( eq.id_proveedor = pr.id_proveedor )
          LEFT JOIN adm_general adm ON ( em.id_adm = adm.id_adm )
          WHERE en.tipo_entrega='SALA DE INTERNET'";
    $res=mysqli_query(conexion::con(),$sql);
    while($row=$res->fetch_array()){
      $arreglo[]=$row;
    }
    return @$arreglo;
  }
}

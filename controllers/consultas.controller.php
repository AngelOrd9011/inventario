<?php include "../../models/consultas.model.php";
class cConsulta {
  public $objeto;

  public function __construct(){
    $this->objeto=new mConsulta();
  }
  public function equipos(){
    $mostrarEquipo=$this->objeto->mostrarEquipos();
    return $mostrarEquipo;
  }
  public function empleados($id){
    $mostrarEmpleado=$this->objeto->mostrarempleados($id);
    return $mostrarEmpleado;
  }
  public function proveedor(){
    $mostrarProveedor=$this->objeto->mostrarProveedor();
    return $mostrarProveedor;
  }
  public function insert_equipos($equipo,$proveedor){
    $insertarEquipo=$this->objeto->insertarEquipo($equipo,$proveedor);
    return $insertarEquipo;
  }
  public function delete_equipos($equipo){
    $eliminarEquipo=$this->objeto->eliminarEquipo($equipo);
    return $eliminarEquipo;
  }
  public function insert_proveedor($proveedores){
    $insertarProveedor=$this->objeto->insertarProveedor($proveedores);
    return $insertarProveedor;
  }
  public function puesto(){
    $mostrarPuesto=$this->objeto->mostrarPuestos();
    return $mostrarPuesto;
  }
  public function adm_general(){
    $mostrarAdm=$this->objeto->mostrarAdm();
    return $mostrarAdm;
  }
  public function disponibles(){
    $mostrarDisponibles=$this->objeto->equiposDisponibles();
    return $mostrarDisponibles;
  }
  public function perfiles(){
    $mostrarPerfiles=$this->objeto->mostrarPerfiles();
    return $mostrarPerfiles;
  }
  public function entrega(){
    $mostrarEntrega=$this->objeto->mostrarEntrega();
    return $mostrarEntrega;
  }
  public function insert_empleado($nEmpleado,$rfc,$nombres,$aPat,$aMat,$puesto,$admGnrl,$ipAdd,$nSerie,$perfil,$tEngreta){
    $insertarEmpleado=$this->objeto->insertarEmpleado($nEmpleado,$rfc,$nombres,$aPat,$aMat,$puesto,$admGnrl,$ipAdd,$nSerie,$perfil,$tEngreta);
    return $insertarEmpleado;
  }
  public function delete_empleado($id,$rfc){
    $eliminarEmpleado=$this->objeto->eliminaEmpleado($id,$rfc);
    return $eliminarEmpleado;
  }
  public function update_equipos($id,$equipo,$proveedor){
    $modificaEquipo=$this->objeto->modificaEquipo($id,$equipo,$proveedor);
    return $modificaEquipo;
  }
  public function delete_proveedor($proveedor){
    $eliminaProveedor=$this->objeto->eliminaProveedor($proveedor);
    return $eliminaProveedor;
  }
  public function update_proveedor($id,$proveedor){
    $modificaProveedor=$this->objeto->modificaProveedor($id,$proveedor);
    return $modificaProveedor;
  }
  public function update_empleado($nEmpleado,$rfc,$nombres,$aPat,$aMat,$puesto,$admGnrl,$ipAdd,$nSerie,$perfil,$tEngreta,$id){
    $modificarEmpleado=$this->objeto->modificaEmpleado($nEmpleado,$rfc,$nombres,$aPat,$aMat,$puesto,$admGnrl,$ipAdd,$nSerie,$perfil,$tEngreta,$id);
    return $modificarEmpleado;
  }
  public function historial(){
    $mostrarHistorial=$this->objeto->mostrarHistorial();
    return $mostrarHistorial;
  }
  public function clear_historial(){
    $limpiarHistorial=$this->objeto->limpiarHistorial();
    return $limpiarHistorial;
  }
  public function mostrar_sala(){
    $mostrarSala=$this->objeto->SalaDeInternet();
    return $mostrarSala;
  }

}

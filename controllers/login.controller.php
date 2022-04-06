<?php  session_start();
include("../models/login.model.php");
class cLogin {
  public $objeto;

  public function __construct(){
    $this->objeto=new mLogin();
  }
  public function log($nom,$pass){
    $iniciar=$this->objeto->login($nom,$pass);
    if(count($iniciar)>0){
      foreach ($iniciar as $key => $usuario) {
        $arrayUsu = array('nombre' => $usuario[3],'id' => $usuario[0] );
        $_SESSION['usu']=$arrayUsu;
      }
    }
    return $iniciar;
  }
  public function actualiza($nom,$n_name,$n_pass,$id,$c_pass){
    $actualizaAdmin=$this->objeto->updateAdmin($nom,$n_name,$n_pass,$id,$c_pass);
    return $actualizaAdmin;
  }
}


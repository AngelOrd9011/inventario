<?php
include 'conexion.model.php';
class mLogin {
    public function login($nom,$pass){
      $sql=mysqli_query(conexion::con(), "SELECT * FROM usuarios WHERE BINARY usuario='$nom' AND password=PASSWORD('$pass')");
      while ($row=mysqli_fetch_array($sql)){
          $usuario[]=$row;
      }
      return @$usuario;
    }
    public function updateAdmin($nom,$n_name,$n_pass,$id,$c_pass){
      $sql="SELECT * FROM usuarios WHERE id=$id AND password=PASSWORD('$c_pass')";
      $res=mysqli_query(conexion::con(),$sql);
      while($row=$res->fetch_array()){
        $arreglo[]=$row;
        if(count($arreglo)>0){
          $sql="UPDATE usuarios
                SET nombre_s='$nom',usuario='$n_name',password=PASSWORD('$n_pass')
                WHERE id=$id AND password=PASSWORD('$c_pass')";
          $res=mysqli_query(conexion::con(),$sql);
          return $res;
        }
      }
    }
}


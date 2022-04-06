<?php
include('../controllers/login.controller.php');
if(isset($_POST["name"]) && isset($_POST["password"])){
    $nom=$_POST["name"];
    $pass=$_POST["password"];
    $objeto=new cLogin();
    $res=$objeto->log($nom,$pass);
    if($res){
      echo 1;
    }
    else{
      echo"error";
    }
}
else{
  echo "error";
}
?>

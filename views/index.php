<?php session_start();
$varsesion=$_SESSION['usu']['id'];
if($varsesion==null || $varsesion=''){
  header('location:home');
}
else {
  header('location:admin');
}
?>

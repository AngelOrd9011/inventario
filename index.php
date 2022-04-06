<?php session_start();
$varsesion=$_SESSION['usu']['id'];
if($varsesion==null || $varsesion=''){
  header('location:views/home');
}
else {
  header('location:views/admin/');
}
?>

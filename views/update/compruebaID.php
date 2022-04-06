<?php
include('../../controllers/consultas.controller.php');
if (!isset($_POST['id']) || !is_numeric($_POST['id']) || $_POST['id']=='') {
  echo 'error';
}
else {
  $id=$_POST['id'];
  echo $id;
}


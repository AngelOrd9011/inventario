<?php

if (isset($_FILES['file'])) {
    $result;
    $archivo = $_FILES["file"]["name"];
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    if($tipoArchivo == 'csv'){
        $result=array('code' => '202',
                        'status' => 'success',
                        'title' => 'Listo',
                        'text' => 'Se han agregado los usuarios');
    }
    else {
        $result=array('code' => '406',
                        'status' => 'error',
                        'title' => 'Hubo un problema',
                        'text' => 'La extención del archivo no es CSV');
    }
    echo json_encode($result);
}
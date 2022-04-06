<?php
Class conexion {
    public static function con(){
        @$conn= mysqli_connect("localhost", "root","usbw", "inventario");
        if (!@$conn->set_charset("utf8")) {
            exit();
        }
        return $conn;
    }
}


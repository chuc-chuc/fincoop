<?php
function db() {
    $servidor = "192.168.0.117";
    $usuario = "chuc";
    $password = "chuc";
    $db = "fincoop";
    $conexion = new mysqli($servidor, $usuario, $password, $db);
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    return $conexion;
}
?>

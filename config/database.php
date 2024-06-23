<?php
function db() {
    $servidor = "localhost";
    $usuario = "root";
    $password = "chuc";
    $db = "fincoop";
    $conexion = new mysqli($servidor, $usuario, $password, $db);
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    return $conexion;
}
?>

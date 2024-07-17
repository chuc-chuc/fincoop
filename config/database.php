<?php
function db() {
    $servidor = "193.203.166.72";
    $usuario = "u542351893_fincoop";
    $password = "Chuc1234#";
    $db = "u542351893_fincoop";
    $conexion = new mysqli($servidor, $usuario, $password, $db);
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    return $conexion;
}
?>

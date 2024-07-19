<?php
function db() {
    $servidor = "193.203.166.72";
    $usuario = "u542351893_fin";
    $password = "Chuc1234#";
    $db = "u542351893_fin";
    $conexion = new mysqli($servidor, $usuario, $password, $db);
    if ($conexion->connect_error) {
        die("Conexión fallida jajaja: " . $conexion->connect_error);
    }
    return $conexion;
}

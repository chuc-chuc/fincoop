<?php
function db()
{
    $servidor = "localhost";
    $usuario = "u542351893_fin";
    $password = "Chuc1234#";
    $db = "u542351893_fin";
    $conexion = new mysqli($servidor, $usuario, $password, $db);
    if ($conexion->connect_error) {
        die("Conexión fallida jajaja: " . $conexion->connect_error);
    }
    return $conexion;
}

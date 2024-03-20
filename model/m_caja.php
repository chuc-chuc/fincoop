<?php
class main {
    private $conexion;
    private $nombre;
    private $email;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    public function inicio(){
        echo "Si Ingreso";
    }
}
?>
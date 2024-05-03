<?php
class caja
{
    private $db;
    private $nombre;
    private $id_agencia;
    private $id_usuario;

    public function __construct($conexion)
    {
        $this->db = $conexion;
        $this->nombre = $conexion;
        $this->id_agencia = $conexion;
        $this->id_usuario = $conexion;
    }

    public function apertura()
    {
        $db = $this->db;
        echo 'Listo';
        // Cerrar conexión
        $db->close();
    }
    
}

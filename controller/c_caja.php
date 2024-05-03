<?php
require_once "model/m_caja.php";

class CajaController {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    // Función general para servicios y métodos
    public function servicios($metodo) {
        $main = new caja($this->db);
        if (method_exists($main, $metodo)) {
            $main->$metodo();
        } else {
            echo "Error: el método solicitado no existe.";
        }
    }
    
    public function index() {
        $main = new caja($this->db);
        require_once "view/caja/index.php";
    }
    public function bodega()
    {
        $main = new caja($this->db);
        require_once "view/caja/bodega.php";
    }
    public function pagos()
    {
        $main = new caja($this->db);
        require_once "view/caja/pagos.php";
    }
    public function pagosex()
    {
        $main = new caja($this->db);
        require_once "view/caja/pagosex.php";
    }
    public function transaciones()
    {
        $main = new caja($this->db);
        require_once "view/caja/transaciones.php";
    }

    public function error() {
        head();
        require_once "404ruta.php";
    }
}
?>

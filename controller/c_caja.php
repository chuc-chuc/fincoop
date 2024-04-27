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

    public function error() {
        head();
        require_once "404.php";
    }
}
?>


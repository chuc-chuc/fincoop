<?php
require_once "model/m_main.php";

class MainController {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    // Función general para servicios y métodos
    public function servicios($metodo) {
        $main = new main($this->db);
        if (method_exists($main, $metodo)) {
            $main->$metodo();
        } else {
            echo "Error: el método solicitado no existe.";
        }
    }
    
    public function menu() {
        $main = new main($this->db);
        require_once "view/main/index.php";
    }

    public function error() {
        head();
        require_once "404.php";
    }
}
?>

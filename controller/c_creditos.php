<?php
require_once "model/m_main.php";

class MainController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    //funcion general para servicios y metodos
    public function servicios($metodo) {
        $main = new main($this->db);
        $main->$metodo();
    }
    public function caja() {
        $main = new main($this->db);
        require_once "view/main/index.php";
    }
}
?>

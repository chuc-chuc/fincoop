<?php
require_once "controller/c_main.php";
require_once "config/database.php";
$db = obtenerConexionDB();
$controller = new MainController($db);
//Servicios
if (isset ($_POST['metodo']) && !empty ($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
    $controller->servicios($metodo);
}
//rutas
else if (isset ($_GET['ruta']) && !empty ($_GET['ruta'])) {
    $ruta = $_GET['ruta'];
    switch ($ruta) {
        case 'caja':
            $controller->$ruta();
            break;
        case 'administracion':
            $controller->$ruta();
            break;
        default:
            # code...
            break;
    }

} else {
    require_once "config/app.php";
    head();
    require_once "404.php";
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('America/Guatemala');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "controller/c_caja.php";
require_once "config/database.php";
require_once "config/app.php";
require_once "config/menus.php";
$db = db();
$controller = new CajaController($db);
$modulo = 'caja'; //nombre del modulo
$acceso = acceso($modulo); //verifica acceso al modulo
if ($acceso) {
    //Servicios
    if (isset($_POST['metodo']) && !empty($_POST['metodo'])) {
        $metodo = $_POST['metodo'];
        $controller->servicios($metodo);
    }
    //rutas
    else if (isset($_GET['ruta']) && !empty($_GET['ruta'])) {
        $ruta = $_GET['ruta'];
        switch ($ruta) {
            case 'index':
            case 'bodega':
            case 'pagos':
            case 'pagosex':
            case 'transaciones':
                // Verificamos si el método existe en el objeto controller antes de llamarlo.
                if (method_exists($controller, $ruta)) {
                    $controller->$ruta();
                } else {
                    $controller->error();
                }
                break;
            default:
                $controller->error();
                break;
        }
    } else {
        $controller->index();
    }
} else {
    head();
    //funcion para notificar error de acceso
?>
    <div class="flex items-center min-h-screen bg-gradient-to-r from-gray-50 to-slate-50 shadow-sm">
    </div>
    <script>
        function alerta() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Sin Acceso',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                window.location = "index.php";
            });
        }
        alerta();
    </script>
<?php
    exit;
}
?>
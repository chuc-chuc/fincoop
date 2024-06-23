<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "controller/c_main.php";
require_once "config/database.php";
require_once "config/app.php";
require_once "config/menus.php";
$db = db();
$controller = new MainController($db);
if (isset($_POST['metodo']) && $_POST['metodo'] == 'sesion') {
    $controller->servicios('sesion');
    exit;
}
$modulo = 'menu'; //nombre del modulo
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
            case 'menu':
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
        head();
        require_once "404.php";
    }
} else {
    head();
    //funcion para notificar error de acceso
?>

    <div class="bg-gray-100 flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <h2 class="text-xl font-bold mb-4">No tienen acceso, favor de solicitarlo</h2>
            <div class="flex justify-center gap-4">
                <button onclick="location.reload()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Reintentar
                </button>
                <form method="POST" action="config/app.php">
                    <button type="submit" name="logout" class="inline-flex items-center bg-red-500 border-0 py-2 px-3 -mt-2.5 focus:outline-none hover:bg-red-700 rounded text-base md:mt-0 ml-5 text-white">
                        Salir
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
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
                //window.location = "index.php";
            });
        }
        //alerta();
    </script>
<?php
    exit;
}
?>
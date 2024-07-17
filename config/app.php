<?php
require_once 'database.php';
function head()
{
    date_default_timezone_set('America/Guatemala');
        date_default_timezone_set("America/Guatemala");
        echo date_default_timezone_get();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="config/js/jquery-3.7.1.js"></script>
        <script src="config/js/tailwind.js"></script>
        <script src="config/js/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="config/css/sweetalert2.min.css">
        <script src="config/js/alpine.min.js"></script>
    </head>

    <body>

    <?php
}
function acceso($acceso)
{
    $db = db();
    //consulta
    $idUsuario = 1;
    try {
        $query = "CALL VerificarAccesoUsuario(?, ?, @tieneAcceso)";
        $stmt = $db->prepare($query);
        // Vincular parámetros
        $stmt->bind_param('is', $idUsuario, $acceso);
        // Ejecutar la consulta
        $stmt->execute();
        // Obtener el resultado del parámetro OUT
        $result = $db->query("SELECT @tieneAcceso AS tieneAcceso");
        $row = $result->fetch_assoc();
        // Cerrar sentencia y conexión
        $stmt->close();
        $db->close();
        return (bool) $row['tieneAcceso'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function sidebarInicio()
{
    ?>
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-60 lg:flex-col shadow">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-[#070F2B] shadow-lg px-4 pb-4 ">
                <div class="flex h-16 shrink-0 items-center text-[#EEEDED] border-b font-bold text-[28px] italic">
                    <div class="flex justify-start ">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="170" height="50" viewBox="0 0 794 242">
                            <image xlink:href="data:img/png;base64,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" width="794" height="242" />
                        </svg>  
                    </div>
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-4">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li class="">
                                    <a href="main.php?ruta=menu" class="flex flex-row items-center px-2 py-1 rounded-lg text-gray-800 hover:bg-red-600 shadow bg-red-700">
                                        <span class="flex items-center justify-center text-lg text-gray-100">
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-3 text-gray-100">INICIO</span>
                                    </a>
                                </li>
                                <li class="">
                                    <span class="flex font-medium text-sm text-gray-200 py-2 uppercase border-b border-red-400">MENU</span>
                                </li>
                            <?php
                        }
                        function sidebarFinal()
                        {
                            ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    <?php
                        }

                        function sidebarMiniInicio()
                        {
    ?>
        <div id="sidebar" class="relative z-50 hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-900/80"></div>

            <div class="fixed inset-0 flex">
                <div class="relative mr-2 flex w-full max-w-60 flex-1">
                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button id="closeSidebar" type="button" class="-m-2.5 p-2.5">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>


                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-[#070F2B] shadow-lg px-4 pb-4 ">
                        <div class="flex h-16 shrink-0 items-center text-[#EEEDED] border-b font-bold text-[28px] italic">
                            <div class="flex justify-start ">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="190" height="61" viewBox="0 0 794 242">
                                    <image xlink:href="data:img/png;base64,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" width="794" height="242" />
                                </svg>
                            </div>
                        </div>
                        <nav class="flex flex-1 flex-col">
                            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                <li>
                                    <ul role="list" class="-mx-2 space-y-1">
                                        <li>
                                            <a href="main.php?ruta=menu" class="flex flex-row items-center px-2 py-1 rounded-lg text-gray-800 hover:bg-red-600 shadow bg-red-700">
                                                <span class="flex items-center justify-center text-lg text-gray-100">
                                                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span class="ml-3 text-gray-100">INICIO</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <span class="flex font-medium text-sm text-gray-200 py-2 uppercase border-b border-red-400">MENU</span>
                                        </li>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', () => {
                                                // Selecciona los botones y el menú lateral por su ID
                                                const openSidebarButton = document.getElementById('openSidebar');
                                                const closeSidebarButton = document.getElementById('closeSidebar');
                                                const sidebar = document.getElementById('sidebar');

                                                // Escucha para el botón de abrir
                                                openSidebarButton.addEventListener('click', () => {
                                                    sidebar.classList.remove('hidden'); // Muestra el menú
                                                });

                                                // Escucha para el botón de cerrar
                                                closeSidebarButton.addEventListener('click', () => {
                                                    sidebar.classList.add('hidden'); // Oculta el menú
                                                });
                                            });
                                        </script>
                                    <?php
                                }
                                function sidebarMiniFinal()
                                {
                                    ?>

                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <?php
                                }
                                if (isset($_POST['logout'])) {

                                    session_start();
                                    // Destruir todas las variables de sesión.
                                    $_SESSION = array();

                                    // Si se desea destruir la sesión completamente, borra también la cookie de sesión.
                                    if (ini_get("session.use_cookies")) {
                                        $params = session_get_cookie_params();
                                        setcookie(
                                            session_name(),
                                            '',
                                            time() - 42000,
                                            $params["path"],
                                            $params["domain"],
                                            $params["secure"],
                                            $params["httponly"]
                                        );
                                    }

                                    // Finalmente, destruir la sesión.
                                    session_destroy();

                                    // Redireccionar al usuario a la página de inicio o login después de cerrar la sesión
                                    header("Location: ../index.php");
                                    exit;
                                }
    ?>
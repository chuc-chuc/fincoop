<?php
require_once 'database.php';
function head()
{
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
                    <img class="h-8 w-auto pr-2" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company">
                    FINCOOP
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
                            <img class="h-8 w-auto pr-2" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company">
                            FINCOOP
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
                                    setcookie(session_name(), '', time() - 42000,
                                        $params["path"], $params["domain"],
                                        $params["secure"], $params["httponly"]
                                    );
                                }
                            
                                // Finalmente, destruir la sesión.
                                session_destroy();
                            
                                // Redireccionar al usuario a la página de inicio o login después de cerrar la sesión
                                header("Location: ../index.php");
                                exit;
                            }
    ?>

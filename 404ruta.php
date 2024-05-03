<?php
head();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    // Si no hay sesión de usuario, enviar código HTML con JavaScript para mostrar el mensaje
?>

    <body>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Acceso Denegado',
                text: 'No has iniciado sesión. Serás redireccionado a la página de inicio.',
                showConfirmButton: false,
                timer: 2500 // Tiempo antes de la redirección en milisegundos
            }).then(() => {
                window.location.href = 'main.php?ruta=menu'; // Redirecciona después de cerrar el mensaje
            });
        </script>
    </body>

    </html>
<?php
    exit;
}
sidebarInicio();
caja();
sidebarFinal();
sidebarMiniInicio();
caja();
sidebarMiniFinal();
?>

<div class="lg:pl-60">
    <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
        <button id="openSidebar" type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        <!-- Separator -->
        <div class="h-6 w-px bg-gray-900/10 lg:hidden" aria-hidden="true"></div>
        <div class="md:container m-auto flex flex-wrap p-2 items-center">
            <nav class="ml-auto flex flex-wrap items-center text-base justify-center">
            </nav>
            <p class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-red-500 rounded-full" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                </svg>
                <span class="ml-3 text-lg"><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></span>
            </p>
            <form method="POST" action="config/app.php">
                <button type="submit" name="logout" class="inline-flex items-center bg-red-500 border-0 py-1.5 px-3 -mt-2.5 focus:outline-none hover:bg-red-700 rounded text-base md:mt-0 ml-5 text-white">
                    Salir
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <main class="">
        </style>

        <div>
            <main aria-labelledby="pageTitle" class="flex items-center justify-center h-96 bg-gray-100">
                <div class="p-4 space-y-4">
                    <div class="flex flex-col items-start space-y-3 sm:flex-row sm:space-y-0 sm:items-center sm:space-x-3">
                        <p class="font-semibold text-red-500 text-9xl dark:text-red-600">404</p>
                        <div class="space-y-2">
                            <h1 id="pageTitle" class="flex items-center space-x-2">
                                <svg aria-hidden="true" class="w-6 h-6 text-red-500 dark:text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span class="text-xl font-medium text-gray-600 sm:text-2xl dark:text-light">
                                    Oops! Pagina no encontrada.
                                </span>
                            </h1>
                            <p class="text-base font-normal text-gray-600 dark:text-gray-300">
                                La pagina Buscada no se localiza
                            </p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </main>
</div>

</body>

</html>
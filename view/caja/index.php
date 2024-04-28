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
        <div class="mx-auto bg-slate-200 p-6 rounded-lg shadow">
            <div class="mx-auto bg-white p-3 rounded-lg shadow-lg flex justify-between">
                <p class="flex title-font font-medium items-center text-gray-900">
                    <span class="ml-3 text-lg">Acciones Caja</span>
                </p>
                <div class="flex gap-2">
                    <button id="btnOpen" class="bg-green-500 hover:bg-green-700 active:bg-green-800 px-4 py-2 rounded-md text-white">
                        Apertura
                    </button>
                    <button id="btnClose" class="bg-blue-500 hover:bg-blue-700 active:bg-blue-800 px-4 py-2 rounded-md text-white">
                        Cierre
                    </button>
                </div>
            </div>
            <div class="mx-auto mt-2 bg-white p-6 rounded-lg shadow-lg">
                <table class="w-full">
                    <tbody>
                        <!-- Title Row -->
                        <tr class="text-blue-600">
                            <th class="text-left">No</th>
                            <th class="text-left">Detalles</th>
                            <th class="text-right">Monto</th>
                        </tr>

                        <!-- Data Rows -->
                        <tr class="font-bold">
                            <td class="py-2">Cajero:</td>
                            <td class="py-2 text-red-500">Juan Miguel Chuc</td>
                            <td></td>
                        </tr>
                        <tr class="font-bold">
                            <td class="py-2">Estado</td>
                            <td class="py-2 text-red-500">Abierto</td>
                            <td class="py-2 text-right text-red-500"></td>
                        </tr>
                        <tr class="font-bold">
                            <td class="py-2">Saldo</td>
                            <td class="py-2 text-left"></td>
                            <td class="py-2 text-right text-red-500">Q 150.25</td>
                        </tr>
                        <tr class="font-bold">
                            <td class="py-2">Pedido realizados (3)</td>
                            <td class="py-2 text-left text-red-500"></td>
                            <td class="py-2 text-right text-red-500">Q150,000.00</td>
                        </tr>
                        <tr class="font-bold">
                            <td class="py-2">Efectivo Enviado (2)</td>
                            <td class="py-2 text-left text-red-500"></td>
                            <td class="py-2 text-right text-red-500">Q10,000.00</td>
                        </tr>
                        <tr class="font-bold">
                            <td class="py-2">Transacciones</td>
                            <td class="py-2 text-left text-red-500"></td>
                            <td class="py-2 text-right text-red-500">150</td>
                        </tr>
                        <tr class="font-bold">
                            <td class="py-2">Reversas</td>
                            <td class="py-2 text-left text-red-500"></td>
                            <td class="py-2 text-right text-red-500">2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const saldo = 150.25; // Replace with dynamic PHP value

                document.getElementById('btnOpen').addEventListener('click', function() {
                    confirmAction('apertura');
                });

                document.getElementById('btnClose').addEventListener('click', function() {
                    if (saldo === 0) {
                        confirmAction('cierre');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Aún tiene saldo',
                            text: 'No puede cerrar con saldo pendiente.'
                        });
                    }
                });

                function confirmAction(action) {
                    Swal.fire({
                        icon: 'info',
                        title: `Está seguro que desea realizar la ${action}?`,
                        showCancelButton: true,
                        confirmButtonText: `Confirmar`,
                        cancelButtonText: `Cancelar`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var formData = new FormData();
                            formData.append('metodo', action + 'metod'); // Make sure this is the correct field name and value

                            $.ajax({
                                url: 'caja.php', // URL where you'll handle the form submission
                                type: 'POST',
                                data: formData,
                                contentType: false, // Needed for FormData
                                processData: false, // Needed for FormData
                                success: function(response) {
                                    console.log(response);
                                    if (response) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Listo',
                                            showConfirmButton: false,
                                            timer: 2500
                                        }).then(() => {
                                            window.location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: response.message // Assuming the server sends back an error message
                                        });
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error de AJAX',
                                        text: `Request failed: ${textStatus}`
                                    });
                                }
                            });
                        }
                    });
                }

            });
        </script>
    </main>
</div>

</body>

</html>
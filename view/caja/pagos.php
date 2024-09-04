<?php
include_once 'view/caja/head.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<style>
    /* Estilos para los botones de las pestañas */
    .tab-btn {
        background-color: #d1d5db;
        /* Fondo gris para las pestañas inactivas */
        color: #1f2937;
        /* Texto negro para las pestañas inactivas */
    }

    .tab-btn.active {
        background-color: #1f2937;
        /* Fondo negro para la pestaña activa */
        color: #ffffff;
        /* Texto blanco para la pestaña activa */
    }

    /* Estilos para el contenido de las pestañas */
    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }
</style>

<div class="bg-gray-100">
    <div class="bg-gray-100 p-8">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-between w-full pt-6 mb-4">
                <p class="font-bold "> Pagos de creditos</p>
                <button id="abrirModal" class="bg-red-700 hover:bg-red-700 text-white font-bold py-1.5 px-4 rounded focus:outline-none focus:shadow-outline">
                    Buscar
                </button>
            </div>
            <div class="bg-white p-5 rounded shadow">
                <h1 class="text-xl font-bold mb-4">Pago de Préstamos</h1>
                <form id="searchCreditForm" class="bg-white rounded ">
                    <div>
                        <label for="numeroCredito" class="block text-sm font-medium text-gray-700">Número de Crédito:</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" id="numeroCredito" name="numeroCredito" required class="focus:ring-indigo-500 ring-2 ring-blue-300 ring-inset focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Ingrese número">
                            <button type="submit" class="absolute inset-y-0 right-0 flex items-center px-4 font-bold text-white bg-blue-500 hover:bg-blue-700 rounded-r-md">Buscar</button>
                        </div>
                    </div>
                </form>
                <div id="detallesCredito" class="mt-4 hidden">
                    <h2 class="text-lg font-semibold">Detalles del Crédito</h2>
                    <table class="w-full text-sm text-left text-gray-500">
                        <tbody>
                            <tr>
                                <td class="py-2">Capital Adeudado:</td>
                                <td id="capitalAdeudado" class="py-2 font-medium text-gray-900"></td>
                            </tr>
                            <tr>
                                <td>Interés:</td>
                                <td id="interes" class="font-medium text-gray-900"></td>
                            </tr>
                            <tr>
                                <td>Mora:</td>
                                <td id="mora" class="font-medium text-gray-900"></td>
                            </tr>
                            <tr>
                                <td>Otros:</td>
                                <td id="otros" class="font-medium text-gray-900"></td>
                            </tr>
                        </tbody>
                    </table>
                    <form id="paymentForm" class="bg-white py-5 rounded">
                        <div class="">
                            <label for="montoPago" class="block text-sm font-medium text-gray-700">Monto a Pagar:</label>
                            <input type="number" id="montoPago" name="montoPago" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <!-- Dato adicional que se enviará -->
                        <input type="hidden" id="datoAdicional" name="datoAdicional" value="valorAdicional">
                        <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Enviar Pago</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="mt-3"></div>
</div>
<!-- Modal -->
<div id="miModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 p-2">
    <div class="rounded shadow-md w-11/12 sm:w-9/12 md:w-7/12">
        <div class="flex justify-between items-center border-b border-gray-200 bg-blue-700 p-4 rounded-t">
            <div class="flex items-center justify-center">
                <p class="text-xl font-bold text-gray-100">Buscar</p>
            </div>
            <button id="cerrarModal" type="button" class="end-2.5 text-gray-100 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Contenido del formulario -->
        <div class="bg-white p-5 rounded shadow">
            <div class="mx-auto bg-white rounded ">
                <div class="flex">
                    <!-- Pestaña 1 -->
                    <button class="tab-btn bg-blue-500 text-white px-4 py-2 mr-1 rounded-tl rounded-tr focus:outline-none active" data-tab="tab1">Por Nombre</button>
                    <!-- Pestaña 2 -->
                    <button class="tab-btn bg-blue-500 text-white px-4 py-2 ml-1 rounded-tl rounded-tr focus:outline-none" data-tab="tab2">Por DPI</button>
                </div>

                <!-- Contenido de las pestañas -->
                <div id="tab1" class="tab-content mt-2 active">
                    <div class="container mx-auto mt-2">
                        <form id="buscar_nombre" class="bg-white border rounded px-4 pt-2 pb-2 mb-4">
                            <input type="hidden" name="metodo" value="buscar_nombre">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="mb-1">
                                    <label for="p_nombre" class="block text-gray-700 text-sm font-bold mb-1">Primer Nombre</label>
                                    <input type="text" class="focus:ring-indigo-500 ring-2 ring-blue-300 ring-inset focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm border-gray-300 rounded-md" id="p_nombre" name="p_nombre" required>
                                </div>
                                <div class="mb-1">
                                    <label for="s_nombre" class="block text-gray-700 text-sm font-bold mb-1">Segundo Nombre</label>
                                    <input type="text" class="focus:ring-indigo-500 ring-2 ring-blue-300 ring-inset focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm border-gray-300 rounded-md" id="s_nombre" name="s_nombre">
                                </div>
                                <div class="mb-1">
                                    <label for="p_apellido" class="block text-gray-700 text-sm font-bold mb-1">Primer Apellido</label>
                                    <input type="text" class="focus:ring-indigo-500 ring-2 ring-blue-300 ring-inset focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm border-gray-300 rounded-md" id="p_apellido" name="p_apellido" required>
                                </div>
                                <div class="mb-1">
                                    <label for="s_apellido" class="block text-gray-700 text-sm font-bold mb-1">Segundo Apellido</label>
                                    <input type="text" class="focus:ring-indigo-500 ring-2 ring-blue-300 ring-inset focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm border-gray-300 rounded-md" id="s_apellido" name="s_apellido">
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="tab2" class="tab-content mt-4">
                    <div class="container mx-auto mt-2">
                        <form id="buscar_dpi" class="bg-white border rounded px-4 pt-2 pb-2 mb-4">
                            <input type="hidden" name="metodo" value="buscar_dpi">
                            <div class="">
                                <div class="mb-1">
                                    <label for="p_nombre" class="block text-gray-700 text-sm font-bold mb-1">DPI</label>
                                    <input type="number" class="focus:ring-indigo-500 ring-2 ring-blue-300 ring-inset focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm border-gray-300 rounded-md" id="dpi" name="dpi" required>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 mt-4 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="listaCreditos">
                <h2 class="text-lg font-semibold">Créditos Vinculados</h2>
                <table class="w-full text-sm text-left text-gray-500" id="tablaTransacciones">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="py-3 px-6">Crédito</th>
                            <th class="py-3 px-6">Datos Crédito</th>
                            <th class="py-3 px-6">Socio</th>
                            <th class="py-3 px-6">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="creditosContainer">
                        <!-- Los créditos se llenarán aquí mediante JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script src="view/caja/pagos.js"></script>
<script>
    // JavaScript para manejar eventos del modal
    const abrirModal = document.getElementById('abrirModal');
    const cerrarModal = document.getElementById('cerrarModal');
    const modal = document.getElementById('miModal');
    const formulario = document.getElementById('miFormulario');

    // Función para abrir el modal
    abrirModal.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Función para cerrar el modal
    cerrarModal.addEventListener('click', () => {
        modal.classList.add('hidden');
        $('#searchCreditosForm')[0].reset();
    });

    // Función para cerrar el modal al hacer clic fuera del contenido o el título
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
            $('#searchCreditosForm')[0].reset();
        }
    });
</script>

<!-- Script para manejar las pestañas con JavaScript -->
<script>
    $(document).ready(function() {
        // Mostrar la pestaña activa al inicio
        $('.tab-content.active').show();

        // Manejo de clics en los botones de pestañas
        $('.tab-btn').click(function() {
            // Obtener el ID de la pestaña desde el atributo data
            var tabId = $(this).attr('data-tab');

            // Cambiar clase activa entre los botones de pestañas
            $('.tab-btn').removeClass('active');
            $(this).addClass('active');

            // Ocultar todos los contenidos de pestañas
            $('.tab-content').removeClass('active').hide();

            // Mostrar el contenido de la pestaña seleccionada
            $('#' + tabId).addClass('active').show();
        });
    });
</script>



<script>
    $(document).ready(function() {
        $('#buscar_nombre').submit(function(event) {
            event.preventDefault(); // Evitar el envío normal del formulario

            // Crear un objeto FormData con los datos del formulario
            var formData = new FormData(this);

            // Enviar los datos a través de AJAX
            $.ajax({
                url: 'caja.php', // Ruta del script PHP en tu servidor que procesa el formulario
                type: 'POST', // Método HTTP
                dataType: 'json', // Tipo de datos esperados del servidor (JSON en este caso)
                data: formData, // Datos a enviar
                processData: false, // Prevenir que jQuery procese los datos
                contentType: false, // Prevenir que jQuery establezca el Content-Type
                success: function(data) {
                    console.log(data)
                    // Limpiar tabla antes de agregar datos nuevos
                    $('#tablaTransacciones tbody').empty();

                    // Iterar sobre los datos recibidos y agregar filas a la tabla
                    $.each(data, function(index, transaccion) {
                        var fila = `
                        <tr>
                            <td class="py-3 px-4">
                                <span class="text-sm font-semibold text-gray-900">${transaccion.id}</span>
                            </td>
                            <td class="py-3 px-4">
                                <p><span class="text-sm font-semibold text-gray-900">Desembolso:</span> ${transaccion.fecha_desembolso}</p>
                                <p><span class="text-sm font-semibold text-gray-900">Saldo:</span> ${transaccion.saldo}</p>
                                <p><span class="text-sm font-semibold text-gray-900">Estado:</span> ${transaccion.estado}</p>
                            </td>
                            <td class="py-3 px-4">
                                <p><span class="text-sm font-semibold text-gray-900">Nombre:</span> ${transaccion.nombre}</p>
                            </td>
                            <td class="py-3 px-4"><button class="copyButton" data-clipboard-text="${transaccion.id}"><img src="https://img.icons8.com/ios-glyphs/30/000000/copy.png"/></button></td></tr>
                            `;
                        $('#tablaTransacciones tbody').append(fila);
                    });
                    // Inicializar ClipboardJS y manejar el evento de éxito para el cambio de color
                    new ClipboardJS('.copyButton').on('success', function(e) {
                        $(e.trigger).find('img').css('filter', 'invert(0.5) sepia(1) saturate(5) hue-rotate(80deg) brightness(0.8)');
                        setTimeout(function() {
                            $(e.trigger).find('img').css('filter', '');
                        }, 1000); // Restablece el filtro después de 1 segundo
                    });
                },
                error: function(xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    console.error(error);
                    alert('Error al cargar las transacciones. Inténtalo de nuevo.');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#buscar_dpi').submit(function(event) {
            event.preventDefault(); // Evitar el envío normal del formulario

            // Crear un objeto FormData con los datos del formulario
            var formData = new FormData(this);

            // Enviar los datos a través de AJAX
            $.ajax({
                url: 'caja.php', // Ruta del script PHP en tu servidor que procesa el formulario
                type: 'POST', // Método HTTP
                dataType: 'json', // Tipo de datos esperados del servidor (JSON en este caso)
                data: formData, // Datos a enviar
                processData: false, // Prevenir que jQuery procese los datos
                contentType: false, // Prevenir que jQuery establezca el Content-Type
                success: function(data) {
                    console.log(data)
                    // Limpiar tabla antes de agregar datos nuevos
                    $('#tablaTransacciones tbody').empty();

                    // Iterar sobre los datos recibidos y agregar filas a la tabla
                    $.each(data, function(index, transaccion) {
                        var fila = `
                        <tr>
                            <td class="py-3 px-4">
                                <span class="text-sm font-semibold text-gray-900">${transaccion.id}</span>
                            </td>
                            <td class="py-3 px-4">
                                <p><span class="text-sm font-semibold text-gray-900">Desembolso:</span> ${transaccion.fecha_desembolso}</p>
                                <p><span class="text-sm font-semibold text-gray-900">Saldo:</span> ${transaccion.saldo}</p>
                                <p><span class="text-sm font-semibold text-gray-900">Estado:</span> ${transaccion.estado}</p>
                            </td>
                            <td class="py-3 px-4">
                                <p><span class="text-sm font-semibold text-gray-900">Nombre:</span> ${transaccion.nombre}</p>
                            </td>
                            <td class="py-3 px-4"><button class="copyButton" data-clipboard-text="${transaccion.id}"><img src="https://img.icons8.com/ios-glyphs/30/000000/copy.png"/></button></td></tr>
                            `;
                        $('#tablaTransacciones tbody').append(fila);
                    });
                    // Inicializar ClipboardJS y manejar el evento de éxito para el cambio de color
                    new ClipboardJS('.copyButton').on('success', function(e) {
                        $(e.trigger).find('img').css('filter', 'invert(0.5) sepia(1) saturate(5) hue-rotate(80deg) brightness(0.8)');
                        setTimeout(function() {
                            $(e.trigger).find('img').css('filter', '');
                        }, 1000); // Restablece el filtro después de 1 segundo
                    });
                },
                error: function(xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    console.error(error);
                    alert('Error al cargar las transacciones. Inténtalo de nuevo.');
                }
            });
        });
    });
</script>
<?php
include_once 'view/caja/footer.php';
?>
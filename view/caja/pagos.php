<?php
include_once 'view/caja/head.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

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
                <p class="text-xl font-bold text-gray-100">Solicitar</p>
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
            <form id="searchCreditosForm" class="mb-4">
                <h1 class="text-xl font-bold">Buscar Créditos</h1>
                <div>
                    <label for="identificacion" class="block text-sm font-medium text-gray-700">Identificación del Dueño:</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="identificacion" name="identificacion" class="focus:ring-indigo-500 ring-2 ring-blue-300 ring-inset focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Ingrese identificación">
                    </div>
                </div>
                <div class="mt-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Dueño:</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="nombre" name="nombre" class="focus:ring-indigo-500 ring-2 ring-blue-300 ring-inset focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Ingrese nombre">
                    </div>
                </div>
                <div class="mt-4">
                    <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido del Dueño:</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="apellido" name="apellido" class="focus:ring-indigo-500 ring-2 ring-blue-300 ring-inset focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Ingrese apellido">
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                    <button type="submit" class="inline-flex w-2/3 justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Deactivate</button>
                    <button type="button" id="clearForm" class="mt-3 inline-flex w-2/3 justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>
                </div>
            </form>
            <div id="listaCreditos" class="hidden">
                <h2 class="text-lg font-semibold">Créditos Vinculados</h2>
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="py-3 px-6">Crédito</th>
                            <th class="py-3 px-6">Datos Crédito</th>
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
        $('#creditosContainer').empty();
        $('#listaCreditos').hide();
    });

    // Función para cerrar el modal al hacer clic fuera del contenido o el título
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
            $('#searchCreditosForm')[0].reset();
            $('#creditosContainer').empty();
            $('#listaCreditos').hide();
        }
    });
</script>
<?php
include_once 'view/caja/footer.php';
?>
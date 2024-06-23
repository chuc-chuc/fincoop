<?php
include_once 'view/caja/head.php';
?>
<div class="bg-gray-100 flex items-center justify-center p-5">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">Control de Caja</h1>

        <!-- Estado del Cajero -->
        <div class="mb-6 text-center">
            <h2 id="estadoCajero" class="text-xl font-semibold text-green-500">Cajero Aperturado</h2>
        </div>

        <!-- Botones de Apertura y Cierre -->
        <div class="flex justify-center gap-4 mb-6">
            <button id="btnApertura" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                Apertura
            </button>
            <button id="btnCierre" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                Cierre
            </button>
        </div>

        <!-- Listado de Estatus -->
        <div>
            <h3 class="text-lg font-semibold mb-2">Estatus del Cajero:</h3>
            <ul class="list-disc list-inside">
                <li id="transacciones" class="mb-1">Cantidad de Transacciones: <span class="font-bold">120</span></li>
                <li id="reversas" class="mb-1">Cantidad de Reversas: <span class="font-bold">5</span></li>
                <li id="pedidosEfectivo" class="mb-1">Pedidos de Efectivo: <span class="font-bold">3</span></li>
            </ul>
        </div>
    </div>
    <!-- Modal -->
    <div id="miModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 p-2">
        <div class="rounded shadow-md mb-4 px-2 w-11/12 sm:w-8/12 md:w-6/12 lg:w-5/12">
            <div class="flex justify-between items-center border-b border-gray-200 bg-blue-700 p-4 rounded-t">
                <div class="flex items-center justify-center">
                    <p class="text-xl font-bold text-gray-100">Apertura / Cierre</p>
                </div>
                <button id="cerrarModal" type="button" class="end-2.5 text-gray-100 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <!-- Contenido del formulario -->
            <form id="miFormulario" class="p-4 bg-white">
                <div class="mb-4">
                    <label for="cantidad" class="block text-gray-700 font-bold mb-2">Monto:</label>
                    <input type="number" id="cantidad" name="cantidad" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <input type="hidden" id="accion" name="metodo">
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">OK</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#btnApertura, #btnCierre').click(function() {
                const accion = $(this).attr('id') === 'btnApertura' ? 'apertura' : 'cierre';
                $('#accion').val(accion);
                $('#miModal').removeClass('hidden');
            });

            $('#cerrarModal').click(function() {
                $('#miModal').addClass('hidden');
            });
            $('#miModal').click(function(event) {
                if (event.target === this) {
                    $('#miModal').addClass('hidden');
                }
            });

            $('#miFormulario').submit(function(event) {
                event.preventDefault();
                const datos = $(this).serialize();
                $.ajax({
                    url: 'caja.php',
                    type: 'POST',
                    data: datos,
                    success: function(response) {
                        console.log(response);
                        alert('Operación realizada con éxito');
                        $('#miModal').addClass('hidden');
                        location.reload();
                    },
                    error: function() {
                        alert('Hubo un error en la operación');
                    }
                });
            });
        });
    </script>
</div>

<?php
include_once 'view/caja/footer.php';
?>
<?php
include_once 'view/caja/head.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<!-- Modal -->
<div id="miModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 p-2">
    <div class="rounded shadow-md mb-4 px-2 w-11/12 sm:w-8/12 md:w-6/12 lg:w-5/12">
        <div class="flex justify-between items-center border-b border-gray-200 bg-blue-700 p-4 rounded-t">
            <div class="flex items-center justify-center">
                <p class="text-xl font-bold text-gray-100">Nuevo</p>
            </div>
            <button id="cerrarModal" type="button" class="end-2.5 text-gray-100 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Contenido del formulario -->
        <form id="bodega" class="p-4 bg-white">
            <!-- Nuevo campo: Selección de tipo -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo">
                    Tipo Transaccion
                </label>
                <select required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-1/2 p-2" id="metodo" name="metodo">
                    <option value="">Seleccionar...</option>
                    <option value="pedido">Pedido</option>
                    <option value="envio">Envío</option>
                </select>
            </div>
            <!-- Campos del formulario -->
            <div class="sm:flex w-full">
                <div class="mb-4 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="efectivo">
                        Efectivo
                    </label>
                    <input required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2" id="efectivoDisplay" type="text" placeholder="Efectivo">
                    <input name="efectivo" id="efectivo" type="hidden">
                </div>
                <div class="mb-4 sm:ml-2 w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="numeroBoleta">
                        Número de boleta
                    </label>
                    <input required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2" id="numeroBoleta" type="text" name="boleta" placeholder="Número de boleta">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="comentario">
                    Comentario
                </label>
                <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="comentario" name="comentario" placeholder="Comentario"></textarea>
            </div>

            <!-- Botón de envío dentro del formulario -->
            <div class="flex items-center justify-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" id="enviar">
                    Solicitar
                </button>
            </div>
        </form>

    </div>
</div>


<!-- component -->
<div class="p-4 rounded-md w-full bg-slate-200">
    <div class="flex justify-between w-full pt-6 ">
        <p class="font-bold "> Pedidos Realizados</p>
        <button id="abrirModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Nuevo
        </button>
    </div>
    <div class="overflow-x-auto mt-6 rounded-lg bg-white">
        <table class="table-auto border-collapse w-full rounded-lg border shadow">
            <thead>
                <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                    <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Monto</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Boleta</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Fecha hora</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Estado</th>
                </tr>
            </thead>
            <tbody class="text-sm font-normal text-gray-700">
                <tr class="hover:bg-blue-100 border-b even:bg-gray-50 py-10">
                    <td class="px-4 py-4">20,000</td>
                    <td class="px-4 py-4">b-50</td>
                    <td class="px-4 py-4">2024-04-28 11:10:52</td>
                    <th class="px-4 py-2 text-blue-600">Aprobado</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
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
        formulario.reset();
    });

    // Función para cerrar el modal al hacer clic fuera del contenido o el título
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
            formulario.reset();
        }
    });
</script>
<script>
    document.getElementById('efectivoDisplay').addEventListener('input', function(e) {
        var value = e.target.value;
        e.target.value = value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
    });
</script>
<script>
    $(document).ready(function() {
        $('#efectivoDisplay').on('blur', function() {
            var value = this.value.replace(/,/g, '');
            if (!value) {
                return;
            }

            // Comprobar si el valor es un número válido
            if (!isNaN(parseFloat(value)) && isFinite(value)) {
                // Convertir a número para descartar ceros a la izquierda
                var numericValue = parseFloat(value);
                // Volver a formatear y añadir ceros finales si es necesario
                this.value = new Intl.NumberFormat('en-US', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2
                }).format(numericValue);
            } else {
                // Si no es un número, limpiar el campo
                this.value = '';
                alert('Por favor, ingresa un número válido.');
            }
        });

        $('#bodega').submit(function(e) {
            e.preventDefault();

            // Crear un nuevo objeto FormData
            var formData = new FormData(this);

            // Agregar el campo efectivo desformateado al objeto FormData
            var efectivoValue = $('#efectivoDisplay').val().replace(/,/g, '');
            formData.append('efectivo', efectivoValue);
            //alert(efectivoValue);

            $.ajax({
                url: 'caja.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    console.log(response);
                    //alert('Formulario enviado correctamente. Respuesta del servidor: ' + response);
                    if (response == 'Listo') {
                        Swal.fire({
                            icon: "success",
                            title: "Operación Realizada",
                            text: "Espere la confirmacion del encargado de bodega",
                            tshowConfirmButton: false,
                            timer: 3500
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: response,
                            tshowConfirmButton: true
                        });
                    }
                },
                error: function(xhr, status, error) {
                    alert('Ha ocurrido un error: ' + error);
                }
            });
        });
    });
</script>
<?php
include_once 'view/caja/footer.php';
?>
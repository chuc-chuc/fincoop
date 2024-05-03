<?php
include_once 'view/caja/head.php';
?>
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
                <tr class="text-blue-600 border-b">
                    <th class="text-left">No</th>
                    <th class="text-right">Detalles</th>
                </tr>

                <!-- Data Rows -->
                <tr class="font-bold">
                    <td class="py-2">Cajero:</td>
                    <td class="py-2 text-red-500 text-right">Juan Miguel Chuc</td>
                </tr>
                <tr class="font-bold">
                    <td class="py-2">Estado</td>
                    <td class="py-2 text-red-500 text-right">Abierto</td>
                </tr>
                <tr class="font-bold">
                    <td class="py-2">Saldo</td>
                    <td class="py-2 text-right text-red-500">Q 150.25</td>
                </tr>
                <tr class="font-bold">
                    <td class="py-2">Pedido realizados (3)</td>
                    <td class="py-2 text-right text-red-500">Q150,000.00</td>
                </tr>
                <tr class="font-bold">
                    <td class="py-2">Efectivo Enviado (2)</td>
                    <td class="py-2 text-right text-red-500">Q10,000.00</td>
                </tr>
                <tr class="font-bold">
                    <td class="py-2">Transacciones</td>
                    <td class="py-2 text-right text-red-500">150</td>
                </tr>
                <tr class="font-bold">
                    <td class="py-2">Reversas</td>
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
                    formData.append('metodo', action); // Make sure this is the correct field name and value

                    $.ajax({
                        url: 'caja.php', // URL where you'll handle the form submission
                        type: 'POST',
                        data: formData,
                        contentType: false, // Needed for FormData
                        processData: false, // Needed for FormData
                        success: function(response) {
                            console.log(response);
                            if (response == 'Listo') {
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
<?php
include_once 'view/caja/footer.php';
?>
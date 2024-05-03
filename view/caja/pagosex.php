<?php
include_once 'view/caja/head.php';
?>
<div class="bg-slate-200 p-8 rounded-lg shadow-lg w-full">
    <div class="bg-slate-200 flex w-full grap-3">
        <div class="bg-white mt-3 p-6 w-1/2">
            <h2 class=" text-2xl font-bold mb-6 text-gray-800">Búsqueda de Crédito</h2>
            <form id="creditSearchForm">
                <div class="mb-4">
                    <label for="creditId" class="block text-gray-700 text-sm font-bold mb-2">ID del Crédito:</label>
                    <input type="number" id="creditId" name="creditId" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="1234567890123" required pattern="\d{13}">
                    <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Buscar</button>
                </div>
            </form>
        </div>
        <div class="bg-white mt-3 ml-2 p-6 w-1/2">
            <h2 class=" text-2xl font-bold mb-6 text-gray-800">Búsqueda de Crédito</h2>
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
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white mt-3 p-6">
        <!-- Formulario secundario para datos adicionales -->
        <form id=" additionalDataForm" class="">
            <div class="mb-4">
                <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Fecha Pago:</label>
                <input type="date" id="amount" name="amount" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Cantidad:</label>
                <input type="number" id="amount" name="amount" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Comentario:</label>
                <textarea id="comment" name="comment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <input type="hidden" id="hiddenData" name="hiddenData" value="AlgunValorOculto">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Realizar Pago</button>
        </form>
    </div>
</div>
<?php
include_once 'view/caja/footer.php';
?>
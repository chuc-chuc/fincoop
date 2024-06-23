<?php
include_once 'view/caja/head.php';
?>
<div class="p-4 rounded-md w-full bg-slate-200">
    <div class="flex justify-between w-full pt-6 ">
        <p class="font-bold "> Pedidos Realizados</p>
        <button id="abrirModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Solicitar
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
<?php
include_once 'view/caja/footer.php';
?>
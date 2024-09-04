
$(document).ready(function () {
    $('#paymentForm').submit(function (event) {
        event.preventDefault(); // Prevenir la recarga de la página

        // Serializa los datos del formulario, incluyendo el dato adicional
        var formData = $(this).serialize();

        // Aquí agregamos el dato adicional directamente a formData si es necesario
        // formData += '&datoExtra=' + encodeURIComponent('ValorExtra');

        // Realiza la petición AJAX
        $.ajax({
            type: "POST",
            url: "tuEndpointDeServidor.php", // Cambia esto por la URL donde se procesará el formulario
            data: formData,
            success: function (response) {
                alert('Pago realizado correctamente: $' + $('#montoPago').val());
                console.log('Respuesta del servidor:', response);
            },
            error: function () {
                alert('Error al enviar los datos');
            }
        });
    });
});

$(document).ready(function () {
    $('#searchCreditForm').on('submit', function (event) {
        event.preventDefault();  // Evitar que el formulario se envíe de forma predeterminada (recarga de la página)

        // Crea un objeto FormData pasando el formulario como parámetro
        var formData = new FormData(this);
        const data = {  // Simulando datos recibidos
            capitalAdeudado: '10,000',
            interes: '500',
            mora: '50',
            otros: '100'
        };

        $('#capitalAdeudado').text(data.capitalAdeudado);
        $('#interes').text(data.interes);
        $('#mora').text(data.mora);
        $('#otros').text(data.otros);
        $('#detallesCredito').show();
        $('#montoPago').prop('disabled', false);
        $('#realizarPago').prop('disabled', false);

        // Realizar la petición AJAX utilizando FormData
        /* $.ajax({
            type: "POST",
            url: "/ruta/del/servidor",  // Ajusta esto a la URL adecuada de tu servidor
            data: formData,
            contentType: false,  // No establecer un tipo de contenido cuando se envía FormData
            processData: false,  // No procesar los datos antes de enviarlo (importante para FormData)
            success: function (data) {
                // Suponiendo que 'data' es la respuesta del servidor con los datos del crédito
                $('#capitalAdeudado').text(data.capitalAdeudado);
                $('#interes').text(data.interes);
                $('#mora').text(data.mora);
                $('#otros').text(data.otros);
                $('#detallesCredito').show();
                $('#montoPago').prop('disabled', false);
                $('#realizarPago').prop('disabled', false);
            },
            error: function () {
                alert('Error al buscar los créditos');
            }
        }); */
    });
});



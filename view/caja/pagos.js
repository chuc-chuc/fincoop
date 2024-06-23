
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

$(document).ready(function () {
    $('#searchCreditosForm2').on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "/ruta/del/servidor",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#creditosContainer').empty();
                if (response.status && response.status === 'no_data') {
                    // No se encontraron datos, muestra un mensaje
                    $('#creditosContainer').append('<tr><td colspan="2">' + response.message + '</td></tr>');
                } else {
                    // Procesa y muestra los créditos
                    response.forEach(credito => {
                        const row = $('<tr>').append(
                            $('<td>').text(credito.numero),
                            $('<td>').html(`<button class="copyButton" data-clipboard-text="${credito.numero}"><img src="https://img.icons8.com/ios-glyphs/30/000000/copy.png"/></button>`)
                        );
                        $('#creditosContainer').append(row);
                    });
                    new ClipboardJS('.copyButton').on('success', function (e) {
                        $(e.trigger).find('img').css('color', 'green');
                        setTimeout(function () {
                            $(e.trigger).find('img').css('color', '');
                        }, 1000);  // Restablece el color después de 1 segundo
                    });
                }
                $('#listaCreditos').show();
            },
            error: function () {
                alert('Error al buscar los créditos');
            }
        });
    });
});
$(document).ready(function () {
    $('#searchCreditosForm').on('submit', function (event) {
        event.preventDefault();

        const identificacion = $('#identificacion').val().trim();
        const nombre = $('#nombre').val().trim();
        const apellido = $('#apellido').val().trim();

        // Validar que se haya ingresado al menos un campo
        if (!identificacion && !nombre && !apellido) {
            alert('Por favor, ingrese al menos un dato para buscar.');
            return;
        }

        // Simulación de datos como si vinieran de una respuesta del servidor
        const creditos = [
            { numero: '123456', identificacion: '2798567090914', nombre: 'Juan Miguel Chuc', fecha_credito: '2024-05-22' },
            { numero: '654321', identificacion: '5678', nombre: 'Maria Lopez', fecha_credito: '2024-04-20' },
            { numero: '789012', identificacion: '9012', nombre: 'Luis Perez', fecha_credito: '2024-03-15' }
        ];

        // Filtrar los datos ficticios basado en los criterios de búsqueda
        const resultados = creditos.filter(credito => {
            return (identificacion ? credito.identificacion.includes(identificacion) : true) &&
                (nombre ? credito.nombre.toLowerCase().includes(nombre.toLowerCase()) : true) &&
                (apellido ? credito.nombre.toLowerCase().includes(apellido.toLowerCase()) : true);
        });

        // Procesar los datos como si fueran la respuesta de una solicitud AJAX
        $('#creditosContainer').empty();
        resultados.forEach(credito => {
            const row = $('<tr>').append(
                $('<td>').text(credito.numero),
                $('<td>').html(`Identificación: ${credito.identificacion} - Nombre: ${credito.nombre} - Fecha Crédito: ${credito.fecha_credito}`),
                $('<td>').html(`<button class="copyButton" data-clipboard-text="${credito.numero}"><img src="https://img.icons8.com/ios-glyphs/30/000000/copy.png"/></button>`)
            );
            $('#creditosContainer').append(row);
        });

        // Inicializar ClipboardJS y manejar el evento de éxito para el cambio de color
        new ClipboardJS('.copyButton').on('success', function (e) {
            $(e.trigger).find('img').css('filter', 'invert(0.5) sepia(1) saturate(5) hue-rotate(80deg) brightness(0.8)');
            setTimeout(function () {
                $(e.trigger).find('img').css('filter', '');
            }, 1000);  // Restablece el filtro después de 1 segundo
        });

        $('#listaCreditos').show();
    });

    // Funcionalidad para limpiar el formulario y los resultados
    $('#clearForm').on('click', function () {
        $('#searchCreditosForm')[0].reset();
        $('#creditosContainer').empty();
        $('#listaCreditos').hide();
    });
});

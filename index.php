<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="config/js/jquery-3.7.1.js"></script>
    <script src="config/js/tailwind.js"></script>
    <script src="config/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="config/css/sweetalert2.min.css">
</head>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['usuario_id'])) {
?>

    <body>
        <script>
            Swal.fire({ // Mostrar mensaje de bienvenida
                icon: 'success',
                title: 'Bienvenido',
                text: 'Ingreso exitoso, siendo redireccionado...',
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
?>

<body>
    <style>
        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            /* Ajusta este valor según necesites espacio entre los SVG */
        }
    </style>
    <div class="relative h-screen w-full">
        <!-- Color de la parte superior -->
        <div class="absolute w-full h-1/2 bg-slate-300"></div>

        <!-- Color de la parte inferior -->
        <div class="absolute w-full h-1/2 bottom-0 bg-red-500"></div>

        <!-- Contenido sobre el fondo de dos colores -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-11/12 sm:w-9/12 md:w-[32rem]">
            <!-- Tu contenido aquí -->
            <div class="bg-white rounded-t-lg sm:p-2 w-full text-left">
                <div class="sm:container">
                    <div class="flex-container flex justify-start ">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="190" height="61" viewBox="0 0 794 242">
                            <image xlink:href="data:img/png;base64,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" width="794" height="242" />
                        </svg>

                    </div>
                </div>
            </div>
            <form id="miFormulario">
                <div class="bg-gray-200 rounded-b-lg py-12 p-2 sm:px-12 shadow-lg">
                    <p class="text-center text-sm text-gray-500 font-light">
                        Ingresa Tus Credenciales
                    </p>
                    <div class="relative mt-3">
                        <input class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600 transition rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline" id="email" name="email" type="email" placeholder="Correo" required />
                        <div class="absolute left-0 inset-y-0 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-gray-400 p-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                    </div>
                    <div class="relative mt-3">
                        <input class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600 transition rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline" id="password" name="password" type="password" placeholder="Contraseña" />
                        <div class="absolute left-0 inset-y-0 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-gray-400 p-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                            </svg>
                        </div>
                        <div class="absolute right-0 inset-y-0 flex items-center">
                            <button type="button" onclick="togglePasswordVisibility()" id="togglePassword">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-center mt-8">
                        <button class="text-white py-2 px-4 uppercase rounded bg-indigo-500 hover:bg-indigo-600 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                            Iniciar Sesión
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var toggleButton = document.getElementById('togglePassword');
            var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Cambia el ícono del SVG dependiendo del estado actual
            if (type === 'text') {
                toggleButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3 text-gray-700"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" /></svg>';
            } else {
                toggleButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3 text-gray-700">  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>';
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#miFormulario').on('submit', function(e) {
                e.preventDefault(); // Evita que el formulario se envíe de la manera tradicional

                var formData = $(this).serialize(); // Prepara los datos del formulario para enviar
                formData += '&metodo=sesion'; // Agregar dato adicional

                $.ajax({
                    url: 'main.php', // URL donde se procesará el formulario
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        if (response == 'Listo') {
                            Swal.fire({ // Mostrar mensaje de bienvenida
                                icon: 'success',
                                title: 'Bienvenido',
                                text: 'Ingreso exitoso, siendo redireccionado...',
                                showConfirmButton: false,
                                timer: 2500 // Tiempo antes de la redirección en milisegundos
                            }).then(() => {
                                window.location.href = 'main.php?ruta=menu'; // Redirecciona después de cerrar el mensaje
                            });
                        } else {
                            Swal.fire({ // Mostrar error con SweetAlert
                                icon: 'error',
                                title: 'Error',
                                text: 'Credenciales incorrectas o problemas con el servidor.'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({ // Mostrar error de AJAX
                            icon: 'error',
                            title: 'Error de AJAX',
                            text: 'No se pudo completar la petición.'
                        });
                    }
                });
            });

        });
    </script>
</body>

</html>
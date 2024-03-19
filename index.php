<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            /* Ajusta el gradiente para dividir el fondo exactamente en la mitad */
            background: linear-gradient(to bottom, #EEEEEE 50%, #6D2932 50%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #miDiv {
            width: 90%;
            background-color: #fff;
            /* Centrar el div horizontalmente y dar espacio arriba y abajo */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
            border-radius: 10px;
            /* Bordes redondeados */
        }

        /* Media query para tabletas */
        @media (min-width: 768px) {
            #miDiv {
                width: 60%;
                /* Ancho más estrecho para pantallas medianas */
            }
        }

        /* Media query para escritorios */
        @media (min-width: 1024px) {
            #miDiv {
                width: 45%;
                /* Ancho más estrecho para pantallas grandes */
            }
        }

        /* Media query para pantallas grandes */
        @media (min-width: 1200px) {
            #miDiv {
                width: 35%;
                /* Ancho original para pantallas muy grandes */
            }
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            /* Ajusta este valor según necesites espacio entre los SVG */
        }

        /* Asegúrate de que el resto de tu CSS esté configurado correctamente para no sobrescribir estos estilos */
    </style>
    <div class="shadow-lg miDiv rounded-t-lg" id="miDiv">
        <div class="bg-white rounded-t-lg p-4 w-full">
            <div class="container">
                <div class="flex-container flex">
                    <svg width="35" viewBox="0 0 90 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M34.2138 5.86107C34.7122 4.28095 36.3972 3.40401 37.9773 3.90239L76.9347 16.1896C78.5148 16.688 79.3917 18.373 78.8934 19.9531L72.8993 38.9574C72.2692 40.9554 69.8371 41.7086 68.188 40.4165L52.7882 28.3503C52.2168 27.9025 51.5023 27.6772 50.7773 27.7161L31.2415 28.7635C29.1495 28.8757 27.5896 26.8634 28.2198 24.8654L34.2138 5.86107Z"
                            fill="url(#paint1_linear_1001_3)" />
                        <path
                            d="M13.3226 80.1965C11.7071 80.5642 10.0994 79.5527 9.73164 77.9371L0.665552 38.1067C0.297829 36.4912 1.30938 34.8834 2.92491 34.5157L22.3551 30.093C24.3979 29.6281 26.2761 31.347 25.9936 33.4229L23.3549 52.808C23.2569 53.5274 23.4232 54.2578 23.8228 54.864L34.5917 71.1973C35.7449 72.9464 34.7957 75.3089 32.7529 75.7738L13.3226 80.1965Z"
                            fill="url(#paint2_linear_1001_3)" />
                        <path
                            d="M87.9774 60.8205C89.0945 62.0441 89.008 63.9417 87.7843 65.0587L57.6148 92.5988C56.3911 93.7158 54.4936 93.6294 53.3766 92.4057L39.9419 77.6883C38.5294 76.141 39.0976 73.6592 41.0426 72.8806L59.2053 65.6098C59.8793 65.34 60.4326 64.835 60.7626 64.1883L69.6548 46.762C70.6071 44.8959 73.1303 44.5557 74.5427 46.103L87.9774 60.8205Z"
                            fill="url(#paint3_linear_1001_3)" />
                        <defs>
                            <linearGradient id="paint0_linear_1001_3" x1="268" y1="0" x2="268" y2="86"
                                gradientUnits="userSpaceOnUse">
                                <stop stop-color="#1A31A7" />
                                <stop offset="1" stop-color="#7C3AED" />
                            </linearGradient>
                            <linearGradient id="paint1_linear_1001_3" x1="62.4802" y1="11.9181" x2="43.6919"
                                y2="47.2867" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#1A31A7" />
                                <stop offset="1" stop-color="#7C3AED" />
                            </linearGradient>
                            <linearGradient id="paint2_linear_1001_3" x1="4.27748" y1="52.74" x2="44.293" y2="51.0974"
                                gradientUnits="userSpaceOnUse">
                                <stop stop-color="#1A31A7" />
                                <stop offset="1" stop-color="#7C3AED" />
                            </linearGradient>
                            <linearGradient id="paint3_linear_1001_3" x1="68.56" y1="82.2363" x2="47.3853" y2="48.2426"
                                gradientUnits="userSpaceOnUse">
                                <stop stop-color="#1A31A7" />
                                <stop offset="1" stop-color="#7C3AED" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <svg width="180" viewBox="0 0 450 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="g1" x2="1" gradientUnits="userSpaceOnUse"
                                gradientTransform="matrix(0,-92,525,0,263.5,3)">
                                <stop offset="0" stop-color="#2a18b6" />
                                <stop offset=".99" stop-color="#0b0451" />
                                <stop offset="1" stop-color="#0b0451" />
                            </linearGradient>
                        </defs>
                        <style>
                            .t0 {
                                font-size: 100px;
                                fill: url(#g1);
                                font-weight: 900;
                                font-style: italic;
                                font-family: "DejaVuSans-BoldOblique", "DejaVu Sans"
                            }
                        </style>
                        <text id="FinCooP" style="transform: matrix(1,0,0,1,10,108)">
                            <tspan x="0" y="0" class="t0">F</tspan>
                            <tspan y="0" class="t0">i</tspan>
                            <tspan y="0" class="t0">n</tspan>
                            <tspan y="0" class="t0">C</tspan>
                            <tspan y="0" class="t0">o</tspan>
                            <tspan y="0" class="t0">o</tspan>
                            <tspan y="0" class="t0">P</tspan>
                            <tspan y="0" class="t0">
                            </tspan>
                        </text>
                    </svg>
                </div>
            </div>
        </div>
        <form action="menu.php" method="post">
            <div class="bg-gray-200 rounded-b-lg py-12 px-12 shadow-lg">
                <p class="text-center text-sm text-gray-500 font-light">
                    Ingresa Tus Credenciales
                </p>
                <div class="relative mt-3">
                    <input
                        class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600 transition rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline"
                        id="email" type="email" placeholder="Correo" required />
                    <div class="absolute left-0 inset-y-0 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-gray-400 p-1"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                </div>
                <div class="relative mt-3">
                    <input
                        class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600 transition rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline"
                        id="password" type="password" placeholder="Contraseña" />
                    <div class="absolute left-0 inset-y-0 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-gray-400 p-1"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                        </svg>
                    </div>
                    <div class="absolute right-0 inset-y-0 flex items-center">
                        <button type="button" onclick="togglePasswordVisibility()" id="togglePassword">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 mr-3 text-gray-700">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-8">
                    <button
                        class="text-white py-2 px-4 uppercase rounded bg-indigo-500 hover:bg-indigo-600 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Iniciar Sesión
                    </button>
                </div>
            </div>
        </form>
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
</body>

</html>
<?php
require_once "config/app.php";
head();
?>
<div>
    <div id="sidebar" class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/80"></div>

        <div class="fixed inset-0 flex">
            <div class="relative mr-2 flex w-full max-w-60 flex-1">
                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                    <button id="closeSidebar" type="button" class="-m-2.5 p-2.5">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>


                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-indigo-600 px-6 pb-4">
                    <div class="flex h-16 shrink-0 items-center"> FINCOOP
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white"
                            alt="Your Company">
                    </div>
                    <nav class="flex flex-1 flex-col">
                        <ul role="list" class="flex flex-1 flex-col gap-y-7">
                            <li>
                                <ul role="list" class="-mx-2 space-y-1">
                                    <li>
                                        <!-- Current: "bg-indigo-700 text-white", Default: "text-indigo-200 hover:text-white hover:bg-indigo-700" -->
                                        <a href="#"
                                            class="bg-indigo-700 text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                            <svg class="h-6 w-6 shrink-0 text-white" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                            </svg>
                                            Dashboard
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-60 lg:flex-col shadow">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-[#070F2B] shadow-lg px-4 pb-4 ">
            <div class="flex h-16 shrink-0 items-center text-[#EEEDED] border-b font-bold text-[28px] italic">
                <img class="h-8 w-auto pr-2" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company">
                FINCOOP
            </div>
            <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-4">
                    <li>
                        <ul role="list" class="-mx-2 space-y-1">
                            <li class="">
                                <a href="#" class="flex flex-row items-center px-2 py-1 rounded-lg text-gray-800 hover:bg-red-600 shadow bg-red-700">
                                    <span class="flex items-center justify-center text-lg text-gray-100">
                                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                            <path
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="ml-3 text-gray-100">INICIO</span>
                                </a>
                            </li>
                            <li class="">
                                <span class="flex font-medium text-sm text-gray-200 py-2 uppercase border-b border-red-400">MENU</span>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex flex-row items-center py-1 px-1 rounded-lg text-gray-200 hover:bg-blue-600">
                                    <span class="flex items-center justify-center text-lg text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Administracion</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex flex-row items-center py-1 px-1 rounded-lg text-gray-200 hover:bg-blue-600">
                                    <span class="flex items-center justify-center text-lg text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Caja</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex flex-row items-center py-1 px-1 rounded-lg text-gray-200 hover:bg-blue-600">
                                    <span class="flex items-center justify-center text-lg text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                        </svg>
                                    </span>
                                    <span class="ml-3">Creditos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="lg:pl-60">
        <div
            class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
            <button id="openSidebar" type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            <!-- Separator -->
            <div class="h-6 w-px bg-gray-900/10 lg:hidden" aria-hidden="true"></div>
            <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6 items-rigth">
                <div class="flex items-center gap-x-4 lg:gap-x-6">
                    <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-900/10" aria-hidden="true"></div>
                    <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem" tabindex="-1"
                        id="user-menu-item-1">Salir</a>
                </div>
            </div>
        </div>

        <main class="py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                Este en mi contenido jajajaj
            </div>
        </main>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Selecciona los botones y el menú lateral por su ID
        const openSidebarButton = document.getElementById('openSidebar');
        const closeSidebarButton = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');

        // Escucha para el botón de abrir
        openSidebarButton.addEventListener('click', () => {
            sidebar.classList.remove('hidden'); // Muestra el menú
        });

        // Escucha para el botón de cerrar
        closeSidebarButton.addEventListener('click', () => {
            sidebar.classList.add('hidden'); // Oculta el menú
        });
    });
</script>
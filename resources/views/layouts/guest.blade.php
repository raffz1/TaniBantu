<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TaniBantu') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" style="font-family: 'Inter', sans-serif;">
        <!-- Background Image Container -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden bg-green-900">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/bg-sawah.jpg') }}" alt="Background Sawah" class="w-full h-full object-cover" />
            </div>
            
            <!-- Dark Overlay -->
            <div class="absolute inset-0 bg-green-950/60 z-0 backdrop-blur-sm sm:backdrop-blur-none"></div>

            <!-- Content Area (with Animation) -->
            <div class="z-10 w-full flex flex-col items-center animate-fade-in-up px-4 sm:px-0">
                
                <div class="text-center mb-2">
                    <a href="/" class="flex flex-col items-center gap-2 text-white hover:text-green-100 transition duration-300 drop-shadow-md">
                        <x-application-logo class="w-16 h-16 fill-current text-white" />
                        <span class="text-3xl font-extrabold tracking-tight">TaniBantu</span>
                    </a>
                </div>

                <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-2xl overflow-hidden rounded-3xl relative z-10 transition-all hover:shadow-green-900/50">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <style>
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .animate-fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
            }
        </style>
    </body>
</html>

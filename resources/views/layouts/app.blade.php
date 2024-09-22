<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('productForm');
                const loadingOverlay = document.getElementById('loading-overlay');

                // Livewire hook for loading state
                Livewire.on('submit', () => {
                    // Show the loading overlay with GSAP animation
                    gsap.to(loadingOverlay, { opacity: 1, display: 'flex', duration: 0.5 });
                });

                form.addEventListener('submit', function () {
                    // Show the loading overlay with GSAP animation
                    gsap.to(loadingOverlay, { opacity: 1, display: 'flex', duration: 0.5 });
                });

                Livewire.hook('message.processed', (message, component) => {
                    if (message.updateQueue[0].payload.event === 'store') {
                        // Hide the loading overlay after form submission
                        gsap.to(loadingOverlay, { opacity: 0, display: 'none', duration: 0.5 });
                    }
                });
            });

        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
    </body>
</html>

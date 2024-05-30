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

         <!-- Links -->
         <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer class="bg-deep-blue text-white text-center p-4">
                <div class="container mx-auto">
                    <p>&copy; 2024 ShuttleGo. All rights reserved.</p>
                    <div class="flex justify-center space-x-4 mt-2">
                        <a href="#privacy-policy" class="hover:text-gray-300">Privacy Policy</a>
                        <a href="#terms-of-service" class="hover:text-gray-300">Terms of Service</a>
                        <a href="#contact-us" class="hover:text-gray-300">Contact Us</a>
                    </div>
                    <p class="mt-2">Follow us on social media</p>
                    <div class="flex justify-center space-x-4 mt-2">
                        <a href="your_facebook_link" class="hover:text-gray-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="your_twitter_link" class="hover:text-gray-300"><i class="fab fa-twitter"></i></a>
                        <a href="your_instagram_link" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        @stack('modals')

        @livewireScripts
    </body>
</html>

<!-- Tailwind CSS Navbar -->
<nav class="bg-deep-blue p-2 text-white">
    <div class="flex items-center justify-between flex-wrap">
        <!-- Logo and Brand Name -->
        <div class="flex items-center flex-shrink-0 mr-6">
            <img src="{{ asset('images/Shuttlego.png') }}" alt="Shuttle Logo" class="h-10">
            <span class="font-semibold text-xl tracking-tight">ShuttleGo</span>
        </div>

        <!-- Hamburger Menu Button (for smaller screens) -->
        <div class="block lg:hidden">
            <button id="navbarToggle" class="flex items-center px-3 py-2 border rounded text-white border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z"/>
                </svg>
            </button>
        </div>

        <!-- Navbar Links -->
        <div id="navbarMenu" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden">
            <div class="text-sm lg:flex-grow">
                <a href="#home" class="block mt-1 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                    Home
                </a>
                <a href="#book-a-ride" class="block mt-1 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                    Book a Ride
                </a>
                <a href="#about-us" class="block mt-1 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                    About Us
                </a>
                <a href="#contact-us" class="block mt-1 lg:inline-block lg:mt-0 text-white hover:text-white">
                    Contact Us
                </a>
            </div>
            <!-- Authentication Links -->
            <div>
                @auth
                <!-- Dropdown for User Profile -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="flex items-center text-sm rounded-full text-white focus:outline-none transition">
                                    {{ Auth::user()->name }}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.05 5.05a7.5 7.5 0 0110.9 0 7.5 7.5 0 010 10.9 7.5 7.5 0 01-10.9 0 7.5 7.5 0 010-10.9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Dashboard Link -->
                            <x-dropdown-link href="{{ url('/dashboard') }}">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>

                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Auth::user()->role === \App\Enums\Role::Admin)
                                <!-- Manage Users -->
                                <div class="border-t border-gray-100"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Users') }}
                                </div>

                                <x-dropdown-link href="{{ route('user.index') }}">
                                    {{ __('Users') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('vehicle-categories.index') }}">
                                    {{ __('Vehicle Categories') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('vehicles.index') }}">
                                    {{ __('Vehicles') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @else
                <!-- Log in and Register Links -->
                <a href="{{ route('login') }}" class="block mt-1 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block mt-1 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                        Register
                    </a>
                @endif
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Include plain JavaScript for the toggle functionality -->
<script>
    document.getElementById('navbarToggle').addEventListener('click', function () {
        var navbarMenu = document.getElementById('navbarMenu');
        if (navbarMenu.classList.contains('hidden')) {
            navbarMenu.classList.remove('hidden');
        } else {
            navbarMenu.classList.add('hidden');
        }
    });
</script>

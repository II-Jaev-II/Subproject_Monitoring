<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subproject Monitoring</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/darkMode.js') }}"></script>
</head>

<body class="font-sans antialiased dark:bg-gray-900 dark:text-white/50 flex flex-col min-h-screen">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <nav x-data="{ open: false }"
            class="bg-lime-600 dark:bg-green-900 border-b border-lime-500 dark:border-green-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('images/prdp_logo.png') }}" class="h-12 sm:h-16" alt="PRDP Logo">
                    </div>
                    <div class="flex items-center space-x-2 sm:space-x-4">
                        @if (Route::has('login'))
                            @auth
                                @php
                                    $dashboardRoutes = [
                                        'IBUILD' => '/ibuild/dashboard',
                                        'IPLAN' => '/iplan/dashboard',
                                        'ECON' => '/econ/dashboard',
                                        'GGU' => '/ggu/dashboard',
                                        'SES' => '/ses/dashboard',
                                        'IREAP' => '/ireap/dashboard',
                                        'ADMIN' => '/admin/dashboard',
                                    ];
                                    $userType = Auth::user()->userType ?? null;
                                    $dashboardUrl =
                                        $userType && isset($dashboardRoutes[$userType])
                                            ? $dashboardRoutes[$userType]
                                            : '/default/dashboard';
                                @endphp
                                <a href="{{ url($dashboardUrl) }}"
                                    class="text-sm sm:text-base px-2 py-1 sm:px-4 sm:py-2 text-white rounded-md bg-lime-700 hover:bg-lime-800">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-sm sm:text-base px-2 py-1 sm:px-4 sm:py-2 text-white rounded-md bg-lime-700 hover:bg-lime-800">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="text-sm sm:text-base px-2 py-1 sm:px-4 sm:py-2 text-white rounded-md bg-lime-700 hover:bg-lime-800">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                        <button id="theme-toggle" type="button"
                            class="text-gray-300 dark:text-yellow-300 hover:text-gray-100 hover:dark:text-yellow-200 focus:outline-none rounded-lg text-sm p-2.5">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <main class="flex-grow flex flex-col justify-center items-center text-center px-4 sm:px-8 lg:px-20">
        <div class="relative flex flex-col items-center gap-4">
            <h2 class="text-3xl sm:text-5xl lg:text-6xl uppercase font-bold dark:text-gray-200">Philippine Rural
                Development Project</h2>
            <h2 class="text-4xl sm:text-6xl lg:text-8xl uppercase font-bold text-yellow-500">
                Subproject <span class="text-green-500">Monitoring</span>
            </h2>
            <p class="text-base sm:text-lg lg:text-xl italic text-black dark:text-gray-200">
                Designed to simplify and streamline the validation process, making subproject tracking
                more efficient, accurate, and user-friendly.
            </p>
            <a href="{{ route('register') }}"
                class="inline-block px-4 py-2 sm:px-6 sm:py-3 font-medium group relative text-lg sm:text-xl">
                <span
                    class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-green-500 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span
                    class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-green-500"></span>
                <span class="relative text-black group-hover:text-white">Get Started</span>
            </a>
        </div>
    </main>

    <footer class="dark:bg-gray-900 bg-white dark:text-white text-black font-semibold py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
            <p class="text-sm sm:text-base text-center">
                &copy; {{ date('Y') }} Philippine Rural Development Project RPCO1. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="{{ asset('js/darkModeToggle.js') }}"></script>
</body>

</html>

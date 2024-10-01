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

    <script src="{{asset('js/darkMode.js')}}"></script>
</head>

<body class="font-sans antialiased dark:bg-gray-900 dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class=" selection:bg-[#FF2D20] selection:text-white">
            <nav x-data="{ open: false }" class="bg-lime-900 dark:bg-green-900 border-b border-lime-500 dark:border-green-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('images/prdp_logo.png') }}" class="h-16" alt="PRDP Logo">
                            <label for="trackingSystem" class="text-slate-300 dark:text-slate-300">Subproject Monitoring</label>
                        </div>
                        @if (Route::has('login'))
                        <nav class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-2 py-2 text-slate-300 ring-1 ring-transparent transition hover:text-slate-100 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-slate-300 dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-2 py-2 text-slate-300 ring-1 ring-transparent transition hover:text-slate-100 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-slate-300 dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-2 py-2 text-slate-300 ring-1 ring-transparent transition hover:text-slate-100 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-slate-300 dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Register
                                    </a>
                                @endif
                            @endauth
                            <button id="theme-toggle" type="button" class="text-gray-300 dark:text-yellow-300 hover:text-gray-100 hover:dark:text-yellow-200 focus:outline-none rounded-lg text-sm p-2.5">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                            </button>
                        </nav>
                    @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <script src="{{ asset('js/darkModeToggle.js') }}"></script>
</body>

</html>

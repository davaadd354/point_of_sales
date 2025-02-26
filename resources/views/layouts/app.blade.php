<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- sweetalert2  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Select2 JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- sweetalert2  --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/db2715b540.js" crossorigin="anonymous"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100" x-data="{ sidebarOpen: true }">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside 
            class="bg-white shadow-xl text-gray-800 fixed inset-y-0 left-0 transform transition-all duration-300 ease-in-out z-10 flex flex-col"
            :class="{'translate-x-0 w-64': sidebarOpen, '-translate-x-full w-0 hidden': !sidebarOpen}"
        >
            <div class="flex items-center justify-center h-16 border-b border-gray-200">
                <h1 class="text-xl font-bold text-gray-800">NOTUS NEXTJS</h1>
            </div>
            <nav class="flex-1 overflow-y-auto p-4">
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 bg-gray-200 rounded-lg">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-3 mt-2 text-gray-600 rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Settings
                </a>
                <a href="#" class="flex items-center px-4 py-3 mt-2 text-gray-600 rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                    Tables
                </a>
                <a href="#" class="flex items-center px-4 py-3 mt-2 text-gray-600 rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    Maps
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 transition-all duration-300 ease-in-out" :class="{'md:ml-64': sidebarOpen}">
            <!-- Responsive Navbar -->
            <nav class="bg-white shadow-lg mb-8" x-data="{ mobileMenuOpen: false, profileOpen: false }">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="flex justify-between h-16">
                        <!-- Left side -->
                        <div class="flex items-center">
                            <!-- Sidebar Toggle Button -->
                            <button 
                                @click="sidebarOpen = !sidebarOpen" 
                                class="mr-4 p-2 rounded-lg text-gray-600 hover:bg-gray-100 focus:outline-none transition-colors duration-200"
                            >
                                <svg 
                                    class="w-6 h-6" 
                                    :class="{'rotate-180': sidebarOpen}"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>

                        <!-- Right side - Desktop -->
                        <div class="hidden md:flex items-center space-x-4">
                            <!-- Notifications -->
                            <button class="p-2 text-gray-600 hover:text-gray-800 rounded-lg hover:bg-gray-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                            </button>

                            <!-- Profile Dropdown -->
                            <div class="relative">
                                <button @click="profileOpen = !profileOpen" class="flex items-center space-x-3 bg-white rounded-lg p-2 hover:bg-gray-100 focus:outline-none">
                                    <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="User avatar">
                                    <div class="text-left hidden md:block">
                                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <!-- Profile Dropdown menu -->
                                <div x-show="profileOpen" 
                                     @click.away="profileOpen = false"
                                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-20">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Profile Settings
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Sign Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile menu button -->
                        <div class="md:hidden flex items-center">
                            <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-100 focus:outline-none">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Mobile menu -->
                    <div x-show="mobileMenuOpen" class="md:hidden pb-3">
                        <div class="pt-2 pb-3 space-y-1">
                            <button class="flex items-center w-full px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-md">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                                Notifications
                            </button>
                            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-md">
                                Profile Settings
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-md">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <div id="content" class="p-5">
                {{ $slot }}
            </div>

            <script>
                $(document).ready(function () {
                    // message
                    var errorMessage = '{{ Session::get("error") }}';
                    if (errorMessage) {
                        Swal.fire({
                            icon: 'warning',
                            title: errorMessage
                        });
                    }
                    var successMessage = '{{ Session::get("success") }}';
                    if (successMessage) {
                        Swal.fire({
                            icon: 'success',
                            title: successMessage
                        });
                    }
                });
            </script>
        </main>
    </div>
</body>
</html>

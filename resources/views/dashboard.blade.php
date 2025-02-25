<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100" x-data="{ sidebarOpen: true }">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar Toggle Button (visible on all screens) -->
        <button 
            @click="sidebarOpen = !sidebarOpen" 
            class="fixed top-4 left-4 z-20 p-2 rounded-lg bg-white shadow-lg hover:bg-gray-100 focus:outline-none transition-colors duration-200"
            :class="{'left-4': !sidebarOpen, 'left-64': sidebarOpen}"
        >
            <svg 
                class="w-6 h-6 text-gray-600" 
                :class="{'rotate-180': !sidebarOpen}"
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>

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
        <main class="flex-1 p-4 md:p-8 transition-all duration-300 ease-in-out" :class="{'md:ml-64': sidebarOpen}">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold mb-4 md:mb-0">DASHBOARD</h2>
                <div class="relative w-full md:w-64">
                    <input type="text" placeholder="Search here..." class="w-full bg-white rounded-full py-2 px-4 pl-10">
                    <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-4 md:p-6">
                    <h3 class="text-gray-500 text-sm uppercase mb-2">TRAFFIC</h3>
                    <p class="text-2xl md:text-3xl font-semibold">350,897</p>
                    <p class="text-green-500 text-sm mt-2">
                        <span class="font-bold">3.48%</span> Since last month
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 md:p-6">
                    <h3 class="text-gray-500 text-sm uppercase mb-2">NEW USERS</h3>
                    <p class="text-2xl md:text-3xl font-semibold">2,356</p>
                    <p class="text-red-500 text-sm mt-2">
                        <span class="font-bold">3.48%</span> Since last week
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 md:p-6">
                    <h3 class="text-gray-500 text-sm uppercase mb-2">SALES</h3>
                    <p class="text-2xl md:text-3xl font-semibold">924</p>
                    <p class="text-red-500 text-sm mt-2">
                        <span class="font-bold">1.10%</span> Since yesterday
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 md:p-6">
                    <h3 class="text-gray-500 text-sm uppercase mb-2">PERFORMANCE</h3>
                    <p class="text-2xl md:text-3xl font-semibold">49,65%</p>
                    <p class="text-green-500 text-sm mt-2">
                        <span class="font-bold">12%</span> Since last month
                    </p>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
                <div class="bg-white rounded-lg shadow p-4 md:p-6">
                    <h3 class="text-xl font-semibold mb-4">Sales value</h3>
                    <!-- Placeholder for chart -->
                    <div class="h-48 md:h-64 bg-gray-200 rounded"></div>
                </div>
                <div class="bg-white rounded-lg shadow p-4 md:p-6">
                    <h3 class="text-xl font-semibold mb-4">Total orders</h3>
                    <!-- Placeholder for chart -->
                    <div class="h-48 md:h-64 bg-gray-200 rounded"></div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

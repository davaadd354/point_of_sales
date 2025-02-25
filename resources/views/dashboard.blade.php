<x-app-layout>
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
</x-app-layout>
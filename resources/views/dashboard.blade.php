<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
                    <h2 class="text-lg font-bold text-gray-700 dark:text-white">
                        Total Asset
                    </h2>

                    <p class="text-4xl font-bold text-blue-500 mt-4">
                        {{ $totalAsset }}
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
                    <h2 class="text-lg font-bold text-gray-700 dark:text-white">
                        Asset Aktif
                    </h2>

                    <p class="text-4xl font-bold text-green-500 mt-4">
                        {{ $assetAktif }}
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
                    <h2 class="text-lg font-bold text-gray-700 dark:text-white">
                        Asset Rusak
                    </h2>

                    <p class="text-4xl font-bold text-red-500 mt-4">
                        {{ $assetRusak }}
                    </p>
                </div>

            </div>

            <!-- Tombol -->
            <div class="mt-8 flex gap-4">

                <a href="{{ route('assets.index') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl shadow">

                    Kelola Asset

                </a>

                <a href="{{ route('assets.create') }}"
                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl shadow">

                    Tambah Asset

                </a>

            </div>

            <!-- Chart -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow mt-8">

                <h2 class="text-xl font-bold mb-4 text-gray-700 dark:text-white">
                    Statistik Asset
                </h2>

                <canvas id="assetChart"></canvas>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const ctx = document.getElementById('assetChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Aktif', 'Rusak'],
                datasets: [{
                    data: [
                        {{ $assetAktif }},
                        {{ $assetRusak }}
                    ]
                }]
            }
        });

    </script>

</x-app-layout>
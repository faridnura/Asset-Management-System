<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Asset
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('assets.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label>Kode Asset</label>
                        <input type="text" name="kode_asset"
                            class="w-full rounded-lg border-gray-300">
                    </div>

                    <div class="mb-4">
                        <label>Nama Asset</label>
                        <input type="text" name="nama_asset"
                            class="w-full rounded-lg border-gray-300">
                    </div>

                    <div class="mb-4">
                        <label>Kategori</label>
                        <input type="text" name="kategori"
                            class="w-full rounded-lg border-gray-300">
                    </div>

                    <div class="mb-4">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi"
                            class="w-full rounded-lg border-gray-300">
                    </div>

                    <div class="mb-4">
                        <label>Kondisi</label>
                        <select name="kondisi"
                            class="w-full rounded-lg border-gray-300">

                            <option value="Aktif">Aktif</option>
                            <option value="Rusak">Rusak</option>

                        </select>
                    </div>

                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg">

                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Asset
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('assets.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg">

                Tambah Asset
            </a>

            <div class="bg-white shadow rounded-lg mt-6 overflow-hidden">

                <table class="min-w-full">

                    <thead class="bg-gray-100">

                        <tr>
                            <th class="p-4 text-left">Kode</th>
                            <th class="p-4 text-left">Nama</th>
                            <th class="p-4 text-left">Kategori</th>
                            <th class="p-4 text-left">Lokasi</th>
                            <th class="p-4 text-left">Kondisi</th>
                            <th class="p-4 text-left">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($assets as $asset)

                        <tr class="border-b">

                            <td class="p-4">{{ $asset->kode_asset }}</td>
                            <td class="p-4">{{ $asset->nama_asset }}</td>
                            <td class="p-4">{{ $asset->kategori }}</td>
                            <td class="p-4">{{ $asset->lokasi }}</td>
                            <td class="p-4">{{ $asset->kondisi }}</td>

                            <td class="p-4 flex gap-2">

                                <a href="{{ route('assets.edit', $asset->id) }}"
                                    class="bg-yellow-400 px-3 py-1 rounded">

                                    Edit
                                </a>

                                <form action="{{ route('assets.destroy', $asset->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>
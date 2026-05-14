<x-app-layout>

<form action="{{ route('assets.update', $asset->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <input type="text"
        name="kode_asset"
        value="{{ $asset->kode_asset }}">

    <input type="text"
        name="nama_asset"
        value="{{ $asset->nama_asset }}">

    <input type="text"
        name="kategori"
        value="{{ $asset->kategori }}">

    <input type="text"
        name="lokasi"
        value="{{ $asset->lokasi }}">

    <select name="kondisi">

        <option value="Aktif">Aktif</option>
        <option value="Rusak">Rusak</option>

    </select>

    <button type="submit">
        Update
    </button>

</form>

</x-app-layout>
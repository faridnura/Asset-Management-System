<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::all();
        return view('assets.index', compact('assets'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Asset::create([
            'kode_asset' => $request->kode_asset,
            'nama_asset' => $request->nama_asset,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'kondisi' => $request->kondisi,
        ]);
    
        return redirect()->route('assets.index')
            ->with('success', 'Asset berhasil ditambahkan');//
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $asset->update([
            'kode_asset' => $request->kode_asset,
            'nama_asset' => $request->nama_asset,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'kondisi' => $request->kondisi,
        ]);
    
        return redirect()->route('assets.index');//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('assets.index');//
    }
}

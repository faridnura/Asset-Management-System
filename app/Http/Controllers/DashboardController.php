<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class DashboardController extends Controller
{
    

public function index()
{
    $totalAsset = Asset::count();
    $assetRusak = Asset::where('kondisi', 'Rusak')->count();
    $assetAktif = Asset::where('kondisi', 'Aktif')->count();

    return view('dashboard', compact(
        'totalAsset',
        'assetRusak',
        'assetAktif'
    ));
}//
}

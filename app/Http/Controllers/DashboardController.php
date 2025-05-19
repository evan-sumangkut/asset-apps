<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Ruangan;
use App\Models\Petugas;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['total_asset'] = Asset::all()->count();
        $data['asset_bagus'] = Asset::where('status',1)->count();
        $data['asset_rusak'] = Asset::where('status',2)->count();
        $data['asset_mati'] = Asset::where('status',3)->count();
        $data['total_ruangan'] = Ruangan::all()->count();
        $data['total_petugas'] = Petugas::all()->count();
        return view('dashboard')->with($data);
    }

}

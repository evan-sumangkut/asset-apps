<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Asset;

class PreviewController extends Controller
{
    public function __construct()
    {
    }

    public function index($id)
    {
        $data['ruangan'] = Ruangan::where('id',$id)->firstOrFail();
        $data['data'] = Asset::where('ruangan_id',$id)->orderBy('nama','asc')->get();
        return view('preview.view')->with($data);
    }
}

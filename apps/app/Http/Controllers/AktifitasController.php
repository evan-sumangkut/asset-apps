<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aktifitas;

class AktifitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['data'] = Aktifitas::with(['asset'])->orderBy('tanggal','desc')->get();
        return view('aktifitas.view')->with($data);
    }
}

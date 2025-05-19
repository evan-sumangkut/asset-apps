<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['data'] = Petugas::orderBy('nama','asc')->get();
        return view('petugas.view')->with($data);
    }

    public function create(Request $request)
    {
      $request->validate([
        'nama'=>'required',
        'keterangan'=>'max:255'
      ]);
      $input = $request->all();
      try {
        Petugas::create($input);
        return redirect()->back()->with('success','Data berhasil ditambahkan');
      } catch(\Execption $e) {
        return redirect()->back()->with('error','Error: '.$e->getMessage());
      }
    }

    public function delete(Request $request)
    {
      $input = $request->all();
      try {
        $id = $input['delete_id'];
        Petugas::whereId($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
      } catch(\Execption $e) {
        return redirect()->back()->with('error','Error: '.$e->getMessage());
      }
    }

    public function update(Request $request)
    {
      $request->validate([
        'nama'=>'required',
        'keterangan'=>'max:255'
      ]);
      $input = $request->all();
      try {
        $id = $input['edit_id'];
        $data = Petugas::whereId($id)->firstOrFail();
        $data->update($input);
        return redirect()->back()->with('success','Data berhasil diperbarui');
      } catch(\Execption $e) {
        return redirect()->back()->with('error','Error: '.$e->getMessage());
      }
    }




}

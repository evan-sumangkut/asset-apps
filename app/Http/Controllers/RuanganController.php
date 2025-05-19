<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Asset;

class RuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['data'] = Ruangan::orderBy('nama','asc')->get();
        return view('ruangan.view')->with($data);
    }

    public function create(Request $request)
    {
      $request->validate([
        'nama'=>'required',
        'keterangan'=>'max:255'
      ]);
      $input = $request->all();
      try {
        Ruangan::create($input);
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
        if(Asset::where('ruangan_id',$id)->count()){
          return redirect()->back()->with('error','Gagal dihapus, terdapat relasi data');
        }
        Ruangan::whereId($id)->delete();
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
        $data = Ruangan::whereId($id)->firstOrFail();
        $data->update($input);
        return redirect()->back()->with('success','Data berhasil diperbarui');
      } catch(\Execption $e) {
        return redirect()->back()->with('error','Error: '.$e->getMessage());
      }
    }

    public function qrcode(Request $request,$id)
    {
      $data['data'] = Ruangan::whereId($id)->firstOrFail();
      $name_file = 'qrcode/'.$id.'.png';
      $url_qrcode = $request->getSchemeAndHttpHost().'/preview/'.$id;
      \QrCode::size(500)
            ->format('png')
            ->generate($url_qrcode, public_path($name_file));
      $data['qrcode'] = $name_file;
      return view('ruangan.qrcode')->with($data);
    }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Ruangan;
use App\Models\Petugas;
use App\Models\Aktifitas;
use DB;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['data'] = Asset::with(['ruangan','petugas'])->orderBy('nama','asc')->get();
        $data['ruangan'] = Ruangan::all();
        $data['petugas'] = Petugas::all();
        return view('asset.view')->with($data);
    }

    public function create(Request $request)
    {
      $request->validate([
        'nama'=>'required',
        'keterangan'=>'max:255',
        'kode'=>'required|unique:asset'
      ]);
      $input = $request->all();
      try {
        Asset::create($input);
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
        Asset::whereId($id)->delete();
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
        $data = Asset::whereId($id)->firstOrFail();
        $data->update($input);
        return redirect()->back()->with('success','Data berhasil diperbarui');
      } catch(\Execption $e) {
        return redirect()->back()->with('error','Error: '.$e->getMessage());
      }
    }

    public function aktifitas($id)
    {
        $data['data'] = Asset::with(['ruangan','petugas'])->where('id',$id)->firstOrFail();
        $data['ruangan'] = Ruangan::all();
        $data['petugas'] = Petugas::all();
        $data['aktifitas'] = Aktifitas::with(['asset'])->where('asset_id',$id)->orderBy('tanggal','desc')->get();
        return view('asset.aktifitas')->with($data);
    }

    public function aktifitas_create(Request $request)
    {
      $request->validate([
        'keterangan'=>'max:255'
      ]);
      $input = $request->all();
      try {
        DB::beginTransaction();
        $asset = Asset::where('id',$input['id'])->firstOrFail();
        $asset->update(['status'=>$input['status']]);
        $input['asset_id'] = $input['id'];
        Aktifitas::create($input);
        DB::commit();
        return redirect()->back()->with('success','Data berhasil ditambahkan');
      } catch(\Execption $e) {
        DB::rollback();
        return redirect()->back()->with('error','Error: '.$e->getMessage());
      }
    }




}

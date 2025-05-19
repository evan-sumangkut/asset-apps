<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'asset';
    protected $fillable = [
        'kode','nama','keterangan','tanggal_beli','status','ruangan_id','petugas_id'
    ];

    public function ruangan()
    {
        return $this->hasOne(Ruangan::class, 'id', 'ruangan_id');
    }

    public function petugas()
    {
        return $this->hasOne(Petugas::class, 'id', 'petugas_id');
    }

    public function check_aktifitas()
    {
        $aktifitas = Aktifitas::where('asset_id',$this->id)->count();
        if($aktifitas > 0){
          return false;
        }else{
          return true;
        }
    }
}

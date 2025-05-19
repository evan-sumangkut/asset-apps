<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $fillable = [
        'nama','keterangan'
    ];

    public function jumlah_asset()
    {
      $total_asset = Asset::where('ruangan_id',$this->id)->count();
      return $total_asset;
    }
}

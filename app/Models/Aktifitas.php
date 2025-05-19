<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aktifitas extends Model
{
    protected $table = 'aktifitas';
    protected $fillable = [
        'asset_id','keterangan','status','tanggal'
    ];

    public function asset()
    {
        return $this->hasOne(Asset::class, 'id', 'asset_id');
    }
}

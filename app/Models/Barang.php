<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'foto_barang',
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'stok'
    ];
    // App\Models\Barang.php
    public function getFotoUrlAttribute()
    {
        return !empty($this->foto_barang)
            ? url('image/' . $this->foto_barang)
            : url('image/nophoto.jpg');
    }


}



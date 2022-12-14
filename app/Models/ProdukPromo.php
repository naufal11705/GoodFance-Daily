<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukPromo extends Model
{
    protected $table = 'produk_promo';
    protected $fillable = [
        'produk_id',
        'harga_awal',
        'harga_akhir',
        'diskon_persen',
        'diskon_nominal',
        'user_id',
    ];

    public function produk() {
        return $this->belongsTo('App\Models\Produk');
    }

    public function user() {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
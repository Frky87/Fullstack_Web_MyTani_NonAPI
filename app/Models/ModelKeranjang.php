<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKeranjang extends Model
{
    use HasFactory;

    protected $table = 'tb_keranjang';
    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
    ];

    // Relasi dengan model Produk
    public function produk()
    {
        return $this->belongsTo(ModelProduk::class, 'produk_id');
    }
}

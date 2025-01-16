<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProduk extends Model
{
    use HasFactory;

    protected $table = 'tb_produk'; // Sesuaikan dengan nama tabel

    protected $fillable = [
        'id_user',           // ID user (seller)
        'product_name',      // Nama produk
        'category',          // Kategori
        'product_price',     // Harga produk
        'product_desc',      // Deskripsi produk
        'product_img',       // Gambar produk
        'product_stock',     // Stok produk
        'sales',            // Jumlah penjualan
    ];

    public function payment()
    {
        return $this->hasOne(ModelPayment::class, 'productId','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPayment extends Model
{
    use HasFactory;

    protected $table = 'tb_payment'; // Nama tabel

    protected $fillable = [
        'user_id',
        'productId',
        'quantity',
        'payment_method',
        'payment_status',
        'payment_date',
        'total_paid',
        'status',
    ];

    /**
     * Relasi ke tabel users
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function keranjang()
    {
        return $this->hasMany(ModelKeranjang::class, 'payment_id');
    }

    public function product()
    {
        return $this->belongsTo(ModelProduk::class, 'productId', 'id');
    }
}

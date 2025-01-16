<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\ModelPayment;
use App\Models\ModelProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        // Menggunakan method count() langsung dari model tanpa menyebutkan nama tabel
        $jumlahProduk = ModelProduk::where('id_user', $user->id)->count();

        // Menghitung jumlah pesanan yang terkait dengan produk milik user
        $pesanan = ModelPayment::whereHas('product', function ($query) use ($user) {
            $query->where('id_user', $user->id); // Produk milik user
        })->count();
        
        return view('seller.dashboard.dashboard', compact('jumlahProduk', 'pesanan'));
    }
}

<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\ModelProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class DaftarProdukController extends Controller
{
    public function index()
    {
        // Ambil semua produk berdasarkan id_user yang sesuai (jika seller login)
        $produk = ModelProduk::where('id_user', auth()->id())->get();

        return view('seller.daftarProduk.daftarProduk', compact('produk'));
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelProduk;
use Illuminate\Http\Request;

class DetailProdukController extends Controller
{
    public function show($id)
    {
        // Ambil data produk berdasarkan ID
        $produk = ModelProduk::find($id);

        // Jika produk tidak ditemukan, tampilkan error 404
        if (!$produk) {
            abort(404, 'Produk tidak ditemukan');
        }

        // Kembalikan view dengan data produk
        return view('user.detailProduk.detailProduk', compact('produk'));
    }
}

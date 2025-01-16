<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelProduk; // Pastikan model produk sudah diimport
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua produk dari tabel tb_produk
        $produk = ModelProduk::all();

        // Mengirim data produk ke view
        return view('user.home.home', compact('produk'));
    }
}

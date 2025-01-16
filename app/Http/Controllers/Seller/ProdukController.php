<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\ModelPayment;
use App\Models\ModelProduk;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{

    public function create()
    {
        return view('seller.tambahProduk.tambahProduk');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255', // Kategori sebagai string
            'product_price' => 'required|numeric|min:0',
            'product_stock' => 'required|integer|min:1',
            'product_desc' => 'required|string',
            'sales' => 'nullable'
        ]);

        try {
            // Upload foto
            if ($request->hasFile('product_img')) {
                $file = $request->file('product_img');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/produk'), $fileName);
                
                // Simpan data produk ke tabel tb_produk
                ModelProduk::create([
                    'id_user' => Auth::id(),                   // ID seller (user yang login)
                    'product_name' => $request->product_name, // Nama produk
                    'category' => $request->category,     // Kategori
                    'product_price' => $request->product_price, // Harga produk
                    'product_desc' => $request->product_desc, // Deskripsi
                    'product_img' => $fileName,                     // Path gambar
                    'product_stock' => $request->product_stock, // Stok
                ]);
                //Redirect dengan pesan sukses
                return redirect()->route('seller.daftarProduk')->with('success', 'Produk berhasil ditambahkan!');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('seller.tambahProduk')->with('error', 'An error occurred. Please try again.');
        }
    
    }
    public function buyAgain($orderId)
    {
        $payment = ModelPayment::where('user_id', Auth::id())->where('id', $orderId)->first();
        if ($payment) {
            // Logic to redirect user to shopping cart or directly add products to cart
            return redirect()->route('user.cart.add', ['products' => $payment->keranjang->pluck('product_id')]);
        }

        return redirect()->route('user.pesanan')->with('error', 'Pesanan tidak ditemukan.');
    }
}

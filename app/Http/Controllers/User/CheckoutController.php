<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelKeranjang;
use App\Models\ModelProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index(Request $request)
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Cek apakah ada data produk langsung dari "Beli Sekarang"
        $directCheckout = $request->session()->get('directCheckout');
        $cart = [];

        if ($directCheckout) {
            // Jika ada data direct checkout
            $cart[] = [
                'jumlah' => $directCheckout['jumlah'],
                'produk' => ModelProduk::find($directCheckout['product_id']),
            ];
            // Reset session directCheckout agar tidak disimpan secara permanen
            $request->session()->forget('directCheckout');
        } else {
            // Jika tidak ada, ambil data keranjang user dari database
            $cart = ModelKeranjang::with('produk')->where('user_id', $user->id)->get();
        }

        // Pastikan $cart diubah menjadi koleksi sebelum menggunakan map()
        $productData = collect($cart)->map(function ($item) {
            return [
                'id' => $item['produk']['id'] ?? null,  
                'image' => $item['produk']['product_img'] ?? null, // Gunakan array akses jika $cart berasal dari array
                'name' => $item['produk']['product_name'] ?? null,
                'price' => $item['produk']['product_price'] ?? null,
                'quantity' => $item['jumlah'] ?? 0,
            ];
        })->toArray();

        // Simpan data produk ke session
        $request->session()->put('productData', $productData);
    
        // Hitung total harga
        $totalPrice = collect($cart)->sum(function ($item) {
            return $item['jumlah'] * $item['produk']->product_price;
        });
        
        $shippingFee = 20000;
        $adminFee = 2000;
        $finalTotal = $totalPrice + $shippingFee + $adminFee;
    
        // Simpan total belanja ke session
        $request->session()->put('finalTotal', $finalTotal);

        // Ambil alamat pengiriman user
        $address = $user->address;
    
        // Kirim data ke view
        return view('user.checkout.checkout', compact('cart', 'totalPrice', 'address'));
    }


    public function directCheckout(Request $request) {
        $request->validate([
            'product_id' => 'required|',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $product = ModelProduk::find($request->product_id);

        if ($product->product_stock < $request->quantity) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok yang tersedia.');
        }

        $request->session()->put('directCheckout', [
            'product_id' => $request->product_id,
            'jumlah' => $request->quantity,
        ]);
    
        return redirect()->route('checkout');
    }
}

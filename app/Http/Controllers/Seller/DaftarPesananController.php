<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\ModelPayment;
use App\Models\ModelProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarPesananController extends Controller
{
    public function index()
    {
        // Mengambil pesanan yang melibatkan produk milik seller
        $user = Auth::user();
        $pesanan = ModelPayment::with('product')
        ->whereHas('product', function ($query) use ($user) {
            $query->where('id_user', $user->id); // Filter berdasarkan id_user
        })
        ->orderBy('created_at', 'desc')
        ->get();

        return view('seller.daftarPesanan.daftarPesanan', compact('pesanan', 'user'));
    } 

    public function updateStatus($id) {

        $pesanan = ModelPayment::find($id);


        if ($pesanan->status == 0) {
            $pesanan->status = 1;

            $pesanan->product->product_stock -= $pesanan->quantity;
            $pesanan->product->sales += $pesanan->quantity;
            $pesanan->product->save();

        } elseif ($pesanan->status == 1) {
            $pesanan->status = 2;
        }

        
        $pesanan->save();

        return redirect()->route('seller.daftarPesanan')->with('success', 'Status pesanan berhasil diubah.');
    }
}

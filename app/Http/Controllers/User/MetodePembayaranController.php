<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelKeranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MetodePembayaranController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Ambil data barang 
        $cart = $request->session()->get('productData', []);

        // Ambil total belanja dari session
        $finalTotal = $request->session()->get('finalTotal', 0);

        // Kirim data ke view
        return view('user.metodePembayaran.metodePembayaran', compact('cart',  'finalTotal'));
    }

    public function processOrder(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string|in:bank_transfer,e_wallet,credit_card',
        ]);

        $user = Auth::user();

        // Ambil data keranjang user
        $cart = ModelKeranjang::where('user_id', $user->id)->get();

        // Hitung total harga
        $finalTotal = $request->session()->get('finalTotal', 0);

        // Simpan pembayaran ke database (buat model `Payment` jika diperlukan)
        /*
        Payment::create([
            'user_id' => $user->id,
            'total_amount' => $finalTotal,
            'payment_method' => $request->payment_method,
            'status' => 'pending', // Status awal pembayaran
        ]);
        */

        return redirect()->route('checkout.payment')->with('success', 'Pembayaran berhasil dilakukan.');
    }
}

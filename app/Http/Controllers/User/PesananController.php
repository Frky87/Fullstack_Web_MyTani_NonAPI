<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelPayment;
use App\Models\ModelProduk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $product = ModelProduk::all();

        $pesanan = ModelPayment::with('product')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('user.pesanan.pesanan', compact('pesanan', 'product'));
    }

    public function updatePaymentStatus($orderId, Request $request)
    {
        // Pastikan hanya user yang bersangkutan yang bisa mengupdate statusnya
        $payment = ModelPayment::where('user_id', Auth::id())->where('id', $orderId)->first();

        if ($payment && $payment->payment_status !== 'Berhasil') {
            $payment->payment_status = $request->payment_status;
            $payment->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function updatePackage($id) {
        $pesanan = ModelPayment::find($id);

        if($pesanan->status == 2) {
            $pesanan->status = 3;
        }

        $pesanan->save();

        return redirect()->route('user.pesanan')->with('success', 'Paket telah diterima');
    }
}

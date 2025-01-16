<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelKeranjang;
use App\Models\ModelPayment;
use App\Models\Payment; // Pastikan model Payment sudah dibuat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment($id)
    {
        $user = Auth::user();

        // Ambil data pembayaran terbaru user
        $payment = ModelPayment::where('id', $id)
        ->where('user_id', $user->id)
        ->first();

        // Jika tidak ada data pembayaran, arahkan ke halaman metode pembayaran
        if (!$payment) {
            return redirect()->route('user.metodePembayaran')
                ->with('error', 'Anda belum melakukan pembayaran.');
        }

        return view('user.payment.payment', compact('payment'));
    }

        public function processOrder(Request $request)
        {
            $request->validate([
                'payment_method' => 'required|string|in:bank_transfer_bni,bank_transfer_bri,bank_transfer_bca,qris,dana,mastercard,visa',
                'productId' => 'required|exists:tb_produk,id',
                'quantity' => 'required|integer|min:1', 
            ]);

            // Ambil data user yang sedang login
            $user = Auth::user();

            // Ambil total belanja dari session
            $finalTotal = $request->session()->get('finalTotal', 0);

            // Simpan data pembayaran ke database
            $payment = ModelPayment::create([
                'user_id' => $user->id,
                'productId' => $request->input('productId'),
                'quantity' => $request->input('quantity'),
                'payment_method' => $request->payment_method,
                'payment_status' => 'Pending', // Status awal pembayaran
                'payment_date' => now(),
                'total_paid' => $finalTotal,
            ]);

            return redirect()->route('user.payment.payment', ['id' => $payment->id])
                     ->with('success', 'Pembayaran berhasil diajukan.');
        }
    public function updatePaymentStatus($paymentId, Request $request)
    {
        // Validasi input (pastikan status pembayaran hanya bisa 'Berhasil')
        $request->validate([
            'payment_status' => 'required|in:Berhasil',
        ]);

        // Cari pembayaran berdasarkan ID
        $payment = ModelPayment::findOrFail($paymentId);

        // Periksa apakah pembayaran milik user yang sedang login
        if ($payment->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Perbarui status pembayaran di database
        $payment->payment_status = $request->payment_status;
        $payment->save();

        // Kembalikan respons sukses
        return response()->json(['message' => 'Status pembayaran berhasil diperbarui']);
    }

    
}

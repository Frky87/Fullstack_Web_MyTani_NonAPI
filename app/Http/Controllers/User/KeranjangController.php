<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ModelKeranjang;
use App\Models\ModelProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function addToKeranjang(Request $request, $produkId)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId = Auth::id(); // Ambil ID user yang sedang login
        $jumlah = $request->input('quantity', 1); // Jumlah produk yang ditambahkan ke keranjang, default 1

        // Periksa apakah produk ada
        $produk = ModelProduk::find($produkId);
        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Cek apakah produk sudah ada di keranjang
        $keranjang = ModelKeranjang::where('user_id', $userId)
            ->where('produk_id', $produkId)
            ->first();

        if ($keranjang) {
            // Jika produk sudah ada di keranjang, update jumlahnya
            $keranjang->jumlah += $jumlah;
            $keranjang->save();
        } else {
            // Jika produk belum ada, buat entri baru di tb_keranjang
            ModelKeranjang::create([
                'user_id' => $userId,
                'produk_id' => $produkId,
                'jumlah' => $jumlah,
            ]);
        }

        return redirect()->route('keranjang.view')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Fungsi untuk melihat keranjang
    public function viewKeranjang()
    {
        $keranjang = ModelKeranjang::where('user_id', Auth::id())->get();
        return view('user.keranjang.keranjang', compact('keranjang'));
    }
    public function hapusKeranjang($id)
    {
        $userId = Auth::id();
        $keranjang = ModelKeranjang::where('user_id', $userId)
            ->where('id', $id) // Menggunakan ID dari entri keranjang, bukan produk_id
            ->first();

        if ($keranjang) {
            $keranjang->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
        }

        return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang.');
    }
    public function updateJumlah(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $keranjang = ModelKeranjang::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$keranjang) {
            return response()->json(['error' => 'Item tidak ditemukan'], 404);
        }

        $keranjang->jumlah = $validated['quantity'];
        $keranjang->save();

        return response()->json(['success' => 'Jumlah produk berhasil diperbarui']);
    }
}

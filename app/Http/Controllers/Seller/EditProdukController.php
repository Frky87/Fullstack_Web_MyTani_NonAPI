<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\ModelProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditProdukController extends Controller
{
    public function edit($id)
    {
        // Ambil produk berdasarkan ID
        $produk = ModelProduk::findOrFail($id);

        // Tampilkan form edit dengan data produk
        return view('seller.daftarProduk.editProduk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
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
            // Ambil produk berdasarkan ID
            $produk = ModelProduk::findOrFail($id);
    
            // Proses gambar jika ada file baru yang diunggah
            if ($request->hasFile('product_img')) {
                // Hapus gambar lama jika ada
                if ($produk->product_img && file_exists(public_path('storage/produk/' . $produk->product_img))) {
                    unlink(public_path('storage/produk/' . $produk->product_img));
                }
    
                // Simpan gambar baru
                $file = $request->file('product_img');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/produk'), $fileName);
    
                // Update path gambar
                $produk->product_img = $fileName;
            }
    
            // Update data produk lainnya
            $produk->product_name = $request->product_name;
            $produk->category = $request->category;
            $produk->product_price = $request->product_price;
            $produk->product_stock = $request->product_stock;
            $produk->product_desc = $request->product_desc;
    
            // Simpan perubahan ke database
            $produk->save();
    
            // Redirect dengan pesan sukses
            return redirect()->route('seller.daftarProduk')->with('success', 'Produk berhasil diperbarui!');
        } catch (\Exception $e) {
            // Log kesalahan untuk debugging
            dd($e->getMessage());
            // Redirect dengan pesan error
            return redirect()->route('seller.editProduk')->with('error', 'Terjadi kesalahan saat memperbarui produk. Silakan coba lagi.');
        }
    }
    public function destroy($id)
    {
        try {
            // Temukan produk berdasarkan ID
            $produk = ModelProduk::findOrFail($id);
    
            // Hapus foto produk dari storage jika ada
            if ($produk->product_img && file_exists(public_path('storage/produk/' . $produk->product_img))) {
                unlink(public_path('storage/produk/' . $produk->product_img));
            }
    
            // Hapus produk dari database
            $produk->delete();
    
            // Redirect dengan pesan sukses
            return redirect()->route('seller.daftarProduk')->with('success', 'Produk berhasil dihapus!');
        } catch (\Exception $e) {
            // Log kesalahan untuk debugging
           dd($e->getMessage());
    
            // Redirect dengan pesan serror
            return redirect()->route('seller.daftarProduk')->with('error', 'Terjadi kesalahan saat menghapus produk. Silakan coba lagi.');
        }
    }
}

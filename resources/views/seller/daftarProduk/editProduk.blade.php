@extends('seller.master')
@section('content')
    <div class="pagetitle">
        <h1>Edit Produk</h1>
    </div>
    <!-- End Page Title -->

    <section class="section editProduk">
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('seller.updateProduk', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Menandakan bahwa ini adalah permintaan PUT -->

                <div class="mb-4">
                    <label for="product_img" class="form-label">Upload Foto Produk</label>
                    <input type="file" class="form-control" name="product_img" id="product_img" accept="image/*"
                        onchange="validateFileSize(this)" />
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                </div>
                <div class="mb-4">
                    <label for="product_name" class="form-label">Nama Produk <span>*</span></label>
                    <input type="text" class="form-control input" name="product_name" id="product_name"
                        placeholder="Masukkan nama produk" value="{{ $produk->product_name }}" required />
                </div>
                <div class="mb-4">
                    <label for="category" class="form-label">Kategori Produk <span>*</span></label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        <option value="1" {{ $produk->category == 1 ? 'selected' : '' }}>Sayuran Segar</option>
                        <option value="2" {{ $produk->category == 2 ? 'selected' : '' }}>Buah-Buahan</option>
                        <option value="3" {{ $produk->category == 3 ? 'selected' : '' }}>Biji-Bijian</option>
                        <option value="4" {{ $produk->category == 4 ? 'selected' : '' }}>Pupuk dan Nutrisi Tanaman
                        </option>
                        <option value="5" {{ $produk->category == 5 ? 'selected' : '' }}>Alat Pertanian</option>
                        <option value="6" {{ $produk->category == 6 ? 'selected' : '' }}>Produk Olahan Pertanian
                        </option>
                        <option value="7" {{ $produk->category == 7 ? 'selected' : '' }}>Tanaman Hias</option>
                        <option value="8" {{ $produk->category == 8 ? 'selected' : '' }}>Benih Tanaman</option>
                        <option value="9" {{ $produk->category == 9 ? 'selected' : '' }}>Produk Peternakan</option>
                        <option value="10" {{ $produk->category == 10 ? 'selected' : '' }}>Peralatan Kebun</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="product_price" class="form-label">Harga Produk <span>*</span></label>
                    <input type="number" class="form-control input" name="product_price" id="product_price"
                        placeholder="Masukkan harga produk" value="{{ $produk->product_price }}" required />
                </div>
                <div class="mb-4">
                    <label for="product_stock" class="form-label">Stok Produk <span>*</span></label>
                    <input type="number" class="form-control input" name="product_stock" id="product_stock"
                        placeholder="Masukkan jumlah stok" value="{{ $produk->product_stock }}" required />
                </div>
                <div class="mb-4">
                    <label for="product_desc" class="form-label">Deskripsi Produk <span>*</span></label>
                    <textarea class="form-control" name="product_desc" id="product_desc" rows="3"
                        placeholder="Masukkan deskripsi produk" required>{{ $produk->product_desc }}</textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" onclick="history.back()" class="btn btn-secondary">
                        Kembali
                    </button>
                </div>
            </form>
        </div>
    </section>
    <script>
        function validateFileSize(input) {
            const file = input.files[0];
            const maxSize = 2 * 1024 * 1024; // 2MB dalam byte

            if (file) {
                if (file.size > maxSize) {
                    alert('Ukuran file tidak boleh lebih dari 2MB. Silakan pilih file yang lebih kecil.');
                    input.value = ''; // Reset input file
                }
            }
        }
    </script>
@endsection

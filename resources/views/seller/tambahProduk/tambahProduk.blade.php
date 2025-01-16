@extends('seller.master')
@section('content')
    <section class="section tambahProduk">
        <!-- Form -->
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('seller.storeProduk') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- Tambahkan token CSRF untuk keamanan -->
                <div class="mb-4">
                    <label for="product_img" class="form-label">Upload Foto Produk <span>*</span></label>
                    <input type="file" class="form-control" name="product_img" id="product_img" accept="image/*" required
                        onchange="validateFileSize(this)" />
                </div>

                <div class="mb-4">
                    <label for="product_name" class="form-label">Nama Produk <span>*</span></label>
                    <input type="text" class="form-control input" name="product_name" id="product_name"
                        placeholder="Masukkan nama produk" required />
                </div>
                <div class="mb-4">
                    <label for="category" class="form-label">Kategori Produk <span>*</span></label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        <option value="1">Sayuran Segar</option>
                        <option value="2">Buah-Buahan</option>
                        <option value="3">Biji-Bijian</option>
                        <option value="4">Pupuk dan Nutrisi Tanaman</option>
                        <option value="5">Alat Pertanian</option>
                        <option value="6">Produk Olahan Pertanian</option>
                        <option value="7">Tanaman Hias</option>
                        <option value="8">Benih Tanaman</option>
                        <option value="9">Produk Peternakan</option>
                        <option value="10">Peralatan Kebun</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="product_price" class="form-label">Harga Produk <span>*</span></label>
                    <input type="number" class="form-control input" name="product_price" id="product_price"
                        placeholder="Masukkan harga produk" required />
                </div>
                <div class="mb-4">
                    <label for="product_stock" class="form-label">Stok Produk <span>*</span></label>
                    <input type="number" class="form-control input" name="product_stock" id="product_stock"
                        placeholder="Masukkan jumlah stok" required />
                </div>
                <div class="mb-4">
                    <label for="product_desc" class="form-label">Deskripsi Produk <span>*</span></label>
                    <textarea class="form-control" name="product_desc" id="product_desc" rows="3"
                        placeholder="Masukkan deskripsi produk" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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

@extends('seller.master')
@section('content')
    <div class="pagetitle">
        <h1>Daftar Produk</h1>
    </div>
    <!-- End Page Title -->

    <section class="section daftarProduk">
        <!-- Alert Success -->
        <div id="alert-success" class="alert alert-success" style="display: none;">
            <!-- Pesan sukses akan ditampilkan di sini -->
        </div>

        <!-- Button Tambah dan Cetak -->
        <div>
            <a href="{{ route('seller.tambahProduk') }}" class="btn btn-primary active md-5 mb-3">
                <i class="bi bi-plus me-1"></i>Tambah Data
            </a>
            <a href="#" class="btn btn-success active md-5 mb-3">
                <i class="bi bi-printer me-1"></i>Cetak PDF
            </a>
        </div>

        <!-- Tabel Data Barang -->
        <table class="table table-bordered datatable">
            <thead class="table-secondary">
                <tr>
                    <th>No</th>
                    <th>Gambar</th> <!-- Kolom untuk gambar -->
                    <th>Nama Produk</th>
                    <th>Penjualan</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset('storage/produk/' . $item->product_img) }}" alt="Gambar {{ $item->product_name }}"
                                style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->sales ?? 0 }}</td> <!-- Ganti dengan data penjualan yang sesuai -->
                        <td>Rp {{ number_format($item->product_price, 0, ',', '.') }}</td>
                        <td>{{ $item->product_stock }}</td>
                        <td class="d-flex align-items-center justify-content-center gap-2">
                            <a href="{{ route('seller.editProduk', $item->id) }}">
                                <button class="btn btn-info btn-sm me-1">
                                    <i class="bi bi-pencil-square me-1"></i>Edit
                                </button>
                            </a>
                            <form action="{{ route('seller.deleteProduk', $item->id) }}" method="post" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="bi bi-trash2-fill"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            // Contoh untuk menampilkan alert sukses
            function showAlert(message) {
                const alertDiv = document.getElementById('alert-success');
                alertDiv.innerText = message;
                alertDiv.style.display = 'block';
            }
        </script>
    </section>
@endsection

@extends('seller.master')

@section('content')
<div class="pagetitle">
    <h1>Daftar Pesanan</h1>
</div>
<!-- End Page Title -->

<section class="section daftarPesanan">
    <!-- Alert Success -->
    <div id="alert-success" class="alert alert-success" style="display: none;">
        <!-- Pesan sukses akan ditampilkan di sini -->
    </div>

    <!-- Tabel Data Pesanan -->
    <table class="table table-bordered datatable">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
                <th>Tanggal Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($pesanan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('storage/produk/' . $item->product->product_img) }}"
                        alt="{{ $item->product->product_name }}" style="width: 50px; height: 50px; object-fit: cover;">
                    {{ $item->product->product_name }}
                </td>
                <td>Rp {{ number_format($item->product->product_price, 0, ',', '.') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->total_paid, 0, ',', '.') }}
                </td>
                <td>
                    <span class="fw-bold {{ $item->payment_status === 'Berhasil' ? 'text-success' : 'text-warning' }}">
                        {{ ucfirst($item->payment_status) }}
                    </span>
                </td>
                <td>{{ \Carbon\Carbon::parse($item->payment_date)->format('d-m-Y H:i') }}</td>
                <td class="d-flex align-items-center justify-content-center gap-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}">
                        <button class="btn btn-info btn-sm me-1">
                            <i class="bi bi-eye text-white"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    @foreach ($pesanan as $item)
    <!-- Modal Detail Pesanan -->
    <div class="modal fade modal-borderless modal-lg" id="detail{{ $item->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content p-3">
                {{-- <form action="{{ route('update.status.pesanan', ['id' => $item->id]) }}" method="POST">
                    @csrf --}}
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column ">
                            <img src="{{ asset('storage/produk/' . $item->product->product_img) }}" alt="Produk"
                                class="mb-3 rounded object-fit-fill" style="width: 100%; height: 200px;">

                            <div class="card rounded-md card-information-user">
                                <div class="title py-3 bg-dark rounded md mb-3">
                                    <h5 class="text-white text-bold ms-2">Informasi User</h5>
                                </div>
                                <div class="content-card px-3">
                                    <div class="d-flex gap-2">
                                        <h5 class="fw-bold">{{ $item->user->name ?? 'User tidak diketahui' }} </h5>
                                        <span class="text-secondary">({{ $item->user->phone_number }})</span>
                                    </div>
                                    <p>{{ $item->user->address }}</p>
                                </div>
                            </div>

                            <div class="card rounded-md card-information-product">
                                <div class="title py-3 bg-dark rounded md mb-3">
                                    <span class="text-white text-bold ms-2">Informasi Produk</span>
                                </div>
                                <div class="content-card px-3">
                                    <h5 class="fw-bold">{{ $item->product->product_name }}</h5>
                                    <p>Harga Produk : <span class="float-end">Rp.
                                            {{ number_format($item->product->product_price * $item->quantity, 0, ',', '.') }}</span>
                                    </p>
                                    <p>Ongkos Kirim: <span class="float-end">Rp.
                                            {{ number_format(20000, 0, ',', '.') }}</span></p>
                                    <p>Biaya Admin: <span class="float-end">Rp.
                                            {{ number_format(2000, 0, ',', '.') }}</span></p>
                                    <p>Total Harga: <strong class="float-end">Rp.
                                            {{ number_format($item->total_paid, 0, ',', '.') }}</strong></p>
                                    <p>Metode Pembayaran: <strong
                                            class="float-end">{{ ucfirst($item->payment_method) }}</strong></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('update.status.pesanan', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success" @if($item->payment_status != 'Berhasil' || $item->status == 2) disabled
                                @endif>
                                @if($item->status == 0) 
                                Konfirmasi Pembayaran
                                @elseif($item->status == 1)
                                Atur Pengiriman
                                @elseif($item->status == 2)
                                Menunggu Konfirmasi
                                @endif
                            </button>
                        </form>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    @endforeach

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

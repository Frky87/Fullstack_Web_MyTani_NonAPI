@extends('user.user')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <!-- Alamat Pengiriman -->
            <h5>Alamat Pengiriman Kamu
                @if ($address)
                <a href="{{ url('/profileUser') }}" class="btn btn-primary btn-sm float-end">Edit Alamat</a>
                @else
                <a href="{{ url('/profileUser') }}" class="btn btn-primary btn-sm float-end">Tambah Alamat</a>
                @endif
            </h5>
            <div class="mb-4">
                @if ($address)
                <h6>{{ $address }}</h6>
                @else
                <p>Alamat belum ditambahkan!</p>
                @endif
                <hr>
            </div>

            <!-- Daftar Produk di Keranjang -->
            @if (!empty($cart) && count($cart) > 0)
            @foreach ($cart as $item)
            <div class="row mb-4">
                <div class="col-md-3">
                    <img src="{{ asset('storage/produk/' . $item['produk']->product_img) }}"
                        alt="{{ $item['produk']->product_name }}" class="img-fluid" />
                </div>
                <div class="col-md-9">
                    <h6>{{ $item['produk']->product_name }}</h6>
                    <p>{{ $item['jumlah'] }} X Rp{{ number_format($item['produk']->product_price, 0, ',', '.') }}</p>
                    <p>Subtotal: Rp{{ number_format($item['jumlah'] * $item['produk']->product_price, 0, ',', '.') }}
                    </p>
                </div>
            </div>
            <hr>
            @endforeach
            @else
            <p class="text-center">Keranjang Anda kosong.</p>
            @endif

            <!-- Ringkasan Belanja -->
            @if (!empty($cart) && count($cart) > 0)
            <h5>Cek Ringkasan Belanjamu, Yuk</h5>
            <div class="mb-4">
                @php
                $shippingFee = 20000; // Ongkos kirim
                $adminFee = 2000; // Biaya admin
                $finalTotal = $totalPrice + $shippingFee + $adminFee;
                @endphp
                <p>Total Harga Barang: <span class="float-end">Rp.
                        {{ number_format($totalPrice, 0, ',', '.') }}</span></p>
                <p>Total Ongkos Kirim: <span class="float-end">Rp.
                        {{ number_format($shippingFee, 0, ',', '.') }}</span></p>
                <p>Total Biaya Admin: <span class="float-end">Rp.
                        {{ number_format($adminFee, 0, ',', '.') }}</span></p>
                <p>Total Belanja: <span class="float-end fw-bold">Rp.
                        {{ number_format($finalTotal, 0, ',', '.') }}</span></p>
            </div>
            @endif

            <!-- Tombol Checkout -->
            <div class="text-end">
                @if (!empty($cart) && count($cart) > 0 && $address)
                <!-- Jika keranjang tidak kosong dan alamat tersedia -->
                <a href="{{ route('checkout.payment') }}" class="btn btn-success">Pilih Pembayaran</a>
                @else
                <!-- Jika keranjang kosong atau alamat tidak tersedia -->
                <button class="btn btn-secondary disabled">Pilih Pembayaran</button>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

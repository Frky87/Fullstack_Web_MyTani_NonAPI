@extends('user.user')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Kolom Kiri: Pilihan Pembayaran -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Pilih Metode Pembayaran</h5>
                </div>
                <div class="card-body">
                    <form id="paymentForm" action="{{ route('checkout.processOrder') }}" method="POST">
                        @csrf
                        <!-- Transfer Bank -->
                        <h5>Transfer Bank</h5>
                        <div class="form-check mb-3 d-flex align-items-center gap-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer_bni"
                                value="bank_transfer_bni" required>
                            <img src="https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg" alt="BNI" width="50">
                            <label class="form-check-label mb-0" for="bank_transfer_bni">BNI</label>
                        </div>
                        <div class="form-check mb-3 d-flex align-items-center gap-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer_bri"
                                value="bank_transfer_bri" required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg" alt="BRI"
                                width="50">
                            <label class="form-check-label mb-0" for="bank_transfer_bri">BRI</label>
                        </div>
                        <div class="form-check mb-3 d-flex align-items-center gap-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer_bca"
                                value="bank_transfer_bca" required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg"
                                alt="BCA" width="50">
                            <label class="form-check-label mb-0" for="bank_transfer_bca">BCA</label>
                        </div>

                        <!-- E-Wallet -->
                        <h5>E-Wallet</h5>
                        <div class="form-check mb-3 d-flex align-items-center gap-3">
                            @foreach ($cart as $item)
                            <input type="hidden" name="productId" value="{{ $item['id'] }}">
                            <input type="hidden" name="quantity" value="{{ $item['quantity'] }}">
                            @endforeach
                            <input class="form-check-input" type="radio" name="payment_method" id="qris" value="qris"
                                required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_QRIS.svg" alt="QRIS"
                                width="50">
                            <label class="form-check-label mb-0" for="qris">QRIS</label>
                        </div>
                        <div class="form-check mb-3 d-flex align-items-center gap-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="dana" value="dana"
                                required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" alt="Dana"
                                width="50">
                            <label class="form-check-label mb-0" for="dana">Dana</label>
                        </div>

                        <!-- Kartu Kredit -->
                        <h5>Kartu Kredit</h5>
                        <div class="form-check mb-3 d-flex align-items-center gap-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="mastercard"
                                value="mastercard" required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg"
                                alt="Mastercard" width="50">
                            <label class="form-check-label mb-0" for="mastercard">Mastercard</label>
                        </div>
                        <div class="form-check mb-3 d-flex align-items-center gap-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="visa" value="visa"
                                required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d6/Visa_2021.svg" alt="Visa"
                                width="50">
                            <label class="form-check-label mb-0" for="visa">Visa</label>
                        </div>

                        <!-- Tombol Bayar -->
                        <button type="submit" class="btn btn-primary mt-3 w-100">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Ringkasan Pembelian -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Ringkasan Pembelian</h5>
                </div>
                <div class="card-body">
                    @foreach ($cart as $item)
                    <div class="mb-4">
                        <img src="{{ asset('storage/produk/' . $item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid mb-2" />
                        <h6>{{ $item['name'] }}</h6>
                        <p>{{ $item['quantity'] }} x Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                        <p>Subtotal: Rp{{ number_format($item['quantity'] * $item['price'], 0, ',', '.') }}</p>
                    </div>
                    @endforeach
                    <hr>
                    
                    <p>Ongkos Kirim: <span class="float-end">Rp. {{ number_format(20000, 0, ',', '.') }}</span></p>
                    <p>Biaya Admin: <span class="float-end">Rp. {{ number_format(2000, 0, ',', '.') }}</span></p>
                  
                    <p>Total Belanja: <span class="float-end fw-bold">Rp. {{ number_format($finalTotal, 0, ',', '.') }}</span></p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Validasi JavaScript -->
<script>
    document.getElementById('paymentForm').addEventListener('submit', function (e) {
        const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

        if (selectedPaymentMethod !== 'qris') {
            e.preventDefault(); // Mencegah pengiriman form
            alert('Pembayaran sekarang hanya bisa dilakukan menggunakan QRIS!');
        }

    });

</script>
@endsection

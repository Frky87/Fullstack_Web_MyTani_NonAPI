@extends('user.user')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <!-- Bagian Kiri: Card dengan tulisan dan gambar QR -->
                <div class="card">
                    <div class="card-header">
                        <h5>Pindai Kode QR</h5>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <p>Pindai Kode QR di bawah dengan Aplikasi Mobile Banking atau E-wallet:</p>
                        <img src="{{ asset('assets/img/QRIS.jpg') }}" alt="QRIS" width="200" >

                    </div>
                    @if ($payment->payment_status !== 'Berhasil')
                    <button id="checkPaymentStatus" class="btn btn-success">Saya Sudah Bayar</button>
                    @endif
                    <a href="{{ route('user.home') }}" id="backButton"
                        class="btn btn-primary {{ $payment->payment_status === 'Berhasil' ? '' : 'd-none' }} mt-3">Kembali
                        ke Home</a>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Bagian Kanan: Card dengan detail pembayaran -->
                <div class="card">
                    <div class="card-header">
                        <h5>Detail Pembayaran</h5>
                    </div>
                    <div class  
                    ="card-body">
                        <p>Metode Pembayaran: <span class="fw-bold">{{ strtoupper($payment->payment_method) }}</span></p>
                        <p>Total Harga : <span class="fw-bold">Rp.
                                {{ number_format($payment->total_paid, 0, ',', '.') }}</span></p>
                        <p>Status Pembayaran:
                            <span id="paymentStatus"
                                class="fw-bold {{ $payment->payment_status === 'Berhasil' ? 'text-success' : 'text-warning' }}">
                                {{ ucfirst($payment->payment_status) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('checkPaymentStatus')?.addEventListener('click', function () {
            const paymentStatusElement = document.getElementById('paymentStatus');
            const paymentId = "{{ $payment->id }}"; // Menyertakan ID pembayaran untuk identifikasi
            const backButton = document.getElementById('backButton');
            const button = this;

            // Menambahkan indikator loading ke tombol
            button.disabled = true; // Nonaktifkan tombol agar tidak bisa diklik berulang kali
            button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...';

            // Simulasi jeda beberapa detik
            setTimeout(() => {
                // Mengubah status pembayaran di tampilan
                paymentStatusElement.classList.remove('text-warning');
                paymentStatusElement.classList.add('text-success');
                paymentStatusElement.textContent = 'Berhasil';

                // Menyembunyikan tombol "Cek Status Pembayaran" dan menampilkan tombol "Kembali ke Home"
                button.classList.add('d-none');
                backButton.classList.remove('d-none');

                // Mengirim permintaan AJAX untuk memperbarui status pembayaran di database
                fetch(`/user/payment/status/${paymentId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            payment_status: 'Berhasil'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Menangani respons dari server jika diperlukan
                        console.log(data.message); // Jika perlu tampilkan pesan
                    })
                    .catch(error => console.error('Error:', error));
            }, 3000); // Jeda 3 detik
        });

    </script>

   


@endsection
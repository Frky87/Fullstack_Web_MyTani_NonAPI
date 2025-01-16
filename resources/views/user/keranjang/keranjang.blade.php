@extends('user.user')

@section('content')
    <section class="cart container mt-4 bg-white p-4 rounded shadow">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table cart-table mt-3">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($keranjang && count($keranjang) > 0)
                    @foreach ($keranjang as $item)
                        <tr>
                            <td>
                                <div class="product-info d-flex align-items-center">
                                    <img src="{{ asset('storage/produk/' . $item->produk->product_img) }}"
                                        alt="{{ $item->produk->product_name }}" class="product-image"
                                        style="width: 50px; height: 50px; border-radius: 5px; margin-right: 10px;" />
                                    <div class="product-details">
                                        <h7 class="mb-0">{{ $item->produk->product_name }}</h7>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="price" data-price="{{ $item->produk->product_price }}">
                                    Rp. {{ number_format($item->produk->product_price, 0, ',', '.') }}
                                </p>
                            </td>
                            <td>
                                <div class="quantity d-flex align-items-center">
                                    <input type="number" class="form-control mx-1 quantity-input"
                                        value="{{ $item->jumlah }}" min="1" data-id="{{ $item->id }}"
                                        style="width: 60px" />
                                </div>
                            </td>
                            <td class="total-price" data-id="{{ $item->id }}">
                                Rp. {{ number_format($item->produk->product_price * $item->jumlah, 0, ',', '.') }}
                            </td>
                            <td>
                                <form action="{{ route('hapus.keranjang', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Keranjang Anda kosong.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="cart-footer d-flex justify-content-between align-items-center mt-4">
            <p class="ms-auto">
                Total Produk:
                <span class="total-overall fw-bold text-success" style="padding-right: 10px">Rp.
                    {{ number_format(
                        $keranjang->sum(function ($item) {
                            return $item->produk->product_price * $item->jumlah;
                        }),
                        0,
                        ',',
                        '.',
                    ) }}
                </span>
            </p>
        </div>
        <div class="text-end">
            <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
        </div>
    </section>

    <script>
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('input', function() {
                const quantity = parseInt(this.value);
                if (isNaN(quantity) || quantity < 1) {
                    alert('Jumlah harus lebih dari 0.');
                    this.value = 1;
                    return;
                }

                const productId = this.dataset.id;
                const price = parseFloat(this.closest('tr').querySelector('.price').dataset.price);
                const totalPriceCell = this.closest('tr').querySelector('.total-price');

                const totalPrice = quantity * price;
                totalPriceCell.textContent = 'Rp. ' + totalPrice.toLocaleString('id-ID');

                updateOverallTotal();

                fetch(`/keranjang/update/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        quantity
                    })
                }).then(response => {
                    if (!response.ok) {
                        alert('Terjadi kesalahan saat memperbarui jumlah produk.');
                    }
                });
            });
        });

        function updateOverallTotal() {
            let overallTotal = 0;
            document.querySelectorAll('.total-price').forEach(cell => {
                const total = parseFloat(cell.textContent.replace(/[^\d,]/g, '').replace(',', '.'));
                if (!isNaN(total)) {
                    overallTotal += total;
                }
            });
            document.querySelector('.total-overall').textContent = 'Rp. ' + overallTotal.toLocaleString('id-ID');
        }
    </script>
@endsection

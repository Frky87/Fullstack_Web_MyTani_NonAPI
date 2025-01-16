@extends('user.user')
@section('content')
    <style>
        body {
            background-color: #f5f5f5;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #4caf50;
            padding: 10px 20px;
            color: #fff;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .search-bar {
            flex: 1;
            margin: 0 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .product-details {
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 800px;
            margin: 20px auto;
        }

        .back-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #4caf50;
        }

        .product-info {
            display: flex;
            gap: 20px;
        }

        .product-image {
            max-width: 300px;
            border-radius: 10px;
        }

        .product-text {
            flex: 1;
        }

        .product-text h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .ratings {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .stars {
            color: gold;
        }

        .price {
            margin: 10px 0;
        }

        .price p {
            font-size: 20px;
            color: #4caf50;
            font-weight: bold;
        }

        .original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 16px;
        }

        .quantity {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity input {
            width: 50px;
            padding: 5px;
            text-align: center;
        }

        .stock {
            color: #666;
        }

        .product-specs,
        .product-description,
        .reviews {
            margin-top: 20px;
        }

        .product-specs h2,
        .product-description h2,
        .reviews h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .add-to-cart {
            background-color: #ffa500;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .buy-now {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <section class="product-details">
        <div class="product-info">
            <img src="{{ asset('storage/produk/' . $produk->product_img) }}" alt="{{ $produk->product_name }}"
                class="product-image" />
            <div class="product-text">
                <h1>{{ $produk->product_name }}</h1>
                <div class="ratings">
                    <span class="review-count">({{ $produk->sales }} Terjual)</span>
                </div>
                <div class="price">
                    <p>
                        Rp. {{ number_format($produk->product_price, 0, ',', '.') }}
                        <span class="original-price">Rp.
                            {{ number_format($produk->product_price + 50000, 0, ',', '.') }}</span>
                    </p>
                </div>
                <div class="quantity">
                    <label for="quantity">Jumlah:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1"
                        max="{{ $produk->product_stock }}" />
                    <span class="stock">Sisa {{ $produk->product_stock }}</span>
                </div>
                <div class="actions text-center">
                    <form action="{{ route('user.tambahKeranjang', $produk->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="quantity-cart" value="1" />
                        <button type="submit" class="add-to-cart">Masukkan Ke Keranjang</button>
                    </form>
                    <form action="{{ route('checkout.direct') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $produk->id }}" />
                        <input type="hidden" name="quantity" id="quantity-buy" value="1" />
                        <button type="submit" class="buy-now">Beli Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="product-description">
            <h2>Deskripsi Produk</h2>
            <p>{{ $produk->product_desc }}</p>
        </div>

        {{-- <div class="reviews">
            <h2>Penilaian Produk</h2>
            <div class="review d-flex align-items-start mb-3">
                <img src="https://via.placeholder.com/40" alt="User Avatar" class="user-avatar me-2" />
                <div>
                    <p><strong>Yelena Belova</strong> <span>Today</span></p>
                    <div class="ratings">
                        <span class="stars">★★★★☆</span>
                    </div>
                    <p>Barang sangat memuaskan! Tidak diragukan lagi.</p>
                </div>
            </div>
            <div class="review d-flex align-items-start mb-3">
                <img src="https://via.placeholder.com/40" alt="User Avatar" class="user-avatar me-2" />
                <div>
                    <p><strong>Natasha Romanova</strong> <span>Yesterday</span></p>
                    <div class="ratings">
                        <span class="stars">★★★★★</span>
                    </div>
                    <p>Barang berkualitas bagus.</p>
                </div>
            </div> --}}
        </div>
    </section>
    <script>
        document.getElementById('quantity').addEventListener('input', function() {
            const quantity = this.value
            document.getElementById('quantity-cart').value = quantity;
            document.getElementById('quantity-buy').value = quantity;
        });
    </script>
@endsection

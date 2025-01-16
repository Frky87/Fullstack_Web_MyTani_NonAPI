@extends('user.user')
@section('content')
    <section class="recommended">
        <div class="container mt-4">
            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-md-3">
                        <a href="/produk/{{ $item->id }}" class="text-decoration-none text-dark">
                            <div class="card mb-4">
                                <img src="{{ asset('storage/produk/' . $item->product_img) }}" class="card-img-top"
                                    alt="{{ $item->product_img }}" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->product_name }}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Rp. {{ number_format($item->product_price, 0, ',', '.') }} <span
                                            class="float-end">{{ $item->sales }} Terjual</span>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

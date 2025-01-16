    @extends('user.user')

    @section('content')
    <div class="container mt-4">
        <h3 class="mb-3 text-black">Pesanan Saya</h3>

        <ul class="nav nav-tabs" id="pesananTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="dikirim-tab" data-bs-toggle="tab" data-bs-target="#dikemas" type="button" role="tab" aria-controls="dikirim" aria-selected="false">Dikemas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="berhasil-tab" data-bs-toggle="tab" data-bs-target="#dikirim" type="button" role="tab" aria-controls="berhasil" aria-selected="false">Dikirim</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="selesai-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab" aria-controls="selesai" aria-selected="false">Selesai</button>
            </li>
        </ul>
        <div class="tab-content" id="pesananTabContent">
            <!-- Tab Pending -->
            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produk</th>
                                <th>Nama Produk</th>
                                <th>Total Harga</th>
                                <th>Status Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesanan as $item)
                                @if ($item->payment_status == "Pending")
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ asset('storage/produk/' . $item->product->product_img) }}" 
                                                 class="img-thumbnail" style="width: 100px">
                                        </td>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>Rp. {{ number_format($item->total_paid, 0, ',', '.') }}</td>
                                        <td><span class="fw-bold text-warning">{{ ucfirst($item->payment_status) }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail{{ $item->id }}">
                                                <i class="fa fa-eye text-white"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7">Tidak ada pesanan yang pending.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        
            <!-- Tab Dikemas -->
            <div class="tab-pane fade" id="dikemas" role="tabpanel" aria-labelledby="dikemas-tab">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produk</th>
                                <th>Nama Produk</th>
                                <th>Total Harga</th>
                                <th>Status Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesanan as $item)
                                @if ($item->payment_status == "Berhasil" && ($item->status == 1 || $item->status == 0))
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ asset('storage/produk/' . $item->product->product_img) }}" 
                                                 class="img-thumbnail" style="width: 100px">
                                        </td>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>Rp. {{ number_format($item->total_paid, 0, ',', '.') }}</td>
                                        <td><span class="fw-bold text-success">{{ ucfirst($item->payment_status) }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail{{ $item->id }}">
                                                <i class="fa fa-eye text-white"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7">Tidak ada pesanan yang dikemas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tab Dikirim -->
            <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="dikemas-tab">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produk</th>
                                <th>Nama Produk</th>
                                <th>Total Harga</th>
                                <th>Status Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesanan as $item)
                                @if ($item->payment_status == "Berhasil" && $item->status == 2 )
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ asset('storage/produk/' . $item->product->product_img) }}" 
                                                 class="img-thumbnail" style="width: 100px">
                                        </td>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>Rp. {{ number_format($item->total_paid, 0, ',', '.') }}</td>
                                        <td><span class="fw-bold text-success">{{ ucfirst($item->payment_status) }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail{{ $item->id }}">
                                                <i class="fa fa-eye text-white"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7">Tidak ada pesanan yang dikemas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Tab Selesai -->
            <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="dikemas-tab">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produk</th>
                                <th>Nama Produk</th>
                                <th>Total Harga</th>
                                <th>Status Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesanan as $item)
                                @if ($item->payment_status == "Berhasil" && $item->status == 3 )
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ asset('storage/produk/' . $item->product->product_img) }}" 
                                                 class="img-thumbnail" style="width: 100px">
                                        </td>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>Rp. {{ number_format($item->total_paid, 0, ',', '.') }}</td>
                                        <td><span class="fw-bold text-success">{{ ucfirst($item->payment_status) }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail{{ $item->id }}">
                                                <i class="fa fa-eye text-white"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7">Tidak ada pesanan yang dikemas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    @foreach ($pesanan as $item)
    <!-- Modal Detail Pesanan -->
    <div class="modal fade modal-borderless modal-lg" id="detail{{ $item->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pesanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column ">
                        <img src="{{ asset('storage/produk/' . $item->product->product_img) }}" alt="Produk"
                            class="mb-3 rounded object-fit-fill" style="width: 100%; height: 200px;">
                        <h5>{{ $item->product->product_name }}</h5>
                        <p>Harga Produk : <span class="float-end">Rp.
                                {{ number_format($item->product->product_price, 0, ',', '.') }}</span></p>
                        <p>Ongkos Kirim: <span class="float-end">Rp. {{ number_format(20000, 0, ',', '.') }}</span></p>
                        <p>Biaya Admin: <span class="float-end">Rp. {{ number_format(2000, 0, ',', '.') }}</span></p>
                        <p>Total Harga: <strong class="float-end">Rp.
                                {{ number_format($item->total_paid, 0, ',', '.') }}</strong></p>
                        <p>Metode Pembayaran: <strong class="float-end">{{ ucfirst($item->payment_method) }}</strong></p>
                    </div>
                </div>
                <div class="modal-footer">
                    @if($item->status == 2 || $item->status == 3)
                        <form action="{{ route('user.updatePackage', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning text-white @if($item->status == 3) disabled @endif">Diterima</button>
                        </form>
                    @endif
                    <a href="{{ route('user.payment.payment', ['id' => $item->id]) }}" 
                        class="btn btn-success @if($item->payment_status != 'Pending') disabled @endif">
                        Selesaikan Pembayaran
                     </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach



    @endsection

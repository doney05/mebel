@extends('layouts.admin.app')
@section('title')
    Transaksi - Admin
@endsection
@section('content')
        <div class="row d-flex mb-4">
            <div class="col-6">
                <h4 class="m-b-lg">Transaksi Sukses</h4>
            </div>
            {{-- <div class="col-6 text-end">
                <a href="{{ url('admin/product/create') }}" class="btn btn-primary"
                style="text-decoration: none;">Tambah Product</a>
            </div> --}}
        </div><!-- END column -->

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Invoice</th>
                            <th>Nama Customer</th>
                            <th>Tanggal Beli</th>
                            <th>Jumlah Produk</th>
                            <th>Total Harga</th>
                            <th>Pembayaran</th>
                            <th>Status Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pays as $item)
                            @if ($item['status'] == 'Paid')
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ url('admin/transaksi/sukses/invoice/'. $item['id']) }}" target="_blank">Lihat Invoice
                                    </a>
                                </td>
                                <td>{{ $item['user']['name'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($item['updated_at'])->format('Y-m-d') }}</td>
                                <td>{{ count($item['payment']) }} Produk</td>
                                <td>Rp. {{ number_format($item['total']) }}</td>
                                <td>{{ $item['bank'] }}</td>
                                <td style="color: green">{{ $item['status'] }}</td>
                                <td>
                                    <form action="{{ url('admin/transaksi/sukses/delete/'. $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background: none; border:none;"><i class="fas fa-trash" style="color: red"></i> Delete</button>
                                    </form>
                                </td>
                              </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
         </div>
@endsection

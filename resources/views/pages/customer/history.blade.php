@extends('layouts.customer.app')

@section('title')
    Riwayat - Customer
@endsection
@section('content')
        <div class="row d-flex mb-4">
            <div class="col-6">
                <h4 class="m-b-lg">Riwayat Pesanan</h4>
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
                            <th>Tanggal Pembelian</th>
                            <th>Jumlah Produk</th>
                            <th>Harga Produk</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pay as $item)

                        @if ($item['status'] == 'Paid')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ url('invoice/'. $item['id']) }}" target="_blank">Lihat Invoice</a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item['updated_at'])->format('Y-m-d') }}</td>
                                    <td>{{ count($item['payment']) }} Produk</td>
                                    <td>Rp. {{ number_format($item['total']) }}</td>
                                    <td>{{ $item['bank'] }}</td>
                                    <td style="color: green">{{ $item['status'] }}</td>
                                </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
         </div>
@endsection

@extends('layouts.admin.app')
@section('title')
    Data Pembeli - Admin
@endsection
@section('content')
        <div class="row d-flex mb-4">
            <div class="col-6">
                <h4 class="m-b-lg">Data Pembeli</h4>
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
                            <th>Nama Pembeli</th>
                            <th>Email</th>
                            <th>No. Hp</th>
                            <th>Alamat</th>
                            <th>Jumlah Beli</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->alamat()->latest()->first()->phone }}</td>
                            <td>{{ $item->alamat()->latest()->first()->alamat }}</td>
                            <td>{{ count($item->paymentdetail) }} Produk</td>
                            <td>
                                <form action="{{ route('data-pembeli.delete', $item->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
         </div>
@endsection

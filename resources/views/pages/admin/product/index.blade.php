@extends('layouts.admin.app')
@section('title')
    Produk - Admin
@endsection
@section('content')
        <div class="row d-flex mb-4">
            <div class="col-6">
                <h4 class="m-b-lg">Produk</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ url('admin/product/create') }}" class="btn btn-primary"
                style="text-decoration: none;">Tambah Produk</a>
            </div>
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
                            <th style="width: 20%">Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Stok</th>
                            <th>Berat Produk</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ Storage::url($item->images) }}" alt=""
                                style="width: 30%">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->weight }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ route('product.delete', $item->id) }}" method="POST"
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

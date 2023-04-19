@extends('layouts.admin.app')

@section('title')
    Tambah Product - Admin
@endsection
@section('content')
    <div class="title mb-4">
        <h4 class="m-b-lg">Tambah Product</h4>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{  url('admin/product/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="images">Gambar</label>
                    <input type="file" name="images" id="images" class="form-control @error('images') is-invalid @enderror" required>
                    @error('images')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" required>
                    @error('harga')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="weight">Berat Produk (g)</label>
                    <input type="text" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" required>
                    @error('weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p style="color: red">harus diisi dengan angka</p>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" required>
                    @error('stok')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="text" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" required>
                    @error('qty')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="description">Keterangan</label>
                   <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection

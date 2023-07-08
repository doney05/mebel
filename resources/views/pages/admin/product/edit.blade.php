@extends('layouts.admin.app')

@section('title')
    Edit Produk - Admin
@endsection
@section('content')
    <div class="title mb-4">
        <h4 class="m-b-lg">Edit Produk</h4>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{  url('admin/product/update/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="oldImage" value="{{ $item->images }}">
                <div class="form-group">
                    <label for="images">Gambar</label>
                    <input type="file" name="images" id="images" class="form-control @error('images') is-invalid @enderror"
                    value="{{ $item->images }}" required>
                    @error('images')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required
                    value="{{ $item->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" required
                    value="{{ $item->price }}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="weight">Berat Produk (g)</label>
                    <input type="text" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" required
                    value="{{ $item->weight }}">
                    @error('weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p style="color: red">harus diisi dengan angka</p>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" required
                    value="{{ $item->stok }}">
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
                   <textarea name="description" id="description" class="form-control" cols="30" rows="10">
                    {{ $item->description }}
                   </textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

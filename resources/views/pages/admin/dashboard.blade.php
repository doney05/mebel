@extends('layouts.admin.app')
@section('title')
    Dashboard - Admin
@endsection
@section('content')
<div class="row">
    <!-- start analytics -->
    <div class="col-lg-3">
      <div class="analytics">
        <div class="card">
          <div class="icon"><i class="fa fa-folder"></i></div>
          <div class="text">
            <h1>{{ $product }}</h1>
            <p>Total Produk</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="analytics">
        <div class="card">
          <div class="icon"><i class="fab fa-dollar"></i></div>
          <div class="text">
            <h1>{{ $sukses }}</h1>
            <p>Pembelian Sukses</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="analytics">
        <div class="card">
          <div class="icon"><i class="fa fa-strikethrough"></i></div>
          <div class="text">
            <h1>{{ $batal }}</h1>
            <p>Pembelian Batal</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="analytics">
        <div class="card">
          <div class="icon"><i class="fa fa-users"></i></div>
          <div class="text">
            <h1>{{ $user }}</h1>
            <p>Total Customer</p>
          </div>
        </div>
      </div>
    </div>
    <!-- end analytics -->

  </div>
@endsection

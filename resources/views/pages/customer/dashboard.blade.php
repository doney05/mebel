@extends('layouts.customer.app')
@section('title')
    Dashboard - Customer
@endsection
@section('content')
<div class="row">
    <!-- start analytics -->
    <div class="col-lg-3">
      <div class="analytics">
        <div class="card">
          <div class="icon"><i class="fa fa-folder"></i></div>
          <div class="text">
            <h1>{{ $cart }}</h1>
            <p>Total Keranjang</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="analytics">
        <div class="card">
          <div class="icon"><i class="fab fa-dollar"></i></div>
          <div class="text">
            <h1>{{ $pay }}</h1>
            <p>Total Pembelian</p>
          </div>
        </div>
      </div>
    </div>
    <!-- end analytics -->

  </div>
@endsection

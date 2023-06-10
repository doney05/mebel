@extends('layouts.customer.app')
@section('title')
    Product - Customer
@endsection
@section('content')
    <div class="title mb-4">
        <h4 class="m-b-lg">Product</h4>
    </div>
    <div class="product">
        <div class="row">
            @foreach ($products as $item)
            @if ($item->stok == 0)

            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <img src="{{ Storage::url($item->images) }}" alt="" style="width: 100%;
                      height: 25vh">
                      <div class="title text-center">
                          <p style="font-weight: bold; margin-top: 20px; margin-bottom: 0px">{{ $item->name }}</p>
                          <p style="margin-bottom: 0px"><span style="font-weight: bold;">Harga :</span> Rp. {{ number_format($item->price) }}</p>
                          <p style="  margin-bottom: 0px"><span style="font-weight: bold;">Stok :</span>{{ $item->stok }}</p>
                          <p><span style="font-weight: bold;">Berat :</span>{{ $item->weight }}</p>
                        </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn-success" style="color: black">Stok Habis</button>
                        {{-- @if ($carts->where('products_id', $item->id)->count())
                            <button class="btn btn-success" style="color: black">In Cart</button>
                        @else
                        <form action="{{ url('add-to-cart/'.$item->id) }}">
                                <input type="hidden" name="qty" value="1">
                                <button class="btn btn-primary"><i class="fa-sharp fa-solid fa-cart-plus"></i></button>
                        </form>
                        @endif --}}
                        <a href="{{ url('product-detail/'. $item->id) }}" class="btn btn-warning mx-3"><i class="fa-sharp fa-solid fa-circle-info"></i></a>

                        </div>
                    </div>
                  </div>
            </div>

            @else
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <img src="{{ Storage::url($item->images) }}" alt="" style="width: 100%;
                      height: 25vh">
                      <div class="title text-center">
                          <p style="font-weight: bold; margin-top: 20px; margin-bottom: 0px">{{ $item->name }}</p>
                          <p style="margin-bottom: 0px"><span style="font-weight: bold;">Harga :</span> Rp. {{ number_format($item->price) }}</p>
                          <p style="  margin-bottom: 0px"><span style="font-weight: bold;">Stok :</span>{{ $item->stok }}</p>
                          <p><span style="font-weight: bold;">Berat :</span>{{ $item->weight }}</p>
                        </div>
                        <div class="d-flex justify-content-center">
                        @if ($carts->where('products_id', $item->id)->count())
                            <button class="btn btn-success" style="color: black">In Cart</button>
                        @else
                        <form action="{{ url('add-to-cart/'.$item->id) }}">
                                <input type="hidden" name="qty" value="1">
                                <button class="btn btn-primary"><i class="fa-sharp fa-solid fa-cart-plus"></i></button>
                        </form>
                        @endif
                        <a href="{{ url('product-detail/'. $item->id) }}" class="btn btn-warning mx-3"><i class="fa-sharp fa-solid fa-circle-info"></i></a>

                        </div>
                    </div>
                  </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection

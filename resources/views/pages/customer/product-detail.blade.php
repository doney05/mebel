@extends('layouts.customer.app')
@section('title')
    Detail Produk - Customer
@endsection
@section('content')
    <div class="title mb-4">
        <h4 class="m-b-lg">Detail Produk</h4>
    </div>
    <div class="card">
        <div class="card-body">
            @if ($products->stok == 0)
            @if ($carts->where('products_id', $products->id)->count())
                <div class="row">
                    <div class="col-6">
                        <img src="{{ Storage::url($products->images) }}" alt=""
                        style="width: 100%">
                    </div>
                    <div class="col-6">
                        <a href="{{ url('produk/'. Auth::user()->id) }}"><p style="font-weight: bold"><i class="fa-solid fa-arrow-left"></i> <span style="text-decoration: underline">Kembali</span></p></a>
                        <h2 style="font-weight: bold">{{ $products->name }}</h2>
                        <p>{{ $products->description }}</p>

                        <p style="margin-top: 10px; margin-bottom: 0px"><span style="font-weight: bold">Berat :</span> {{ $products->weight }} <span style="text-transform: lowercase">(g)</span></p>
                        <p style="margin-bottom: 0px"><span style="font-weight: bold">Stok :</span> {{ $products->stok }}</p>
                        <div class="row">
                            <div class="col-6">
                                <p><span style="font-weight: bold">Rp :</span> {{ number_format( $products->price )}}</p>
                            </div>
                            <div class="col-6">
                                {{-- <button>-</button>
                                <input type="number" name="qty" id="qty" value="1">
                                <button>+</button> --}}
                                <div class="input-group quantity">
                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                        <span class="input-group-text">-</span>
                                    </div>
                                    <input type="text" name="qty" class="qty-input form-control" value="1" style="text-align: center;
                                    background: none; border: none;">
                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer;">
                                        <span class="input-group-text">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <button class="btn btn-success" style="color: black">Stok Habis</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @else
            @if ($carts->where('products_id', $products->id)->count())
                <div class="row">
                    <div class="col-6">
                        <img src="{{ Storage::url($products->images) }}" alt=""
                        style="width: 100%">
                    </div>
                    <div class="col-6">
                        <a href="{{ url('produk/'. Auth::user()->id) }}"><p style="font-weight: bold"><i class="fa-solid fa-arrow-left"></i> <span style="text-decoration: underline">Kembali</span></p></a>
                        <h2 style="font-weight: bold">{{ $products->name }}</h2>
                        <p>{{ $products->description }}</p>

                        <p style="margin-top: 10px; margin-bottom: 0px"><span style="font-weight: bold">Berat :</span> {{ $products->weight }} <span style="text-transform: lowercase">(g)</span></p>
                        <p style="margin-bottom: 0px"><span style="font-weight: bold">Stok :</span> {{ $products->stok }}</p>
                        <div class="row">
                            <div class="col-6">
                                <p><span style="font-weight: bold">Rp :</span> {{ number_format( $products->price )}}</p>
                            </div>
                            <div class="col-6">
                                {{-- <button>-</button>
                                <input type="number" name="qty" id="qty" value="1">
                                <button>+</button> --}}
                                <div class="input-group quantity">
                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                        <span class="input-group-text">-</span>
                                    </div>
                                    <input type="text" name="qty" class="qty-input form-control" value="1" style="text-align: center;
                                    background: none; border: none;">
                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer;">
                                        <span class="input-group-text">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <button class="btn btn-success" style="color: black">Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <form action="{{ url('add-to-cart/'. $products->id ) }}">
                <div class="row">
                    <div class="col-6">
                        <img src="{{ Storage::url($products->images) }}" alt=""
                        style="width: 100%">
                    </div>
                    <div class="col-6">
                        <a href="{{ url('produk/'. Auth::user()->id) }}"><p style="font-weight: bold"><i class="fa-solid fa-arrow-left"></i> <span style="text-decoration: underline">Kembali</span></p></a>
                        <h2 style="font-weight: bold">{{ $products->name }}</h2>
                        <p>{{ $products->description }}</p>

                        <p style="margin-top: 10px; margin-bottom: 0px"><span style="font-weight: bold">Berat :</span> {{ $products->weight }} <span style="text-transform: lowercase">(g)</span></p>
                        <p style="margin-bottom: 0px"><span style="font-weight: bold">Stok :</span> {{ $products->stok }}</p>
                        <div class="row">
                            <div class="col-6">
                                <p><span style="font-weight: bold">Rp :</span> {{ number_format( $products->price )}}</p>
                            </div>
                            <div class="col-6">
                                {{-- <button>-</button>
                                <input type="number" name="qty" id="qty" value="1">
                                <button>+</button> --}}
                                <div class="input-group quantity">
                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                        <span class="input-group-text">-</span>
                                    </div>
                                    <input type="text" name="qty" class="qty-input form-control" value="1" style="text-align: center;
                                    background: none; border: none;">
                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer;">
                                        <span class="input-group-text">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <button class="btn btn-primary"><i class="fa-sharp fa-solid fa-cart-plus"></i> Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endif
            @endif
        </div>
    </div>
@endsection
@push('style')
    <style>
        .changeQuantity {
            width: 60px;
            outline: none;
            border-style: none;
            font-size: 20px;
            background: #babababa;
            text-align: center;
            font-weight: bold;
        }
        .changeQuantity:hover{
            width: 60px;
            outline: none;
            border-style: none;
            font-size: 20px;
            background: #636363ba;
            color: white;
            text-align: center;
            font-weight: bold;
        }
    </style>
@endpush
@push('script')
    <script>

         $(document).ready(function () {
            $('.increment-btn').click(function (e) {
                e.preventDefault();
                var incre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(incre_value, 10);
                value = isNaN(value) ? 0 : value;
                    value++;
                    $(this).parents('.quantity').find('.qty-input').val(value);
            });

            $('.decrement-btn').click(function (e) {
                e.preventDefault();
                var decre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(decre_value, 10);
                value = isNaN(value) ? 0 : value;
                    value--;
                    $(this).parents('.quantity').find('.qty-input').val(value);
            });
             $('.changeQuantity').click(function (e) {
                 e.preventDefault();

                 var quantity = $(this).closest(".quantity").find('.qty-input').val();
                //  var product_id = $(this).closest(".cartpage").find('.product_id').val();
                console.log(quantity);
                //  var data = {
                //      '_token': $('input[name=_token]').val(),
                //      'quantity':quantity,
                //      'product_id':product_id,
                //  };

                //  $.ajax({
                //      url: '/update-to-cart',
                //      type: 'POST',
                //      data: data,
                //      success: function (response) {
                //          window.location.reload();
                //          alertify.set('notifier','position','top-right');
                //          alertify.success(response.status);
                //      }
                //  });
             });

         });
    </script>
@endpush

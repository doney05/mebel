@extends('layouts.customer.app')
@section('title')
    Keranjang - Customer
@endsection
@section('content')
    <div class="title mb-4">
        <h4 class="m-b-lg">Keranjang</h4>
    </div>
    @php
        $total = 0;
    @endphp
    @if ($carts)
        @foreach ($carts as $item)
            @if ($item)
                @php
                    $total +=  $item->price;
                @endphp
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ Storage::url($item->product->images) }}" alt="" style="width: 100%">
                            </div>
                            <div class="col-4 text-start mt-3">
                                <h6 class="mb-2">{{ $item->product->name }}</h6>
                                <p class="mb-1">Kuantiti : {{ $item->qty }}</p>
                                <p>Berat : {{ $item->weight }}</p>
                            </div>
                            <div class="col-6 button">
                                <div class="input-group quantity">
                                    <input type="hidden" name="product_id" class="product_id" value="{{ $item->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                        <span class="input-group-text">-</span>
                                    </div>
                                    <input type="text" name="qty" class="qty-input form-control" value="{{ $item->qty }}" style="text-align: center;
                                    background: none; border: none;">
                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer;">
                                        <span class="input-group-text">+</span>
                                    </div>
                                </div>
                                <div class="total-sub mx-5 text-center mt-3">
                                    <h6>Grand Total</h6>
                                    <p>Rp. {{ number_format($item->price )}}</p>
                                </div>
                                <div class="remove">
                                    <input type="hidden" name="product_id" class="product_id" value="{{ $item->id }}">
                                    <button type="button" class="delete" style="background: none; border:none"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <div class="title">
                            <p>Tidak ada keranjang</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
    <div class="card">
        <div class="card-body">
            <div class="title">
                <p>Tidak ada keranjang</p>
            </div>
        </div>
    </div>
    @endif
    <div class="harga-total" style="display: flex; justify-content: center;">
        <div class="card" style="position: fixed; top: 80%; width: 50%; margin-top: 42px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h6>Jumlah Produk</h6>
                        <h6>Harga Total</h6>
                    </div>
                    <div class="col-4 text-end">
                        <p class="mb-1" style="font-size: 14px; font-weight: bold;">{{ $hasil }} Produk</p>
                        <p style="font-size: 14px; font-weight: bold;">Rp. {{ number_format($total) }}</p>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lengkapi profile terlebih dahulu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('checkout/'. Auth::user()->id ) }}" method="POST">
            @csrf
            <div class="modal-body">
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    @foreach ($carts as $item)
                    <input type="hidden" name="products_id[]" value="{{ $item->product->id }}">
                    <input type="hidden" name="carts_id[]" value="{{ $item->id }}">
                    <input type="hidden" name="qty[]" value="{{ $item->qty }}">
                    <input type="hidden" name="weight[]" value="{{ $item->weight }}">
                    <input type="hidden" name="price[]" value="{{ $item->price }}">
                    @endforeach
                    <input type="hidden" name="total" value="{{ $total }}">
                    @if ($alamat)
                        <div class="form-group">
                            <label for="province">Nama</label>
                            <input type="text" value="{{ $user[0]['name'] }}" class="form-control" placeholder="{{ $user[0]['name'] }}" readonly>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="province">Nomor Telepon</label>
                            <input type="text" name="phone" value="{{ $alamat->phone }}" class="form-control" placeholder="{{ $alamat->phone }}" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="province">Provinsi</label>
                            <select name="provinces_id" id="provinces_id" class="form-control" required>
                                <option value="{{ $alamat->provinces_id }}">{{ $alamat->province->title }}</option>
                                @foreach ($provinces as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Kota</label>
                            <select name="cities_id" id="cities_id" class="form-control" required>
                                <option value="{{ $alamat->cities_id }}">{{ $alamat->city->title }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{ $alamat->alamat }}</textarea>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="province">Nama</label>
                            <input type="text" class="form-control" value="{{ $user[0]['name'] }}" placeholder="{{ $user[0]['name'] }}" readonly>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="province">Nomor Telepon</label>
                            <input type="text" name="phone" value="" class="form-control" placeholder="Nomor Telepon" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="province">Provinsi</label>
                            <select name="provinces_id" id="provinces_id" class="form-control" required>
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Kota</label>
                            <select name="cities_id" id="cities_id" class="form-control" required>
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('style')
    <style>
        .button{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .quantity{
            width: 30%;
        }
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

                 var thisClick = $(this);
                 var quantity = $(this).closest(".quantity").find('.qty-input').val();
                 var product_id = $(this).closest(".quantity").find('.product_id').val();
                 var data = {
                     '_token': $('input[name=_token]').val(),
                     'quantity':quantity,
                     'product_id':product_id,
                    };
                console.log(data);

                 $.ajax({
                     url: '/update-to-cart/'+product_id,
                     method: 'POST',
                     data: data,
                     success: function (response) {
                         window.location.reload();
                        //  alertify.set('notifier','position','top-right');
                        //  alertify.success(response.status);
                     }
                 });
             });

            $('.delete').click(function (e) {
                e.preventDefault();

                var product_id = $(this).closest(".remove").find('.product_id').val();

                var data = {
                    '_token': $('input[name=_token]').val(),
                    "product_id": product_id,
                };

                console.log(data);
            // $(this).closest(".cartpage").remove();

                $.ajax({
                    url: '/delete-from-cart/'+product_id,
                    type: 'DELETE',
                    data: data,
                    success: function (response) {
                        window.location.reload();
                        }
                });
            });

            $('#provinces_id').on('change', function(){
                let provinceId = $(this).val()
                if (provinceId) {
                    // console.log(provinceId);
                    jQuery.ajax({
                        url: '/getcity/'+provinceId,
                        type: 'GET',
                        data: 'json',
                        success:function(data){
                            $('#cities_id').empty();
                            $('#cities_id').append('<option>Pilih Kota </option>');
                            $.each(JSON.parse(data), function(key, title){
                                $('#cities_id').append('<option value="' + key + '">' + title + '</option>');
                            });
                        }
                    });
                }else{
                    $('#cities_id').empty();
                }
                // console.log(provinceId);
            })
         });
    </script>
@endpush

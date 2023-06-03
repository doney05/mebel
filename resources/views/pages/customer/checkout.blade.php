@extends('layouts.customer.app')

@section('content')
    <div class="title mb-4">
        <h4 class="m-b-lg">Checkout</h4>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="title">
                <h5>Pilihan Pengiriman</h5>
            </div>
            <hr>
            <form action="{{ url('simpan-ongkir/'. Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="kurir">Pilih Ekspedisi</label>
                            <select name="courier" id="courier" class="form-control">
                                <option value="">Pilih Ekspedisi</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS Indonesia</option>
                                <option value="tiki">TIKI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="layanan">Pilih Layanan</label>
                            <select name="layanan" id="layanan" class="form-control">
                                <option value="">Pilih Layanan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <br>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h6>Total Produk</h6>
                    <h6>Ongkos Kirim</h6>
                    <h6>Layanan Kirim</h6>
                    <h6>Harga Keseluruhan</h6>
                </div>
                <div class="col-6" style="text-align: end; font-size: 14px">
                    <p>{{ $hasil }} Produk</p>
                    <p style="margin-top: -13px;">Rp. {{ number_format($alamat->ongkir) }}</p>
                    @if ($alamat->kurir == true)
                    <p style="margin-top: -13px;">{{ $alamat->kurir }}</p>
                    <p style="margin-top: -13px;">Rp. {{ number_format($harga + $alamat->ongkir) }}</p>
                    @else
                    <p style="margin-top: -13px;">-</p>
                    <p style="margin-top: -13px;">Rp. {{ number_format($harga) }}</p>
                    @endif
                </div>
            </div>
           <div class="isi mt-3">
            <table class="table table-bordered">
                <thead>
                    {{-- {{ dd($snapToken) }} --}}
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Beli</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp. {{ number_format($item->price) }}</td>
                        <td>Unpaid</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bayar mt-4 d-flex justify-content-end">
                @if (!empty($alamat->ongkir))
                {{-- <form action="{{ url('payment/'. Auth::user()->id) }}" method="POST">
                    @csrf --}}
                    <button type="submit" id="pay-button" class="btn btn-bayar btn-primary">Bayar Sekarang</button>
                {{-- </form> --}}
                @else
                {{-- <form action="{{ url('payment/'. Auth::user()->id) }}" method="POST">
                    @csrf --}}
                    <button class="btn btn-bayar btn-primary">Bayar Sekarang</button>
                {{-- </form> --}}
                @endif
            </div>
           </div>
        </div>
    </div>
@endsection
@push('script')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        $(document).ready(function(){
            $('#courier').on('change', function(){
                let courier = $(this).val();

                // console.log(courier);
                if (courier) {
                    $.ajax({
                       url: '/get-ongkir/'+courier,
                       type: 'GET',
                       data: 'json',
                       success:function(data){
                        $('#layanan').empty();
                        var ongkir = data['rajaongkir']['results'][0]['costs'];
                        // console.log(ongkir);
                        $('#layanan').append('<option disabled>Pilih Layanan</option>');
                        $.each(ongkir, function(key, val){
                            $('#layanan').append('<option value="' + val['service'] + '">' + val['service'] + ' ' +
                                '('+ val['description'] + ')' + ' - ' + 'Est. ' + val['cost'][0]['etd'] + ' - ' + 'Rp. ' + val['cost'][0]['value'] + '</option>');
                        })
                       }
                    });
                }
            })
        });
    </script>
       <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                window.location.href = '/checkout-success/{{ Auth::user()->id }}'
            }
          });

          // customer will be redirected after completing payment pop-up
        });
      </script>
@endpush

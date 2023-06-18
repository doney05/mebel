<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}">
    <!-- icon -->
    <link rel="icon" href="{{ asset('admin/assets/img/log.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Invoice</title>
</head>
<style>
    .left{
        width: 100%;
        text-align: end;
    }
    .left h5{
        color: rgb(0, 225, 0);
        font-weight: bold;
    }
    .left p{
        font-weight: 500;
    }
    .pembeli .untuk {
        font-weight: bold
    }
    .total-harga .harga{
        font-weight: bold
    }
    .total-harga .belanja {
        font-weight: bold
    }

</style>
<body>
    <section class="header ">
        <div class="container">
            <div class="left mt-5">
                <h5>INVOICE</h5>
                <p>{{ $pay[0]['payment'][0]['invoice']['invoice'] }}</p>
            </div>
            <div class="pembeli mb-4">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <div class="images d-flex justify-content-end">
                                    <img src="{{ asset('client/assets/images/logo.png') }}" alt="" style="width:60%;">
                                </div>
                            </div>
                            <div class="col-9">
                                <p class="untuk">Penjual</p>
                                <p>Murah Prima Furniture</p>
                                <p>Jl. Gondangmanis, Gondangmanis, Bae, Kudus</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="untuk">Untuk</p>
                        <div class="row">
                            <div class="col-4">
                                <p>Pembeli</p>
                            </div>
                            :
                            <div class="col-6">
                                <p>{{ $pay[0]['user']['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p>Tanggal Pembelian</p>
                            </div>
                            :
                            <div class="col-6">
                                <p>{{ \Carbon\Carbon::parse($pay[0]['updated_at'])->format('Y-m-d') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p>Alamat Pengiriman</p>
                            </div>
                            :
                            <div class="col-6">
                                <p>{{ $pay[0]['alamat']['alamat'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overlay">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>INFO PRODUK</th>
                            <th>JUMLAH</th>
                            <th>HARGA PRODUK</th>
                            <th>TOTAL HARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($pay[0]['payment'] as $item)
                        @php
                            $total += $item['price'];
                        @endphp
                        <tr>
                            <td style="color: rgb(0, 169, 0)">{{ $item['product']['name'] }}</td>
                            <td>{{ $item['qty'] }}</td>
                            <td>Rp. {{ number_format($item['product']['price']) }}</td>
                            <td>Rp. {{ number_format($item['price']) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="total-harga">
                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-6">
                        <div class="row harga">
                            <div class="col-6">
                                <p>TOTAL HARGA ({{ count($pay[0]['payment']) }}) BARANG</p>
                            </div>
                            <div class="col-6">
                                <p>Rp. {{ number_format($total) }}</p>
                            </div>
                        </div>
                        <div class="row ongkir">
                            <div class="col-6">
                                <p>Total Ongkos Kirim</p>
                            </div>
                            <div class="col-6">
                                <p>Rp. {{ number_format($pay[0]['ongkir']) }}</p>
                            </div>
                        </div>
                        <div class="row belanja">
                            <div class="col-6">
                                <p>TOTAL BELANJA</p>
                            </div>
                            <div class="col-6">
                                <p>Rp. {{ number_format($total + $pay[0]['ongkir']) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="bayar mb-5">
                <div class="row">
                    <div class="col-6">
                        <p>Kurir <br> <span style="font-weight:bold">{{ $pay[0]['kurir'] }}</span></p>
                    </div>
                    <div class="col-6">
                        <p>Metode Pembayaran <br> <span style="font-weight:bold">{{ $pay[0]['bank'] }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    // window.print()
</script>
<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/tether.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/highcharts.js') }}"></script>
<script src="{{ asset('admin/assets/js/chart.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
</html>

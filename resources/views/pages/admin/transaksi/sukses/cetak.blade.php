<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('client/assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <title>Cetak Laporan Data Penjualan</title>
</head>
<body>
<section class="header">
    <div class="container mt-5">
        <h4 class="text-center mb-4">Laporan Data Penjualan</h4>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah Beli</th>
                    <th>Harga Total</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pays as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['user']['name'] }}</td>
                        <td>{{ count($item['payment']) }} Produk</td>
                        <td>Rp. {{ number_format($item['total']) }}</td>
                        <td>{{ $item->user->alamat()->latest()->first()->phone }}</td>
                        <td>{{ $item->user->alamat()->latest()->first()->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
</body>
<script>
    window.print();
</script>
</html>


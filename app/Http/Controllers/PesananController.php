<?php

namespace App\Http\Controllers;

use App\Models\AlamatTujuan;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Product;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PesananController extends Controller
{
    public function index(Request $request, $id)
    {

        $cart = Cart::with(['user', 'product'])->where('users_id', $id)->whereIn('id', $request->carts_id)
        ->whereIn('qty', $request->qty)->get();
        $product = Product::with(['cart' ,'cartdetail'])->whereIn('id', $request->products_id)->get()->toArray();

        // dd($request->all());


        // $pesan = [
        //     'users_id' => Auth::user()->id,
        //     'tanggal' => Carbon::now(),
        //     'status' => 0,
        // ];
        // $pesanan = Pesanan::create($pesan);

        $id_prod = array();
        for ($i=0; $i < sizeof($request->products_id); $i++) {
            $prod = $request->products_id[$i];
            array_push($id_prod, $prod);
        }

        // dd($id_prod);
        // $product_id = implode(',', $id_prod);
        $alamat = [
            'users_id' => Auth::user()->id,
            // 'products_id' => $product_id,
            // 'pesanans_id' => $pesanan->id,
            'provinces_id' => $request->provinces_id,
            'cities_id' => $request->cities_id,
            'alamat' => $request->alamat,
            // 'jumlah_harga' => $request->total
        ];
        $alamatTujuan = AlamatTujuan::create($alamat);

        $kuan = $request->qty;
        $weight = $request->weight;
        $price = $request->price;

        // save to model cart detail
        for ($i=0; $i < sizeof($product); $i++) {
            for ($j=0; $j < sizeof($product[$i]['cart']); $j++) {
                $cart = $product[$i]['cart'][$j]['id'];
                $data = [
                    'users_id' => Auth::user()->id,
                    'products_id' => $product[$i]['id'],
                    'carts_id' => $cart,
                    'alamat_tujuans_id' => $alamatTujuan->id,
                    'qty' => $kuan[$i],
                    'weight' => $weight[$i],
                    'price' => $price[$i]
                ];
                // dd($data);
                DB::table('cart_details')->insert($data);
            }
        }
        return redirect('checkout/index/'.$id);
    }
    public function checkout(Request $request, $id)
    {
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        $detail = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', Auth::user()->id)->get();
        $hasil = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', Auth::user()->id)->count();
        $harga = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', Auth::user()->id)->get()->sum('price');
        $alamat = AlamatTujuan::with(['user', 'province', 'city'])->where('users_id', Auth::user()->id)->first();
        // dd($alamat);
        return view('pages.customer.checkout', compact('carts', 'detail', 'hasil', 'harga', 'alamat'));
    }
    public function cekOngkir(Request $request, $id)
    {
        $alamatTujuan = AlamatTujuan::where('users_id', Auth::user()->id)->first();
        $weight = CartDetail::with(['user', 'product', 'cart'])->where('users_id', Auth::user()->id)->get()->sum('weight');
        // $price = CartDetail::with(['user', 'product', 'cart'])->where('users_id', Auth::user()->id)->get()->sum('price');
        // dd($price);
        $cek = Http::withHeaders([
            'key' => 'efcf87824a2fd93eb0bf4ad016d676c8'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 209,
            'destination' => $alamatTujuan->cities_id,
            'weight' => $weight,
            'courier' => $id
        ]);
        $data = json_decode($cek, true);
        return response()->json($data);
        // dd($cek['rajaongkir']['results']);
    }
    public function saveOngkir(Request $request, $id)
    {
        $alamatTujuan = AlamatTujuan::where('users_id', Auth::user()->id)->first();
        $weight = CartDetail::with(['user', 'product', 'cart'])->where('users_id', Auth::user()->id)->get()->sum('weight');
        // $price = CartDetail::with(['user', 'product', 'cart'])->where('users_id', Auth::user()->id)->get()->sum('price');
        // dd($price);

        $cek = Http::withHeaders([
            'key' => 'efcf87824a2fd93eb0bf4ad016d676c8'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 209,
            'destination' => $alamatTujuan->cities_id,
            'weight' => $weight,
            'courier' => $request->courier
        ]);
        $data = json_decode($cek, true);
        $layananOngkir = $data['rajaongkir']['results'][0]['costs'];
        $ongkos = [];
        for ($i=0; $i < sizeof($layananOngkir); $i++) {
            if ($layananOngkir[$i]['service'] == $request->layanan) {
                $get = $layananOngkir[$i];
                array_push($ongkos, $get);
            }
        }
        $kurir = strtoupper($data['rajaongkir']['results'][0]['code']);
        $layanan = $ongkos[0]['description'];

        $courier = $kurir .' - '. $layanan;
        $ongkir = $ongkos[0]['cost'][0]['value'];

        $data = [
            'users_id' => Auth::user()->id,
            'provinces_id' => $alamatTujuan->provinces_id,
            'cities_id' => $alamatTujuan->cities_id,
            'kurir' => $courier,
            'ongkir' => $ongkir,
            'alamat' => $alamatTujuan->alamat
        ];
        $alamatTujuan->update($data);
        return redirect()->route('checkout', $id);
    }
}

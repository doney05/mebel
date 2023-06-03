<?php

namespace App\Http\Controllers;

use App\Models\AlamatTujuan;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Invoice;
use App\Models\PaymentDetail;
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

        $products_id = join(',', $request->products_id);
        $qty = join(',', $request->qty);
        // dd($request->all(), $products_id, $qty);


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
            'phone' => $request->phone,
            'provinces_id' => $request->provinces_id,
            'cities_id' => $request->cities_id,
            'alamat' => $request->alamat,
            // 'jumlah_harga' => $request->total
        ];
        // dd($alamat);
        $alamatTujuan = AlamatTujuan::firstOrCreate($alamat);

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

        // save to payment detail
        $detail = [
            'users_id' => Auth::user()->id,
            'products_id' => $products_id,
            'alamat_tujuans_id' => $alamatTujuan->id,
            'qty' => $qty,
            'total' => $request->total,
            'status' => 'Unpaid'
        ];

        DB::table('payment_details')->insert($detail);
        $payment_detail = PaymentDetail::where('users_id', Auth::user()->id)->count();

        $token = '-BD2XIedk8gj6w9dQXf9';
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.fonnte.com/send',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array(
        'target' => $alamatTujuan->phone,
        'message' => 'Hai. Masih ada barang di keranjang nih. Jangan lupa di checkout yaa...',
        'delay'=> '2-5',
        ),
          CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
          ),
        ));

        $response = curl_exec($curl);
        // dd($response);
        curl_close($curl);
        echo $response;

        return redirect('checkout/index/'.$id);
    }
    public function checkout(Request $request, $id)
    {
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        $detail = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', Auth::user()->id)->get();
        $hasil = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', Auth::user()->id)->count();
        $harga = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', Auth::user()->id)->get()->sum('price');
        $alamat = AlamatTujuan::with(['user', 'province', 'city'])->where('users_id', Auth::user()->id)->first();
        $deCart = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', $id)->get()->toArray();
        $totalCart = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', $id)->get()->sum('price');
        $phone = AlamatTujuan::where('users_id', Auth::user()->id)->first()->toArray();
        $payment = PaymentDetail::with(['user', 'alamat'])->where('users_id', Auth::user()->id)->get()->toArray();
        // dd($payment);

        if ($alamat->ongkir == null) {
            $totalAll = $totalCart;
            // dd($totalAll);
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            $params = array();
            for ($i=0; $i < sizeof($payment); $i++) {
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $payment[$i]['id'],
                        'gross_amount' => $totalAll,
                    ),
                    'customer_details' => array(
                        'first_name' => $payment[$i]['user']['name'],
                        'email' => $payment[$i]['user']['email'],
                        'phone' => $phone['phone'],
                    ),
                );
            }
            // dd($params);
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return view('pages.customer.checkout', compact('carts', 'detail', 'hasil', 'harga', 'alamat', 'snapToken'));
        }else {
            $totalAll = $totalCart + $alamat->ongkir;
            // dd($totalAll);
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            $params = array();
            for ($i=0; $i < sizeof($payment); $i++) {
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $payment[$i]['id'],
                        'gross_amount' => $totalAll,
                    ),
                    'customer_details' => array(
                        'first_name' => $payment[$i]['user']['name'],
                        'email' => $payment[$i]['user']['email'],
                        'phone' => $phone['phone'],
                    ),
                );
            }
            // dd($params);
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // dd($alamat);
            return view('pages.customer.checkout', compact('carts', 'detail', 'hasil', 'harga', 'alamat', 'snapToken'));
        }

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
        // $deCart = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', $id)->get()->toArray();
        // $totalCart = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', $id)->get()->sum('price');
        $weight = CartDetail::with(['user', 'product', 'cart'])->where('users_id', Auth::user()->id)->get()->sum('weight');
        // $price = CartDetail::with(['user', 'product', 'cart'])->where('users_id', Auth::user()->id)->get()->sum('price');
        // dd($deCart);

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
        // $totalAll = $totalCart + $ongkir;
        // $phone = AlamatTujuan::where('users_id', Auth::user()->id)->first()->toArray();

        // dd($phone);


        return redirect()->route('checkout', $id);
    }
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        // dd($serverKey);
        if ($hashed == $request->signature_key) {
            // dd($request->transaction_status);
            if ($request->transaction_status == 'capture') {
                $pay = PaymentDetail::find($request->order_id);
                $paytype = $request->payment_type;
                $pay->update([
                            'total' => $request->gross_amount,
                            'status' => 'Paid',
                            'payment_type' => $paytype,
                            'bank' => $request->bank
                            ]);

                $cart = CartDetail::with(['user', 'product', 'cart', 'alamat'])->get()->toArray();
                // dd($cart);

                for ($j=0; $j < sizeof($cart); $j++) {
                    $pesan = [
                        'users_id' =>$cart[$j]['user']['id'],
                        'tanggal' => Carbon::now(),
                    ];
                    $invoice = Invoice::create($pesan);
                    $data = [
                        'users_id' =>$cart[$j]['user']['id'],
                        'alamat_tujuans_id' => $cart[$j]['alamat']['id'],
                        'products_id' => $cart[$j]['product']['id'],
                        'invoices_id' => $invoice->id,
                        'payment_details_id' => $pay->id,
                        'qty' => $cart[$j]['qty'],
                        'weight' => $cart[$j]['weight'],
                        'price' => $cart[$j]['price'],
                    ];
                    DB::table('payments')->insert($data);
               }
            }
        }else if ($request->transaction_status == 'settlement') {
            $paytype = $request->payment_type;
            $van = $request->va_numbers;
            $va = $van[0]['va_number'];
            $bank = $van[0]['bank'];
            // dd($paytype, $va, $bank);
            $pay = PaymentDetail::find($request->order_id);
            $pay->update([
                        'total' => $request->gross_amount,
                        'status' => 'Paid',
                        'payment_type' => $paytype,
                        'bank' => $bank,
                        'va_number' => $va
                        ]);

            $cart = CartDetail::with(['user', 'product', 'cart', 'alamat'])->get()->toArray();
            // dd($cart);

            for ($j=0; $j < sizeof($cart); $j++) {
                $pesan = [
                    'users_id' =>$cart[$j]['user']['id'],
                    'tanggal' => Carbon::now(),
                ];
                $invoice = Invoice::create($pesan);
                $data = [
                    'users_id' =>$cart[$j]['user']['id'],
                    'alamat_tujuans_id' => $cart[$j]['alamat']['id'],
                    'products_id' => $cart[$j]['product']['id'],
                    'invoices_id' => $invoice->id,
                    'payment_details_id' => $pay->id,
                    'qty' => $cart[$j]['qty'],
                    'weight' => $cart[$j]['weight'],
                    'price' => $cart[$j]['price'],
                ];
                DB::table('payments')->insert($data);
            }
        }


        // $deCart = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', $id)->get()->toArray();
        // $total = CartDetail::with(['user', 'product', 'cart', 'alamat'])->where('users_id', $id)->get()->sum('price');
        // // dd($deCart);


        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // for ($i=0; $i < sizeof($deCart); $i++) {
        //     $data = array(
        //         'users_id' => $deCart[$i]['user']['id'],
        //         'alamat_tujuans_id' => $deCart[$i]['alamat']['id'],
        //         'products_id' => $deCart[$i]['product']['id'],
        //         'cart_details_id' => $deCart[$i]['id'],
        //         'total' => $deCart[$i]['price'],
        //         'status'=> 'Paid'
        //     );
        //     DB::table('payment_details')->insert($data);
        // }
        // $ar = PaymentDetail::with(['user', 'product', 'cartdetail'])->where('users_id', Auth::user()->id)->get();
        // // $total = PaymentDetail::with(['user', 'product', 'cartdetail'])->where('users_id', Auth::user()->id)->get()->sum('total');
        // // dd($total);
        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => 10000,
        //     ),
        //     'customer_details' => array(
        //         'first_name' => 'budi',
        //         'last_name' => 'pratama',
        //         'email' => 'budi.pra@example.com',
        //         'phone' => '08111222333',
        //     ),
        // );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);
    }
    public function success($id)
    {
        $alamat = AlamatTujuan::where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
        // dd($alamat);
        $token = '-BD2XIedk8gj6w9dQXf9';
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $alamat->phone,
        'message' => 'Pembayaran berhasil. Cek status pembayaran Anda di Aplikasi...',
        'delay'=> '2-5',
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
        ),
        ));

        $response = curl_exec($curl);
        // dd($response);
        curl_close($curl);
        // echo $response;
        return view('pages.customer.checkout-success');
    }
}

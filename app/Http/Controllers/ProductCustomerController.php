<?php

namespace App\Http\Controllers;

use App\Models\AlamatTujuan;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\City;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\PesananDetail;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCustomerController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        $cart = Cart::where('users_id', Auth::user()->id)->count();
        $payD = PaymentDetail::where('users_id', Auth::user()->id)->where('status', '=', 'Paid')->count();
        $pay = Payment::where('users_id', Auth::user()->id)->count();

        return view('pages.customer.dashboard', compact('carts', 'cart', 'pay', 'payD'));
    }
    public function product($id)
    {
        $products = Product::all();
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        return view('pages.customer.product', compact('products', 'carts'));
    }
    public function productdetail($id)
    {
        $products = Product::findOrFail($id);
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        return view('pages.customer.product-detail', compact('products', 'carts'));
    }
    public function addCart(Request $request, $id)
    {
        $cart = Product::findOrFail($id);
        $data = [
            'users_id' => Auth::user()->id,
            'products_id' => $cart->id,
            'weight' => $request->qty * $cart->weight,
            'price' => $request->qty * $cart->price,
            'qty' => $request->qty
        ];
        // dd($data);
        Cart::create($data);
        return redirect('produk/'. Auth::user()->id);
    }
    public function cart(Request $request, $id)
    {
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        $provinces = Province::all();
        $alamat = AlamatTujuan::with(['user', 'province', 'city', 'cartdetail'])->where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
        $hasil = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->count();
        $user = User::where('id', Auth::user()->id)->get()->toArray();
        // dd($user);
        return view('pages.customer.keranjang', compact('id', 'carts', 'provinces', 'user', 'alamat', 'hasil'));
    }
    public function getCity($id)
    {
        // dd($id);
        // $provinsi = Province::find($id);
        $city = City::with(['province'])->where('provinces_id', $id)->pluck('title', 'id');
        // dd($city);
        return json_encode($city);
    }
    public function updateCart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $item = Cart::with(['user', 'product'])->find($prod_id);

        $data = [
            'users_id' => $item->users_id,
            'products_id' => $item->products_id,
            'qty' => $quantity,
            'weight' => $quantity * $item->product->weight,
            'price' => $quantity * $item->product->price
        ];
        // dd($data);
        $item->update($data);
        return response()->json('success');
        // dd($data);
    }
    public function deleteCart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $item = Cart::with(['user', 'product'])->find($prod_id);
        // dd($item);
        // $data = [
        //     'users_id' => $item->users_id,
        //     'products_id' => $item->products_id,
        //     'qty' => $quantity,
        //     'weight' => $quantity * $item->product->weight,
        //     'price' => $quantity * $item->product->price
        // ];
        // // dd($data);
        $item->delete();
        return response()->json('success');
        // dd($data);
    }

}

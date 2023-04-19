<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCustomerController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        return view('pages.customer.dashboard', compact('carts'));
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
            'weight' => $cart->weight,
            'price' => $cart->price,
            'qty' => $request->qty
        ];
        // dd($data);
        Cart::create($data);
        return redirect('produk/'. Auth::user()->id);
    }
    public function cart(Request $request, $id)
    {
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        return view('pages.customer.keranjang', compact('id', 'carts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index($id)
    {
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        $history = Payment::with(['user', 'product', 'invoice', 'detail', 'alamat'])->where('users_id', $id)->get();
        $pay = PaymentDetail::with(['user.payment', 'user.invoice', 'user.payment.product', 'payment'])->where('users_id', $id)->orderBy('id', 'DESC')->get()->toArray();
        // $totalProduk = count($pay[0]['user']['payment']);
        // dd($pay);
        return view('pages.customer.history', compact('history', 'pay', 'carts'));
    }
    public function invoice(Request $request, $id)
    {
        $pay = PaymentDetail::with(['user.payment', 'user.invoice', 'user.payment.product', 'payment', 'payment.product', 'payment.invoice', 'alamat'])->where('id', $id)->get()->toArray();
        // dd($pay);

        return view('pages.customer.invoice', compact('pay'));

    }
}

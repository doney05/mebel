<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function sukses()
    {
        $pays = PaymentDetail::with(['user.payment','user.invoice', 'user.payment.product', 'payment'])->orderBy('id', 'DESC')->get()->toArray();
        $totalProduk = count($pays[0]['user']['payment']);

        // dd($pays);
        return view('pages.admin.transaksi.sukses.index', compact('pays', 'totalProduk'));
    }
    public function invoice(Request $request, $id)
    {
        $pay = PaymentDetail::with(['user.payment', 'user.invoice', 'user.payment.product', 'payment', 'payment.product', 'payment.invoice', 'alamat'])->where('id', $id)->get()->toArray();
        // dd($pay);

        return view('pages.admin.transaksi.sukses.invoice', compact('pay'));

    }
    public function suksesDelete(Request $request, $id)
    {
        $pays = PaymentDetail::where('id', $id)->delete();
        // dd($pays);
        // $totalProduk = count($pays[0]['user']['payment']);

        // dd($pays);
        return redirect()->route('transaksi.sukses');
    }
    public function batal()
    {
        $pays = PaymentDetail::with(['user.payment','user.invoice', 'user.payment.product', 'payment'])->orderBy('id', 'DESC')->get()->toArray();
        $totalProduk = count($pays[0]['user']['payment']);

        // dd($pays);
        return view('pages.admin.transaksi.batal.index', compact('pays', 'totalProduk'));
    }
    public function batalDelete(Request $request, $id)
    {
        $pays = PaymentDetail::where('id', $id)->delete();
        // dd($pays);
        // $totalProduk = count($pays[0]['user']['payment']);

        // dd($pays);
        return redirect()->route('transaksi.batal');
    }
}
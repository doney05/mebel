<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::all()->count();
        $sukses = PaymentDetail::where('status', '=', 'Paid')->count();
        $batal = PaymentDetail::where('status', '=', 'Unpaid')->count();
        $user = User::where('role', '=', 'USER')->count();
        // dd($user);
        return view('pages.admin.dashboard', compact('product', 'sukses', 'batal', 'user'));
    }
}

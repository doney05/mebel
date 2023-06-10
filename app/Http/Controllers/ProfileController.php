<?php

namespace App\Http\Controllers;

use App\Models\AlamatTujuan;
use App\Models\Cart;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index($id)
    {
        $carts = Cart::with(['user', 'product'])->where('users_id', Auth::user()->id)->get();
        $cart = Cart::where('users_id', Auth::user()->id)->count();
        $user = User::where('id', Auth::user()->id)->get();
        $alamat = AlamatTujuan::with(['user', 'province'])->where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
        $provinces = Province::all();

        // dd($user, $alamat, $provinces);
        return view('pages.customer.profile', compact('carts', 'cart', 'user', 'alamat', 'provinces'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::where('id', Auth::user()->id)->first();
        $alamat = AlamatTujuan::with(['user', 'province'])->where('users_id', Auth::user()->id)->first();

        $dataUser = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $user->role,
        ];

        $dataAl = [
            'users_id' => Auth::user()->id,
            'provinces_id' => $request->provinces_id,
            'cities_id' => $request->cities_id,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
        ];
        $user->update($dataUser);
        DB::table('alamat_tujuans')->where('users_id', Auth::user()->id)->insert($dataAl);

        return redirect('profile/'.$id);

    }
}

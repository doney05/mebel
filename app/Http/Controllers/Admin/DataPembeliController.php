<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlamatTujuan;
use App\Models\User;
use Illuminate\Http\Request;

class DataPembeliController extends Controller
{
    public function index()
    {
        $user = User::with(['alamat', 'paymentdetail'])->where('role', '=', 'USER')->orderBy('id', 'DESC')->get();
        // dd($user);
        return view('pages.admin.data-pembeli.index', compact('user'));
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('data-pembeli.index')->with('success', 'berhasil hapus produk');
    }
}

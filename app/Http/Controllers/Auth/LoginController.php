<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (!empty($credentials['email'])) {

            $user = User::where('email', $credentials['email'])->first()->toArray();
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $role = Auth::user()->role;
                switch ($role) {
                    case 'ADMIN':
                    return redirect()->route('admin.dashboard');
                    break;
                    case 'USER':
                    return redirect('/');
                    break;
                }
            }elseif ($user['google_id'] != null) {
                $google = User::where('google_id', $user['google_id'])->first();
                // $request->session()->regenerate();
                Auth::login($google);
                // dd($roles);

                // $roles = $google['role'];
                return redirect('/');
                // switch ($roles) {
                //     case 'ADMIN':
                //     return redirect()->route('admin.dashboard');
                //     break;
                //     case 'USER':
                //     break;
                // }
            }
            dd($user);
        }else {
            return back()->withErrors([
                'email' => 'Email belum terdaftar!'
                ]);
        }
        //    $role = Auth::user()->role;
    //    switch ($role) {
    //        case 'ADMIN':
    //            return 'admin/dashboard';
    //            break;
    //        case 'USER':
    //            return '/';
    //            break;
    //    }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

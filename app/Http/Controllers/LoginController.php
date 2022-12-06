<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);
        
        $user = DB::select('select * from user where nip = ?',[$request->nip])[0];
        // $user = $user->u;
        if($user){
            if(password_verify($request->password, $user->password)){
                
                                return redirect('/home/index');
            }
            $nip = $request->nip;
            // $password = $request->password;
            
        }

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/home')->with('loginSuccess');
        // }
        return back()->with('loginError', "Yah, Login Gagal!");
    }

    public function logout(Request $request)
    {
        // dd('masuk gan');
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success','Yee, kamu sudah keluar. Sampai ketemu lagi.');
    }
}
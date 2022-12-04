<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function regindex() {
        
        return view('regis.index')
            ->with('datas', $datas);
    }

    public function logindex() {
        
        return view('login.index')
            ->with('datas', $datas);
    }

    
    public function registrasi(){
        $datas = DB::select('select * from user');
        return view('user.index')
        -with('datas', $datas);
    }
    
    public function create() {
        return view('user.add');
    }
    
    public function store(Request $request) {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'bagian' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);
        
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO user(nip, nama, jabatan, bagian, alamat, password) VALUES (:nip, :nama, :jabatan, :bagian, :alamat, :password)',
        [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'bagian' => $request->bagian,
            'alamat' => $request->alamat,
            'password' => $request->password,
            
            ]
        );
        
        return redirect()->route('user.index')->with('success', 'Registrasi Berhasil');
    }
    
    public function login() {
        $user = DB::table('user')->where('nip',$request->input('nip'))
        ->first();

        if(Hash::check($user->password, 
        Hash::make($request->input('password')))){
            echo"Password current"; 
        }else{ 
            echo "Password Wrong";
        }
    }
}
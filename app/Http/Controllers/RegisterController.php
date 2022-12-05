<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|min:8|max:100|unique:user',
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'bagian' => 'required|max:255',
            'alamat' => 'required|max:255',
            'password' => 'required|min:8|max:255'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        // dd('masuk');
        DB::insert('INSERT INTO  user(nip, nama, jabatan, bagian, alamat, password) VALUES(?, ?, ? ,?, ?, ?)',
        [
            $validatedData['nip'],
            $validatedData['nama'],
            $validatedData['jabatan'],
            $validatedData['bagian'],
            $validatedData['alamat'],
            $validatedData['password'],
        ]);
        // User::create($validatedData);

        return redirect('/login')->with('success', 'Yee, Registrasi Berhasil!!');
    }
}
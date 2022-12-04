<?php

namespace App\Http\Controllers;

use App\Http\Models\Sium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiumController extends Controller
{
    public function index() {
        $datas = DB::select('select * from sium');

        return view('sium.index')
            ->with('datas', $datas);
    }

    public function search(Request $request) {
        
        if($request->has('search')){
            $datas = DB::table('sium')->where('no_sium','like','%'.$request->search.'%')->paginate(5);
        }else{
            $datas = DB::table('sium')->paginate(5);
        }
        return view('sium.index')
        ->with('datas', $datas);
    }


    // public function index()
    // {
    //     $datas = DB::select('SELECT * FROM `sium` WHERE no_sium = 0');
    //     return view('sium.index')->with('datas', $datas);
    // }

    public function create() {
        return view('sium.add');
    }

    public function store(Request $request) {
        $request->validate([
            'no_sium' => 'required',
            'tgl_surat' => 'required',
            'tentang' => 'required',
            'kepada' => 'required',
            'tembusan' => 'required',
            'petugas' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO sium(no_sium, tgl_surat, tentang, kepada, tembusan, petugas) VALUES (:no_sium, :tgl_surat, :tentang, :kepada, :tembusan, :petugas)',
        [
            'no_sium' => $request->no_sium,
            'tgl_surat' => $request->tgl_surat,
            'tentang' => $request->tentang,
            'kepada' => $request->kepada,
            'tembusan' => $request->tembusan,
            'petugas' => $request->petugas,

        ]
        );

        return redirect()->route('sium.index')->with('success', 'Surat Masuk berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('sium')->where('no_sium', $id)->first();

        return view('sium.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'no_sium' => 'required',
            'tgl_surat' => 'required',
            'tentang' => 'required',
            'kepada' => 'required',
            'tembusan' => 'required',
            'petugas' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE sium SET tgl_surat = :tgl_surat, tentang = :tentang, kepada = :kepada,  tembusan = :tembusan, petugas = :petugas WHERE no_sium = :no_sium',
        [
            'no_sium' => $request-> no_sium,
            'tgl_surat' => $request->tgl_surat,
            'tentang' => $request->tentang,
            'kepada' => $request->kepada,
            'tembusan' => $request->tembusan,
            'petugas' => $request->petugas,
        ]
        );

        // Menggunakan laravel eloquent
        // sium::where('no_ops', $id)->update([
        //     'no_ops' => $request->no_ops,
        //     'tgl_surat' => $request->tgl_surat,
        //     'tentang' => $request->tentang,
        //     'kepada' => $request->kepada,
        //     'petugas' => $request->petugas,
        // ]);

        return redirect()->route('sium.index')->with('success', 'Surat Masuk berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM sium WHERE no_sium = :no_sium', ['no_sium' => $id]);

        // Menggunakan laravel eloquent
        // sium::where('no_ops', $id)->delete();

        return redirect()->route('sium.index')->with('success', 'Surat Masuk berhasil dihapus');
    }

    public function softDelete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE sium SET is_deleted = 1
        WHERE no_sium = :no_sium', ['no_sium' => $id]);
        return redirect()->route('sium.index')->with('success', 'Data Surat masuk berhasil dihapus');
    }

    public function restore()
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('sium')
        ->update(['is_deleted' => 0]);
        return redirect()->route('sium.index')->with('success', 'Data Surat Masuk berhasil direstore');
    }
}

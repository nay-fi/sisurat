<?php

namespace App\Http\Controllers;

use App\Http\Models\Sumda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SumdaController extends Controller
{
    public function index() {

        $datas = DB::select('select * from sumda where is_deleted=0');
        
        return view('sumda.index')
            ->with('datas', $datas);
    }

    public function search(Request $request) {
        
        if($request->has('search')){
            $datas = DB::table('sumda')->where('no_sumda','like','%'.$request->search.'%')->paginate(5);
        }else{
            $datas = DB::table('sumda')->paginate(5);
        }
        return view('sumda.index')
        ->with('datas', $datas);
    }

    public function create() {
        return view('sumda.add');
    }

    public function store(Request $request) {
        $request->validate([
            'no_sumda' => 'required',
            'tgl_surat' => 'required',
            'tentang' => 'required',
            'isi' => 'required',
            'petugas' => 'required',
            'no_sium' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO sumda(no_sumda, tgl_surat, tentang, isi, petugas, no_sium) VALUES (:no_sumda, :tgl_surat, :tentang, :isi, :petugas, :no_sium)',
        [
            'no_sumda' => $request->no_sumda,
            'tgl_surat' => $request->tgl_surat,
            'tentang' => $request->tentang,
            'isi' => $request->isi,
            'petugas' => $request->petugas,
            'no_sium' => $request->no_sium,

        ]
        );

        return redirect()->route('sumda.index')->with('success', 'Surat Masuk berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('sumda')->where('no_sumda', $id)->first();

        return view('sumda.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'no_sumda' => 'required',
            'tgl_surat' => 'required',
            'tentang' => 'required',
            'isi' => 'required',
            'petugas' => 'required',
            'no_sium' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE sumda SET tgl_surat = :tgl_surat, tentang = :tentang, isi = :isi, petugas = :petugas, no_sium = :no_sium WHERE no_sumda = :no_sumda',
        [
            'no_sumda' => $no_sumda,
            'tgl_surat' => $request->tgl_surat,
            'tentang' => $request->tentang,
            'isi' => $request->isi,
            'petugas' => $request->petugas,
            'no_sium' => $request->petugas,
        ]
        );

        return redirect()->route('sumda.index')->with('success', 'Surat Masuk berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM sumda WHERE no_sumda = :no_sumda', ['no_sumda' => $id]);

        // Menggunakan laravel eloquent
        // sumda::where('no_sumda', $id)->delete();

        return redirect()->route('sumda.index')->with('success', 'Surat Masuk berhasil dihapus');
    }

    // public function cari(Request $request)
    // {
    //     //menangkap data pencarian
    //     $cari = $request->cari;
    //     DB::table('sumda')->where('no_sumda',"%".$cari."%")->paginate();

        
    // }

    public function softDelete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE sumda SET is_deleted = 1
        WHERE no_sumda = :no_sumda', ['no_sumda' => $id]);
        return redirect()->route('sumda.index')->with('success', 'Data Surat masuk berhasil dihapus');
    }

    public function restore()
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('sumda')
        ->update(['is_deleted' => 0]);
        return redirect()->route('sumda.index')->with('success', 'Data Surat Masuk berhasil direstore');
    }
}

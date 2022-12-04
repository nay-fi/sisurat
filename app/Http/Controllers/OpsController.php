<?php

namespace App\Http\Controllers;

use App\Models\Ops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpsController extends Controller
{
    public function index() {
        $datas = DB::select('select * from operasional');

        return view('ops.index')
            ->with('datas', $datas);
    }

    public function search(Request $request) {
        
        if($request->has('search')){
            $datas = DB::table('operasional')->where('no_ops','like','%'.$request->search.'%')->paginate(5);
        }else{
            $datas = DB::table('operasional')->paginate(5);
        }
        return view('ops.index')
        ->with('datas', $datas);
    }


    public function create() {
        return view('ops.add');
    }

    public function store(Request $request) {
        $request->validate([
            'no_ops' => 'required',
            'tgl_surat' => 'required',
            'tentang' => 'required',
            'isi' => 'required',
            'petugas' => 'required',
            'no_sium' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO operasional(no_ops, tgl_surat, tentang, isi, petugas, no_sium) VALUES (:no_ops, :tgl_surat, :tentang, :isi, :petugas, :no_sium)',
        [
            'no_ops' => $request->no_ops,
            'tgl_surat' => $request->tgl_surat,
            'tentang' => $request->tentang,
            'isi' => $request->isi,
            'petugas' => $request->petugas,
            'no_sium' => $request->no_sium,

        ]
        );

        return redirect()->route('ops.index')->with('success', 'Surat Masuk berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('operasional')->where('no_ops', $id)->first();

        return view('ops.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'no_ops' => 'required',
            'tgl_surat' => 'required',
            'tentang' => 'required',
            'isi' => 'required',
            'petugas' => 'required',
            'no_sium' => 'required',

        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE operasional SET no_ops = :no_ops, tgl_surat = :tgl_surat, tentang = :tentang, isi = :isi, petugas = :petugas, no_sium = :no_sium WHERE no_ops = :no_ops',
        [
            'no_ops' => $no_ops,
            'tgl_surat' => $request->tgl_surat,
            'tentang' => $request->tentang,
            'isi' => $request->isi,
            'petugas' => $request->petugas,
            'no_sium' => $request->no_sium,
        ]
        );

        // Menggunakan laravel eloquent
        // ops::where('no_ops', $id)->update([
        //     'no_ops' => $request->no_ops,
        //     'tgl_surat' => $request->tgl_surat,
        //     'tentang' => $request->tentang,
        //     'isi' => $request->isi,
        //     'petugas' => $request->petugas,
        // ]);

        return redirect()->route('ops.index')->with('success', 'Surat Masuk berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM operasional WHERE no_ops = :no_ops', ['no_ops' => $id]);

        // Menggunakan laravel eloquent
        // ops::where('no_ops', $id)->delete();

        return redirect()->route('ops.index')->with('success', 'Surat Masuk berhasil dihapus');
    }

}
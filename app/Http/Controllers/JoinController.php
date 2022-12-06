<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
    
    public function index(Request $request){
        
        $search = $request->search;
        $datas = DB::table('operasional')
        ->join('sumda','operasional.no_sium','=','sumda.no_sium')
        ->select('operasional.no_sium AS no_sium','operasional.tgl_surat AS tgl_surat','operasional.tentang AS tentang','sumda.petugas AS petugas')
        ->where('operasional.no_sium', 'like', '%' . $search . '%')
        ->where('operasional.is_deleted', '=', 0)
        ->orWhere('sumda.is_deleted', '=', 0)
        ->get();
        // select('select u.no_sium, u.tgl_surat, b.tentang, b.isi, b.petugas from sium u inner join operasional b on u.no_sium = b.no_sium');

        return view('data.index')
            ->with('datas', $datas);
    }

    public function search(Request $request) {
        
        if($request->has('search')){
            // $datas = DB::table('sium')->where('no_sium','like','%'.$request->search.'%')->paginate(5);
            $search = $request->search;
            $datas = DB::table()
                    ->select('*')   
                    ->where('no_sium', 'like', '%' . $search . '%')
                    ->where('is_deleted', '=', 0)
                    ->get();
            // $datas = DB::select(`select * from sium where no_sium like '%$search%' AND is_deleted = 0`)->paginate(5);

        }else{
            $datas = DB::table('index()')->paginate(5);
        }
        return view('data.index')
        ->with('datas', $datas);
    }

}

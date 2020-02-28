<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelsTmr as Tmr;
use App\ModelsPeminjam as Peminjam;
use App\ModelsPasien as Pasien;
use Illuminate\Support\Facades\Input;

class TmrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tmrs = Tmr::select('*', 'tmr.id as id_tmr')
        ->join('pasien', 'pasien.id', '=', 'tmr.id_pasien')
        ->join('peminjam','peminjam.id', '=', 'tmr.id_peminjam')
        ->orderBy('tmr.id', 'Desc')->paginate(10);
         
        return view('tmr.index', compact('tmrs'))->with('i');
    }

    public function create()
    {
        return view('tmr.create');
    }

    public function store(Request $request){
         
        $cekPeminjam = Peminjam::where('no_ktp', $request->no_ktp)->first();
        $cekPasien = Pasien::where('no_rm', $request->no_rm)->first();

        if($cekPeminjam && $cekPasien){
            $tmr = new Tmr;
            $tmr->id_pasien = $request->id_pasien;
            $tmr->id_peminjam = $request->id_peminjam;
            $tmr->tanggal_pinjam = $request->tanggal_pinjam;
            $tmr->poli = $request->poli;
            $tmr->keterangan = $request->keterangan;
            $tmr->save();

            return \Redirect('tmr')->withErrors('Simpan Peminjaman berhasil.');
        }else{

            return \Redirect::back()->withErrors('Gagal Simpan! Periksa data peminjam atau pasien.');
        }
    }

    public function edit($id)
    {   
        $tmrs = Tmr::select('*', 'tmr.id as id_tmr')
        ->join('pasien', 'pasien.id', '=', 'tmr.id_pasien')
        ->join('peminjam','peminjam.id', '=', 'tmr.id_peminjam')
        ->where('tmr.id', $id)
        ->orderBy('tmr.id', 'Desc')->first();
         
        return view('tmr.edit', compact('tmrs'));
    }

    public function update(Request $request){
        $tmr = Tmr::findOrFail($request->id);
        if($tmr){

            $tmr->id_pasien = $request->id_pasien;
            $tmr->id_peminjam = $request->id_peminjam; 
            $tmr->poli = $request->poli;
            $tmr->keterangan = $request->keterangan;
            $tmr->save();

            return \Redirect::back()->withErrors('Simpan Peminjam berhasil.');
        }else{

            return \Redirect::back()->withErrors('Gagal Simpan! Peminjam tidak ada.');
        }
    }

    public function searchpeminjam(Request $request) {
         
        $peminjam = Peminjam::where('no_ktp', $request->no_ktp)->first();
        if($peminjam){
            return response()->json(array('peminjam'=> $peminjam), 200);
        }else{
            return response()->json(array('peminjam'=> ''), 200);
        }
        
     }

     public function searchpasien(Request $request) {
         
        $pasien = Pasien::where('no_rm', $request->no_ktp)->first();
        if($pasien){
            return response()->json(array('pasien'=> $pasien), 200);
        }else{
            return response()->json(array('pasien'=> ''), 200);
        }
        
     }

     public function search(Request $request){
        $from = date('Y-m-d', strtotime($request->tanggal_pinjam_from)).' 00:00:00';
        $to = date('Y-m-d', strtotime($request->tanggal_pinjam_to)).' 23:59:00';

        $tmrs = Tmr::select('*', 'tmr.id as id_tmr')
        ->join('pasien', 'pasien.id', '=', 'tmr.id_pasien')
        ->join('peminjam','peminjam.id', '=', 'tmr.id_peminjam')
        ->whereBetween('tmr.tanggal_pinjam', [$from, $to])
        ->orderBy('tmr.id', 'Desc')->paginate(10);

        if(Input::has('reset')){
            $tmrs = Tmr::select('*', 'tmr.id as id_tmr')
            ->join('pasien', 'pasien.id', '=', 'tmr.id_pasien')
            ->join('peminjam','peminjam.id', '=', 'tmr.id_peminjam')
            ->orderBy('tmr.id', 'Desc')->paginate(10);
        }
         
        return view('tmr.index', compact('tmrs'))->with('i');
     }
     
      public function scan(Request $request){
           
        $tmrs = Tmr::select('*', 'tmr.id as id_tmr')
        ->join('pasien', 'pasien.id', '=', 'tmr.id_pasien')
        ->join('peminjam','peminjam.id', '=', 'tmr.id_peminjam')
        ->where('pasien.id', $request->id)
        ->whereNull('tmr.tanggal_kembali')
        ->orderBy('tmr.created_at', 'Asc')->first(); 
        
        if(empty($tmrs)){
            return \Redirect('tmr')->withErrors('Tidak ada peminjaman!');    
        }
        return view('pengembalian.edit', compact('tmrs')); 
     }
     
     public function updatePengembalian(Request $request){
        $tmr = Tmr::findOrFail($request->id);
        if($tmr){

            $tmr->tanggal_kembali = date('Y-m-d H:i:s', strtotime($request->tgl_pengembalian)); 
            $tmr->save();

            return \Redirect('tmr')->withErrors('Simpan Pengembalian berhasil.');
        }else{

            return \Redirect('tmr')->withErrors('Gagal Simpan! Pengembalian tidak ada.');
        }
    }
    
    public function getReport(Request $request){
        
        $from = date('Y-m-d', strtotime($request->tanggal_pinjam_from)).' 00:00:00';
        $to = date('Y-m-d', strtotime($request->tanggal_pinjam_to)).' 23:59:00';

        $tmrs = Tmr::select('*', 'tmr.id as id_tmr')
        ->join('pasien', 'pasien.id', '=', 'tmr.id_pasien')
        ->join('peminjam','peminjam.id', '=', 'tmr.id_peminjam')
        ->whereBetween('tmr.tanggal_pinjam', [$from, $to])
        ->orderBy('tmr.id', 'Desc')->paginate(10);

        if(Input::has('cetak')){
            $tmrs = Tmr::select('*', 'tmr.id as id_tmr')
            ->join('pasien', 'pasien.id', '=', 'tmr.id_pasien')
            ->join('peminjam','peminjam.id', '=', 'tmr.id_peminjam')
            ->whereBetween('tmr.tanggal_pinjam', [$from, $to])
            ->orderBy('tmr.id', 'Desc')->get();
            
             return view('report.print', compact('tmrs', 'from', 'to'))->with('i');
            
        }
        
        return view('report.index', compact('tmrs'))->with('i');
    }
}

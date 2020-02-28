<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelsTmr as Tmr;
use App\ModelsPeminjam as Peminjam;
use App\ModelsPasien as Pasien;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::count();
        $tmr = Tmr::select('*', 'tmr.id as id_tmr')
        ->join('pasien', 'pasien.id', '=', 'tmr.id_pasien')
        ->join('peminjam','peminjam.id', '=', 'tmr.id_peminjam')
        ->whereNull('tmr.tanggal_kembali')
        ->count();
        
        return view('home', compact('pasien', 'tmr'));
    }

    public function barcode()
    {
        return view('barcode');
    }

    public function scan()
    {
        return view('scan');
    }

    public function checkQRcode(Request $request){
        return 1;
    }
}

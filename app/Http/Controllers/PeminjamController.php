<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelsPeminjam as Peminjam;

class PeminjamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nama_peminjam = '';
        $peminjams = Peminjam::orderBy('id', 'Desc')->paginate(10);
        return view('peminjam.index', compact('peminjams', 'nama_peminjam'))->with('i');
    }

    public function create()
    {
        return view('peminjam.create');
    }

    public function store(Request $request){
        $cekPeminjam = Peminjam::where('no_ktp', $request->no_ktp)->first();
        
        if(empty($cekPeminjam)){
            
            $Peminjam = new Peminjam;
            $Peminjam->nama_peminjam = $request->nama_peminjam;
            $Peminjam->alamat = $request->alamat;
            $Peminjam->no_hp = $request->no_hp;
            $Peminjam->no_ktp = $request->no_ktp;
            $Peminjam->save();

            return \Redirect::back()->withErrors('Simpan Peminjam berhasil.');
        }else{

            return \Redirect::back()->withErrors('Gagal Simpan! Peminjam sudah ada.');
        }
    }

    public function edit($id)
    {   
        $peminjam = Peminjam::findOrFail($id);
        return view('peminjam.edit', compact('peminjam'));
    }

    public function update(Request $request){
        $Peminjam = Peminjam::findOrFail($request->id);
        if($Peminjam){

            $Peminjam->nama_peminjam = $request->nama_peminjam;
            $Peminjam->alamat = $request->alamat;
            $Peminjam->no_hp = $request->no_hp;
            $Peminjam->no_ktp = $request->no_ktp;

            $Peminjam->save();

            return \Redirect::back()->withErrors('Simpan Peminjam berhasil.');
        }else{

            return \Redirect::back()->withErrors('Gagal Simpan! Peminjam tidak ada.');
        }
    }

    public function search(Request $request){
        $nama_peminjam = $request->nama_peminjam;
        $peminjams = Peminjam::where('nama_peminjam', 'like', $request->nama_peminjam.'%')->orderBy('nama_peminjam', 'Asc')->paginate(10);
         
        return view('peminjam.index', compact('peminjams', 'nama_peminjam'))->with('i');
    }
}

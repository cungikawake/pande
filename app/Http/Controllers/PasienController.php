<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelsPasien as Pasien;
use QrCode;
class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $no_rm = '';
        $pasiens = Pasien::orderBy('no_rm', 'Desc')->paginate(10);
        return view('pasien.index', compact('pasiens', 'no_rm'))->with('i');
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request){
        $cekpasien = Pasien::where('no_rm', $request->no_rm)->first();
        if(empty($cekpasien)){ 

            $pasien = new Pasien;
            $pasien->no_rm = $request->no_rm;
            $pasien->nama_pasien = $request->nama_pasien;
            $pasien->tanggal_lahir = $request->tanggal_lahir; 
            $pasien->save();

            return \Redirect::back()->withErrors('Simpan pasien berhasil.');
        }else{

            return \Redirect::back()->withErrors('Gagal Simpan! Pasien sudah ada.');
        }
    }

    public function edit($id)
    {   
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request){
        $pasien = Pasien::findOrFail($request->id);
        if($pasien){
             
            $pasien->no_rm = $request->no_rm;
            $pasien->nama_pasien = $request->nama_pasien;
            $pasien->tanggal_lahir = $request->tanggal_lahir; 
            $pasien->save();

            return \Redirect::back()->withErrors('Simpan pasien berhasil.');
        }else{

            return \Redirect::back()->withErrors('Gagal Simpan! Pasien tidak ada.');
        }
    }

    public function barcode($id){
        $pasien = Pasien::findOrFail($id);
        return view('barcode', compact('id', 'pasien'));
    }

    public function search(Request $request){
        $no_rm = $request->no_rm;
        if(!empty($request->no_rm)){
            $pasiens = Pasien::where('no_rm', $request->no_rm)->paginate(10);
        }else{
            $pasiens = Pasien::orderBy('no_rm', 'Desc')->paginate(10);
        }
         
        return view('pasien.index', compact('pasiens', 'no_rm'))->with('i');
    }
}

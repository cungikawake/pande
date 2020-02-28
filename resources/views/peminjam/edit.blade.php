@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                   <span class="text-left" style="font-size:18px;"><img src="{{ asset('images/patient.png') }}" height="30"> Detail Peminjam</span>
                    
                </div>
                @foreach ($errors->all() as $error)
                    <span class="alert alert-primary">
                     {{ $error }}
                    </span>
                @endforeach 
                <div class="card-body">
                    <form class="form-horizontal" role="form" action="{{ route('peminjam.update') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nomor KTP</labe>
                            <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $peminjam->no_ktp) }}">

                            <input type="hidden" name="id" class="form-control" value="{{ old('id', $peminjam->id) }}">
                        <div>
                        <div class="form-group">
                            <label>Nama Peminjam</labe>
                            <input type="text" name="nama_peminjam" class="form-control" value="{{ old('nama_peminjam', $peminjam->nama_peminjam) }}">
                        <div>
                        <div class="form-group">
                            <label>Alamat</labe>
                            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $peminjam->alamat) }}">
                        <div>
                        <div class="form-group">
                            <label>No Hp</labe>
                            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $peminjam->no_hp) }}">
                        <div>
                        <br>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                            
                        <a href="{{ route('peminjam') }}" class="float-right">
                                <button class="btn btn-danger" type="button">Kembali</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

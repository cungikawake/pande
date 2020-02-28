@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                   <span class="text-left" style="font-size:18px;"><img src="{{ asset('images/patient.png') }}" height="30"> Detail Pasien</span>
                    
                </div>
                @foreach ($errors->all() as $error)
                    <span class="alert alert-primary">
                     {{ $error }}
                    </span>
                @endforeach 
                <div class="card-body">
                    <form class="form-horizontal" role="form" action="{{ route('pasien.update') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nomor Rekam Medis</labe>
                            <input type="text" name="no_rm" class="form-control" value="{{ old('no_rm', $pasien->no_rm) }}">

                            <input type="hidden" name="id" class="form-control" value="{{ old('id', $pasien->id) }}">
                        <div>
                        <div class="form-group">
                            <label>Nama Pasien</labe>
                            <input type="text" name="nama_pasien" class="form-control" value="{{ old('nama_pasien', $pasien->nama_pasien) }}">
                        <div>
                        <div class="form-group">
                            <label>Tanggal Lahir Pasien</labe>
                            <input type="text" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}">
                        <div>
                        <br>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                            
                        <a href="{{ route('pasien') }}" class="float-right">
                                <button class="btn btn-danger" type="button">Kembali</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

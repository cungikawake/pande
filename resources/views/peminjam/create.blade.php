@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                   <span class="text-left" style="font-size:18px;"><img src="{{ asset('images/team.png') }}" height="30"> Tambah Peminjam</span>
                    
                </div>
                @foreach ($errors->all() as $error)
                    <span class="alert alert-primary">
                     {{ $error }}
                    </span>
                @endforeach 
                <div class="card-body">
                    <form class="form-horizontal" role="form" action="{{ route('peminjam.store') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>No KTP</labe>
                            <input type="text" name="no_ktp" class="form-control">
                        <div>
                        <div class="form-group">
                            <label>Nama Peminjam</labe>
                            <input type="text" name="nama_peminjam" class="form-control">
                        <div>
                        <div class="form-group">
                            <label>Alamat</labe>
                            <input type="text" name="alamat" class="form-control">
                        <div>
                        <div class="form-group">
                            <label>No Hp</labe>
                            <input type="text" name="no_hp" class="form-control">
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

@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li class="active">Peminjam</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('peminjam.search') }}" method="GET">
                    <div class="form-group">
                        <label>Cari Peminjam</label>
                        <input type="text" class="form-control" name="nama_peminjam" placeholder="Nama" value="{{ old('nama_peminjam', $nama_peminjam) }}">
                        <button class="btn btn-primary"> Cari</button>
                    </div>
                    <form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                   <span class="text-left" style="font-size:18px;"><img src="{{ asset('images/team.png') }}" height="30"> Identitas Peminjam</span>
                   
                    <a href="{{ route('peminjam.create') }}" class="float-right">
                        <button class="btn btn-primary">+ Tambah Peminjam</button>
                    </a>
                </div>
                <div class="card-body text-center">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>KTP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Bantuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjams as $peminjam)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $peminjam->no_ktp }}</td>
                                <td>{{ $peminjam->nama_peminjam }}</td>
                                <td>{{ $peminjam->alamat }}</td>
                                <td>{{ $peminjam->no_hp }}</td>
                                <td>
                                    <a href="{{ url('peminjam/edit/'.$peminjam->id) }}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="form-group pagination">
                        {{ $peminjams->links() }}
                    </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

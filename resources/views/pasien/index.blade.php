@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li class="active">Pasien</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pasien.search') }}" method="GET">
                    <div class="form-group">
                        <label>Cari Nomor RM</label>
                        <input type="text" class="form-control" name="no_rm" placeholder="Nomor Rekam Medis" value="{{ old('no_rm', $no_rm) }}">
                        <button class="btn btn-primary"> Cari</button>
                    </div>
                    <form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                   <span class="text-left" style="font-size:18px;"><img src="{{ asset('images/patient.png') }}" height="30"> Identifikasi Pasien</span>
                    <a href="{{ route('pasien.create') }}" class="float-right">
                        <button class="btn btn-primary">+ Tambah Pasien</button>
                    </a>
                </div>
                <div class="card-body text-center">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Lahir</th>
                                <th>Barcode</th>
                                <th>Bantuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $pasien->no_rm }}</td>
                                <td>{{ $pasien->nama_pasien }}</td>
                                <td>{{ $pasien->tanggal_lahir }}</td>
                                <td><a href="{{ url('pasien/barcode/'.$pasien->id) }}" target="_blank">Lihat Barcode</a></td>
                                <td>
                                    <a href="{{ url('pasien/edit/'.$pasien->id) }}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="form-group pagination">
                        {{ $pasiens->links() }}
                    </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li class="active">Tracer Medical Record </li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-10">
             @foreach ($errors->all() as $error)
                    <span class="alert alert-primary">
                     {{ $error }}
                    </span>
                @endforeach 
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tmr.search') }}" method="GET">
                    <div class="form-group">
                        <label>Dari Tanggal Pinjaman</label>
                        <input   type="date" class="form-control" name="tanggal_pinjam_from" placeholder="tanggal_pinjam" value="{{ old('tanggal_pinjam_from') }}">
                        <label>Sampai Tanggal Pinjaman</label>
                        <input type="date" class="form-control" name="tanggal_pinjam_to" placeholder="tanggal_pinjam" value="{{ old('tanggal_pinjam_to') }}">
                        <button class="btn btn-primary"> Cari</button>
                        <button class="btn btn-danger" name="reset" value="reset"> Reset</button>
                    </div>
                    <form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <span class="text-left" style="font-size:18px;"><img src="{{ asset('images/research.png') }}" height="30"> Tracer Medical Record </span>
                    <a href="https://scan.sitmr.com/index.html" class="float-right">
                        <button class="btn btn-warning" target="_blank"> Scan Pengembalian</button>
                    </a>

                    <a href="{{ route('tmr.create') }}" class="float-right">
                        <button class="btn btn-primary">+ Peminjaman Baru</button>
                    </a> 
                    
                </div>
                
                <div class="card-body text-center">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th> 
                                <th>Nama Pemijam</th>
                                <th>No Hp Pemijam</th>
                                <th>Pasien</th>
                                <th>No RM</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th> 
                                <th>Bantuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tmrs as $tmr)
                            <tr>
                                <td>{{ ++$i }}</td> 
                                <td>{{ $tmr->nama_peminjam }}</td>
                                <td>{{ $tmr->no_hp }}</td>
                                <td>{{ $tmr->nama_pasien }}</td>
                                <td>{{ $tmr->no_rm }}</td>
                                <td>{{ $tmr->tanggal_pinjam }}</td>
                                <td>{{ $tmr->tanggal_kembali }}</td> 
                                <td> 
                                    <a href="{{ url('tmr/edit/'.$tmr->id) }}">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="form-group pagination">
                        {{ $tmrs->links() }}
                    </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

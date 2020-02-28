@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-md-10">
             @foreach ($errors->all() as $error)
                    <span class="alert alert-primary">
                     {{ $error }}
                    </span>
            @endforeach 
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Laporan Tracer Medical Record </li>
            </ol> 
            <div class="card">
                <div class="card-header">
                    <span class="text-left" style="font-size:18px;"><img src="{{ asset('images/research.png') }}" height="30">Laporan Tracer Medical Record </span>
                    <p>Periode {{ $from }} s/d {{ $to }}</p> 
                </div>
                
                <div class="card-body text-center">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th> 
                                <th>Nama Peminjam</th>
                                <th>No Hp Peminjam</th>
                                <th>Pasien</th>
                                <th>No RM</th>
                                <th>Poli</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th> 
                                <th>Ket</th>
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
                                <td>{{ $tmr->poli }}</td>
                                <td>{{ $tmr->tanggal_pinjam }}</td>
                                <td>{{ $tmr->tanggal_kembali }}</td> 
                                <td>{{ $tmr->keterangan }}</td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.print();
</script>
@endsection

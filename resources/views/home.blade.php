@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center">Identifikasi Pasien</div>

                <div class="card-body text-center">
                    <a href="{{ route('pasien') }}">
                        <img src="{{ asset('images/patient.png') }}" height="100">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center">Identitas Peminjam</div>

                <div class="card-body text-center">
                    <a href="{{ route('peminjam') }}">
                        <img src="{{ asset('images/team.png') }}" height="100">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center">Tracer Medical Record</div>

                <div class="card-body text-center">
                    <a href="{{ route('tmr') }}">
                    <img src="{{ asset('images/research.png') }}" height="100">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center">Laporan Tracer Medical Record</div>

                <div class="card-body text-center">
                    <a href="{{ route('report') }}">
                    <img src="{{ asset('images/analysis.png') }}" height="100">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Total Data Pasien</div>

                <div class="card-body text-center">
                    <h3>{{ $pasien }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Total Rekam Medis Keluar</div>

                <div class="card-body text-center">
                    <h3>{{ $tmr }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

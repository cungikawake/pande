@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                   <span class="text-left" style="font-size:18px;"><img src="{{ asset('images/research.png') }}" height="30"> Pengembalian Tracer Medical Record</span>
                    
                </div>
                @foreach ($errors->all() as $error)
                    <span class="alert alert-success">
                     {{ $error }}
                    </span>
                @endforeach 
                
                <div class="card-body">
                    <form class="form-horizontal" role="form" action="{{ route('tmr.updatePengembalian') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tanggal Peminjaman</labe>
                            <p>{{ date('d-M-Y H:i', strtotime($tmrs->tanggal_pinjam)) }}</p>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pengembalian</labe>
                            <input type="text" clas="form-control" name="tgl_pengembalian" value="{{ date('d-M-Y H:i:s') }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No KTP</labe>
                                    <input type="hidden" name="id" class="form-control" id="id" value="{{ $tmrs->id_tmr }}" >

                                    <input type="hidden" name="id_peminjam" class="form-control" id="id_peminjam" value="{{ $tmrs->id_peminjam }}">
                                    
                                    
                                    <input type="text" name="no_ktp" class="form-control" id="no_ktp" value="{{ $tmrs->no_ktp }}" disabled="disabled">
                                    
 
                                </div>
                                <div class="form-group">
                                    <label>Nama Peminjam</labe>
                                    <input type="text" name="nama_peminjam" class="form-control" readonly="readonly" id="nama_peminjam" value="{{ $tmrs->nama_peminjam }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</labe>
                                    <input type="text" name="alamat" class="form-control" readonly="readonly" id="alamat_peminjam" value="{{ $tmrs->alamat }}">
                                </div>
                                <div class="form-group">
                                    <label>No Hp</labe>
                                    <input type="text" name="no_hp" class="form-control" readonly="readonly" id="no_hp" value="{{ $tmrs->no_hp }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Pasien</labe>
                                    <input type="text" name="no_rm" class="form-control" id="no_rm" value="{{ $tmrs->no_rm }}"  disabled="disabled">
                                    
                                    <input type="hidden" name="id_pasien" class="form-control" id="id_pasien" value="{{ $tmrs->id_pasien }}">
 
                                </div>
                                <div class="form-group">
                                    <label>Nama Pasien</labe>
                                    <input type="text" name="nama_pasien" class="form-control" readonly="readonly" id="nama_pasien" value="{{ $tmrs->nama_pasien }}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</labe>
                                    <input type="text" name="tanggal_lahir" class="form-control" readonly="readonly" id="tanggal_lahir" value="{{ $tmrs->tanggal_lahir }}">
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>Poli peminjam</labe>
                            <input type="text" name="poli" class="form-control" placeholder="Poli peminjam" value="{{ $tmrs->poli }}" disabled="disabled">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</labe>
                            <textarea class="form-control" disabled="disabled" name="keterangan">{{ $tmrs->keterangan }}</textarea>
                        </div>
                        <hr>
                        <br>
                        <button class="btn btn-primary" type="submit">Proses</button>
                                 
                        <a href="{{ route('tmr') }}" class="float-right">
                                <button class="btn btn-danger" type="button">Keluar</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

<script>

$(document).ready(function(){ 
    
    $('#search_peminjam').click(function(){
        var no_ktp = $('#no_ktp').val();
        $('#no_ktp').val('Loading....');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/tmr/searchpeminjam',
            data:'_token = <?php echo csrf_token() ?> &no_ktp='+no_ktp,
            success:function(data) {
                if(data.peminjam != ''){
                    $('#id_peminjam').val(data.peminjam.id);
                    $('#no_ktp').val(data.peminjam.no_ktp);
                    $('#nama_peminjam').val(data.peminjam.nama_peminjam);
                    $('#alamat_peminjam').val(data.peminjam.alamat);
                    $('#no_hp').val(data.peminjam.no_hp);
                }else{
                    $('#id_peminjam').val('');
                    $('#no_ktp').val('');
                    $('#nama_peminjam').val('');
                    $('#alamat_peminjam').val('');
                    $('#no_hp').val('');
                    alert('Peminjam tidak ditemukan, cek pada master data peminjam !');
                }
                
            }
        });
    });


    $('#search_pasien').click(function(){
        var no_rm = $('#no_rm').val();
        $('#no_rm').val('Loading....');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/tmr/searchpasien',
            data:'_token = <?php echo csrf_token() ?> &no_ktp='+no_rm,
            success:function(data) {
                if(data.pasien != ''){
                    $('#id_pasien').val(data.pasien.id);
                    $('#no_rm').val(data.pasien.no_rm);
                    $('#nama_pasien').val(data.pasien.nama_pasien);
                    $('#tanggal_lahir').val(data.pasien.tanggal_lahir);
                }else{
                    $('#id_pasien').val('');
                    $('#no_rm').val('');
                    $('#nama_pasien').val('');
                    $('#tanggal_lahir').val('');
                    alert('Pasien tidak ditemukan, cek pada master data pasien !');
                }
                
            }
        });
    });  
    
});
    
</script>
@endsection
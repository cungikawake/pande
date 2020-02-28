@extends('layouts.app')


@section('content')
<style type="text/css">
	img{
		padding-left: 20px;
	}
</style>  

<div class="container text-center" style="border: 1px solid #a1a1a1;padding: 15px;width: 70%;">
    <h1 class="text-primary" style="text-align: center;">QRbarcode pasien : {{ $pasien->no_rm }}</h1>
	<div class="visible-print text-center">
	{!! QrCode::size(500)->generate(url('tmr/scan').'/?id='.$id); !!}
	<p>
	    <button onclick="myFunction()" class="btn btn-danger">Print QRbarcode</button>
	</p>
    

</div>
</div>


<script>
function myFunction() {
  window.print();
}
</script>
@endsection
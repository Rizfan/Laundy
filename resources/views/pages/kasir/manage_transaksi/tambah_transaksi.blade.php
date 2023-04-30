@extends('layouts/main')

@section('title','Tambah Transaksi')

@section('content')

<div class="row justify-content-center">
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold">Tambah Transaksi</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/kasir/tambah_transaksi/upload">
				@csrf
				<div class="card-body">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Kode Invoice</label>
						<input type="text" name="invoice" id="invoice" readonly="" class="form-control col col-md-7" >
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Outlet</label>
						<select class="form-control col col-md-7" name="outlet">
							<option selected="" disabled="">Pilih Outlet</option>
							@foreach($outlet as $data)
							<option value="{{$data->id_outlet}}">{{$data->nama_outlet}}</option>
							@endforeach
						</select>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Member</label>
						<select class="form-control col col-md-7" name="member">
							<option selected="" disabled="">Pilih Member</option>
							@foreach($member as $data1)
							<option value="{{$data1->id_member}}">{{$data1->nama_member}}</option>
							@endforeach
						</select>
					</div>
					<input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('Ymd') ?>">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Batas Waktu Pembayaran</label>
						<input type="datetime-local" name="batas_waktu" class="form-control col col-md-7">
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Tambah</button>
					<a href="/kasir/list_transaksi"  class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('js')
<script language="javascript" type="text/javascript">
	var tanggal = document.getElementById('tanggal').value;
	var campur = "0123456789";
	var panjang = 9;
	var random_all = '';
	for (var i=0; i<panjang; i++) {
		var hasil = Math.floor(Math.random() * campur.length);
		random_all += campur.substring(hasil,hasil+1);
	}
	document.getElementById('invoice').value = "LNDRY-"+tanggal+"-"+random_all;
	
</script>

@endsection
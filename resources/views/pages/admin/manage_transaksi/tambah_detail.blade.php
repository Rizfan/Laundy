@extends('layouts/main')

@section('title','Detail Transaksi')

@section('content')
<div class="row">
	<div class="col col-md-12">
		<div class="card mb-3">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold ">Detail Transaksi</h6>
			</div>
			<div class="card-body">
				<div class="table table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Nama Paket</th>
								<th>Harga Paket</th>
								<th>QTY/Jumlah</th>
								<th>Total Harga</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail as $t)
							<tr>
								<td>{{$t->jenis_paket}} - {{$t->nama_paket}}</td>
								<td>Rp. {{number_format($t->harga_paket)}},-</td>
								<td>{{$t->qty}}</td>
								<td>Rp. {{number_format($t->total_harga)}},-</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3">Total Harga</td>
								<td>Rp. {{number_format($total)}},-</td>
							</tr>
							<tr>
								<td colspan="3">Biaya Tambahan</td>
								<td>Rp. {{number_format($tambahan = $transaksi->biaya_tambahan)}},-</td>
							</tr>
							<tr>
								<td colspan="3">Pajak (5%)</td>
								<td>Rp. {{number_format($pajak = $total*5/100)}},-</td>
							</tr>
							<tr>
								<td colspan="3">Diskon</td>
								@php
								$diskon = ($total+$transaksi->biaya_tambahan+$pajak) * $transaksi->diskon_transaksi / 100;
								@endphp
								<td>Rp. {{number_format($diskon)}},-</td>
							</tr>
							<tr>
								<td colspan="3">Total Bayar</td>
								<td>Rp. {{number_format($total+$tambahan+$pajak-$diskon)}},-</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<form method="POST" enctype="multipart/form-data" action="/admin/tambah_transaksi/detail/update_bayar">
					@csrf
					<input type="hidden" name="id_transaksi" value="{{$transaksi->id_transaksi}}">
					@php
					$pajak = $total * 5/100;
					$total_bayar = $total+$transaksi->biaya_tambahan + $pajak - $diskon;
					@endphp
					<input type="hidden" name="pajak" value="{{$pajak}}">

					<input type="hidden" name="total_bayar" value="{{$total_bayar}}">
					
					<!-- <a href="/admin/{{$transaksi->id_outlet}}/list_transaksi" class="btn btn-success">Simpan</a> -->
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="/admin/list_transaksi/hapus_transaksi/{{ $transaksi->id_transaksi }}"  class="btn btn-danger">Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col col-md-6">
		<div class="card shadow mb-2">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold ">Detail Transaksi</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/tambah_transaksi/detail/upload">
				@csrf
				<input type="hidden" name="id_transaksi" value="{{$transaksi->id_transaksi}}">
				<div class="card-body">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Kode Invoice</label>
						<input type="text" name="nama" value="{{$transaksi->kode_invoice}}" readonly="" class="form-control col col-md-7" placeholder="Nama Outlet">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Paket</label>
						<select class="form-control col col-md-7" name="paket" id="paket" >
							<option selected="" disabled="">Pilih Paket</option>
							@foreach($paket as $data)
							<option value="{{$data->id_paket}}">{{$data->nama_paket}}</option>
							@endforeach
						</select>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Jumlah</label>

						<div class=" col col-md-7 ">
							<div class="input-group ">
								<input type="number" class="form-control" name="qty" id="qty" onchange="cek_harga()" placeholder="Jumlah">
								<div class="input-group-append">
									<span class="input-group-text"> Kg </span>
								</div>
							</div>
						</div>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Keterangan</label>
						<textarea name="keterangan" class="form-control col col-md-7" placeholder="Keterangan"></textarea>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Total Harga</label>
						<div class=" col col-md-7 ">
							<div class="input-group flex-nowrap ">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp</span>
								</div>
								<input type="number" class="form-control" name="total" id="total" placeholder="Total" readonly="">
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Tambah</button>
					<a href="/admin/list_transaksi/hapus/{{$transaksi->id_transaksi}}"  class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
				<h6 class="m-0 font-weight-bold text-info">Detail Transaksi</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/tambah_transaksi/detail/update_tambahan">
				@csrf
				<input type="hidden" name="id_transaksi" value="{{$transaksi->id_transaksi}}">
				<div class="card-body">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Total Harga</label>
						<input type="number" name="total" value="{{$total}}" readonly="" class="form-control col col-md-7" placeholder="Biaya Tambahan">
					</div>
					@if($transaksi->biaya_tambahan==NULL)
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Biaya Tambahan</label>
						<input type="number" name="tambahan" class="form-control col col-md-7" placeholder="Biaya Tambahan">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Diskon</label>
						<input type="number" name="diskon" class="form-control col col-md-7" placeholder="Diskon">
					</div>
					@else
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Biaya Tambahan</label>
						<input type="number" name="tambahan" readonly="" value="{{$tambahan = $transaksi->biaya_tambahan}}" class="form-control col col-md-7" placeholder="Biaya Tambahan">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Diskon</label>
						<input type="number" name="diskon" readonly="" value="{{$diskon = $transaksi->diskon_transaksi}}" class="form-control col col-md-7" placeholder="Diskon">
					</div>

					@endif
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>

	</div>
</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

	function cek_harga(){
		var paket = document.getElementById( "paket" ).value;
		var qty = document.getElementById( "qty" ).value;
		var _token = $('input[name="_token"]').val();

		$.ajax({
			url:"{{route('cek_harga')}}",
			type:'POST',
			data:{paket:paket,_token:_token},
			success:function(result){

				var total = result * qty;
				document.getElementById('total').value = total;
			},
		});

	}


</script>


@endsection

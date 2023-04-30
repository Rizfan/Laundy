@extends('layouts/main')

@section('title','Manage Transaksi')

@section('content')

<div class="card shadow mb-4" width="100%">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold">Manage Transaksi</h6>
		<a href="/kasir/list_transaksi/tambah_transaksi" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Tambah Transaksi</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Invoice</th>
						<th>Nama Outlet</th>
						<th>Nama Member</th>
						<th>Tanggal Transaksi</th>
						<th>Total Bayar</th>
						<th>Status Transaksi</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; 
					?>
					@foreach($transaksi as $data)
					<tr>
						<td>{{$no++}}</td>
						<td><a href="/kasir/detail_transaksi/{{$data->id_transaksi}}">{{$data->kode_invoice}}</a></td>
						<td>{{$data->nama_member}}</td>
						<td>{{$data->nama_outlet}}</td>
						<td>{{date('d F Y ',strtotime($data->tgl_transaksi))}}</td>

						@php
						$harga = $data->harga_paket * $data->qty;
						$pajak = $harga * 5/1000;
						$total = $harga + $data->biaya_tambahan + $pajak;
						$diskon = $total * $data->diskon_transaksi / 100;
						$total2 = $total - $diskon;
						$total_semua = 0;
						$total_semua += $total2;
						@endphp
						<td>RP. {{number_format($total2)}}</td>

						@if($data->status_transaksi=="Baru")
						<td>
							<span class="badge badge-danger">{{$data->status_transaksi}}</span>

							@if($data->pembayaran=="Belum Dibayar")
							<span class="badge badge-danger">{{$data->pembayaran}}</span>
						</td>
						@else
						<span class="badge badge-success">{{$data->pembayaran}}</span>
					</td>
					@endif

					@elseif($data->status_transaksi=="Proses")
					<td>
						<span class="badge badge-warning">{{$data->status_transaksi}}</span>
						
						@if($data->pembayaran=="Belum Dibayar")
						<span class="badge badge-danger">{{$data->pembayaran}}</span>
					</td>
					@else
					<span class="badge badge-success">{{$data->pembayaran}}</span>
				</td>
				@endif

				@elseif($data->status_transaksi=="Selesai")
				<td>
					<span class="badge badge-info">{{$data->status_transaksi}}</span>

					@if($data->pembayaran=="Belum Dibayar")
					<span class="badge badge-danger">{{$data->pembayaran}}</span>
				</td>
				@else
				<span class="badge badge-success">{{$data->pembayaran}}</span>
			</td>
			@endif

			@else
			<td>
				<span class="badge badge-success">{{$data->status_transaksi}}</span>

				@if($data->pembayaran=="Belum Dibayar")
				<span class="badge badge-danger">{{$data->pembayaran}}</span>
			</td>
			@else
			<span class="badge badge-success">{{$data->pembayaran}}</span>
		</td>
		@endif

		@endif

		<td>
			@if($data->pembayaran=="Belum Dibayar")
			<a class="text-light" href="/kasir/list_transaksi/bayar/{{ $data->id_transaksi }}"><button class="btn btn-primary" >Bayar</button></a>
			@else
			<a class="text-light" href="/kasir/list_transaksi/batal_bayar/{{ $data->id_transaksi }}" onclick="return confirm('Apakah Anda Yakin?')"><button class="btn btn-info" >Batal Bayar</button></a>
			@endif
			<!-- <a class="text-light" href="/kasir/list_transaksi/edit_transaksi/{{ $data->id_transaksi }}"><button class="btn btn-success"><i class="fa fa-pencil-alt"></i></button></a> -->

			<!-- <a class="text-light" onclick="return confirm('Apakah Anda Yakin?')" href="/kasir/list_transaksi/hapus_transaksi/{{ $data->id_transaksi }}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a> -->
		</td>
	</tr>

	@endforeach
</tbody>
</table>
</div>
</div>
</div>
@endsection
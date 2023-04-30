@extends('layouts/main')

@section('title','Manage Transaksi')

@section('content')

<div class="card shadow mb-4" width="100%">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold ">Manage Transaksi</h6>
		<a href="/admin/list_transaksi/tambah_transaksi" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Tambah Transaksi</a>
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
					<?php $no = 1; ?>
					@foreach($transaksi as $data)
					<tr>
						<td>{{$no++}}</td>
						<td><a href="/admin/invoice/{{$data->id_transaksi}}">{{$data->kode_invoice}}</a></td>
						<td>{{$data->nama_member}}</td>
						<td>{{$data->nama_outlet}}</td>
						<td>{{date('d F Y ',strtotime($data->tgl_transaksi))}}</td>

						<td>RP. {{number_format($data->total_bayar)}}</td>

						@if($data->status_transaksi=="Baru")
						<td>
							<span class="badge badge-danger">{{$data->status_transaksi}}</span>

							@if($data->pembayaran=="Belum Dibayar")
							<span class="badge badge-danger">{{$data->pembayaran}}</span>
							@else
							<span class="badge badge-success">{{$data->pembayaran}}</span>
							@endif
						</td>

						@elseif($data->status_transaksi=="Proses")
						<td>
							<span class="badge badge-warning">{{$data->status_transaksi}}</span>

							@if($data->pembayaran=="Belum Dibayar")
							<span class="badge badge-danger">{{$data->pembayaran}}</span>
							@else
							<span class="badge badge-success">{{$data->pembayaran}}</span>
							@endif
						</td>

						@elseif($data->status_transaksi=="Selesai")
						<td>
							<span class="badge badge-info">{{$data->status_transaksi}}</span>

							@if($data->pembayaran=="Belum Dibayar")
							<span class="badge badge-danger">{{$data->pembayaran}}</span>
							@else
							<span class="badge badge-success">{{$data->pembayaran}}</span>
							@endif
						</td>

						@else
						<td>
							<span class="badge badge-success">{{$data->status_transaksi}}</span>

							@if($data->pembayaran=="Belum Dibayar")
							<span class="badge badge-danger">{{$data->pembayaran}}</span>
							@else
							<span class="badge badge-success">{{$data->pembayaran}}</span>
							@endif
						</td>

						@endif

						<td>
							@if($data->pembayaran=="Belum Dibayar")
							<a class="text-light" href="/admin/list_transaksi/bayar/{{ $data->id_transaksi }}"><button class="btn btn-primary" >Bayar</button></a>
							@else
							<a class="text-light" href="/admin/list_transaksi/batal_bayar/{{ $data->id_transaksi }}" onclick="return confirm('Apakah Anda Yakin?')"><button class="btn btn-info" >Batal Bayar</button></a>
							@endif
							<a href="#" class="btn btn-success" data-toggle="modal" data-target="#statusModal">Ubah Status?</a>
							<!-- <a class="text-light" href="/admin/list_transaksi/edit_transaksi/{{ $data->id_transaksi }}"><button class="btn btn-success"><i class="fa fa-pencil-alt"></i></button></a> -->

							<!-- <a class="text-light" onclick="return confirm('Apakah Anda Yakin?')" href="/admin/list_transaksi/hapus_transaksi/{{ $data->id_transaksi }}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a> -->
						</td>
					</tr>

					<!-- Modal -->
					<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Ubah Status</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form method="POST" enctype="multipart/form-data" action="/admin/detail_transaksi/status">
									@csrf
									<div class="modal-body">
										<input type="hidden" name="id_transaksi" value="{{$data->id_transaksi}}">
										<div class=" form-group row mb-3 mt-3">
											<label class="col col-md-4 col-form-label text-md-left">Status</label>
											<select class="form-control col col-md-7 text-md-left" name="status">
												<option value="Baru" <?php if ($data->status_transaksi == "Baru") {echo "selected";} ?> >Baru</option>
												<option value="Proses" <?php if ($data->status_transaksi == "Proses") {echo "selected";} ?> >Proses</option>
												<option value="Selesai" <?php if ($data->status_transaksi == "Selesai") {echo "selected";} ?> >Selesai</option>
												<option value="Diambil" <?php if ($data->status_transaksi == "Diambil") {echo "selected";} ?> >Diambil</option>
											</select>
										</div>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
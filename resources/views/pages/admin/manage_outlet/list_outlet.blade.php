@extends('layouts/main')

@section('title','Manage Outlet')

@section('content')


<div class="card shadow mb-4" width="100%">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold ">Manage Outlet</h6>
		<a href="/admin/list_outlet/tambah_outlet" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Tambah Outlet</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Outlet</th>
						<th>Alamat</th>
						<th>Telp.</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					@foreach($outlet as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->nama_outlet}}</td>
						<td>{{$data->alamat_outlet}}</td>
						<td>{{$data->tlp_outlet}}</td>
						<td>
							<a class="text-light" href="/admin/list_outlet/edit_outlet/{{ $data->id_outlet }}"><button class="btn btn-success"><i class="fa fa-pencil-alt"></i></button></a>
							<a class="text-light" onclick="return confirm('Apakah Anda Yakin?')" href="/admin/list_outlet/hapus_outlet/{{ $data->id_outlet }}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
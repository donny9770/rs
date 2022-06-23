@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<div class="card">
				@if(session('success'))
				<p class="alert alert-success">{{ session('success') }}</p>
				@endif
				<div class="card-header">
					<form class="form-inline">
						<div class="row">
							<div class="form-group col-md-3">
								<input class="form-control" type="text" name="q" value="{{ $q}}" placeholder="Pencarian..." />
							</div>
							<div class="form-group col-md-3">
								<button class="btn btn-success">Refresh</button>
								<a class="btn btn-primary" href="{{ route('kunjungan.create') }}">Tambah</a>
							</div>
							</div>						
					</form>
				</div>
				<div class="card-body table-responsive">
					<table class="table table-bordered table-striped table-hover mb-0">
						<thead>
							<tr>
								<th>No</th>
								<th>KTP</th>
								<th>Nama</th>
								<th>Dokter</th>
								<th>Biaya</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php $no = 1 ?>
						@foreach($rows as $row)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $row->ktp }}</td>
							<td>{{ $row->nama }}</td>
							<td>{{ $row->dokter }}</td>
							<td>{{ $row->biaya }}</td>
							<td>
								<a class="btn btn-sm btn-warning" href="{{ route('kunjungan.edit', $row) }}">Edit</a>
								<form method="POST" action="{{ route('kunjungan.destroy', $row) }}" style="display: inline-block;">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
								</form>								
								<a class="btn btn-sm btn-info" href="{{ route('kunjungan.show', $row) }}">Cetak</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
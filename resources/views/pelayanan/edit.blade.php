@extends('layouts.app')

@section('content')
<div class="container why-us">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-header">Ubah Data Pelayanan</div>

                <div class="card-body">
						@if($errors->any())
						@foreach($errors->all() as $err)
						<p class="alert alert-danger">{{ $err }}</p>
						@endforeach
						@endif
						<form action="{{ route('pelayanan.update', $row) }}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label>Nama Jenis Pelayanan <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="nama" value="{{ old('nama', $row->nama) }}" />
							</div>
							<div class="form-group">
								<label>Deskripsi <span class="text-danger">*</span></label>
								<textarea class="form-control" name="description">{{ old('description', $row->description) }}</textarea>
							</div><br/>
							<div class="form-group">
								<button class="btn btn-primary">Simpan</button>
								<a class="btn btn-danger" href="{{ route('pelayanan.index') }}">Kembali</a>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container why-us">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
			<div class="card-header">Tambah Data Unit Kerja Dokter</div>

                <div class="card-body">
					@if($errors->any())
					@foreach($errors->all() as $err)
					<p class="alert alert-danger">{{ $err }}</p>
					@endforeach
					@endif
					<form action="{{ route('dokter.store') }}" method="POST">
						@csrf						
						<div class="form-group">
							<label>Dokter - ID <span class="text-danger">*</span></label>
							<select class="form-control" name="dokter" />
							@foreach($dokters as $dokter)
							@if($dokter->name == old('dokter'))
							<option value="{{ $dokter->name }}" selected>{{ $dokter->name.' - '.$dokter->id }}</option>
							@else
							<option value="{{ $dokter->name }}">{{ $dokter->name.' - '.$dokter->id }}</option>
							@endif
							@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Pelayanan <span class="text-danger">*</span></label>
							<select class="form-control" name="pelayanan" />
							@foreach($pelayanans as $pelayanan)
							@if($pelayanan->nama == old('pelayanan'))
							<option value="{{ $pelayanan->nama }}" selected>{{ $pelayanan->nama }}</option>
							@else
							<option value="{{ $pelayanan->nama }}">{{ $pelayanan->nama }}</option>
							@endif
							@endforeach
							</select>
						</div><br/>
						<div class="form-group">
							<button class="btn btn-primary">Simpan</button>
							<a class="btn btn-danger" href="{{ route('dokter.index') }}">Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container why-us">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-header">Ubah Data Kunjungan</div>

                <div class="card-body">
						@if($errors->any())
						@foreach($errors->all() as $err)
						<p class="alert alert-danger">{{ $err }}</p>
						@endforeach
						@endif
						<form action="{{ route('kunjungan.update', $row) }}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label>KTP <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="ktp" value="{{ old('ktp', $row->ktp) }}" />
							</div>
							<div class="form-group">
								<label>Nama <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="nama" value="{{ old('nama', $row->nama) }}" />
							</div>
							<div class="form-group">
								<label>Kelamin <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="kelamin" value="{{ old('kelamin', $row->kelamin) }}" />
							</div>
							<div class="form-group">
								<label>Tanggal Lahir <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="tgllahir" value="{{ old('tgllahir', $row->tgllahir) }}" />
							</div>
							<div class="form-group">
								<label>Alamat <span class="text-danger">*</span></label>
								<textarea class="form-control" name="alamat" >{{ old('alamat', $row->alamat) }}</textarea>
							</div>
							<div class="form-group">
								<label>Nomor HP <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="nomorhp" value="{{ old('nomorhp', $row->nomorhp) }}" />
							</div>
							<div class="form-group">
								<label>Dokter <span class="text-danger">*</span></label>
								<select class="form-control" name="dokter" />
								@foreach($dokters as $dokter)
								@if($dokter->dokter == old('dokter', $row->dokter))
								<option value="{{ $dokter->dokter.' ('.$dokter->pelayanan.')' }}" selected>{{ $dokter->dokter.' ('.$dokter->pelayanan.')' }}</option>
								@else
								<option value="{{ $dokter->dokter.' ('.$dokter->pelayanan.')' }}">{{ $dokter->dokter.' ('.$dokter->pelayanan.')' }}</option>
								@endif
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Keluhan <span class="text-danger">*</span></label>
								<textarea class="form-control" name="keluhan">{{ old('keluhan', $row->keluhan) }}</textarea>
							</div>
							<div class="form-group">
								<label>Penanganan <span class="text-danger">*</span></label>
								<textarea class="form-control" name="penanganan">{{ old('penanganan', $row->penanganan) }}</textarea>
							</div>
							<div class="form-group">
								<label>Biaya <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="biaya" value="{{ old('biaya', $row->biaya) }}" />
							</div>							
							<div class="form-group" style="margin-top:25px">
								<button class="btn btn-primary">Simpan</button>
								<a class="btn btn-danger" href="{{ route('kunjungan.index') }}">Kembali</a>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
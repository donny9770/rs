@extends('layouts.app')

@section('content')

<div class="container why-us">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
			<div class="card-header">Tambah Data Kunjungan Pasien</div>

                <div class="card-body">
					@if($errors->any())
					@foreach($errors->all() as $err)
					<p class="alert alert-danger">{{ $err }}</p>
					@endforeach
					@endif
					<form action="{{ route('kunjungan.store') }}" method="POST">
						@csrf
						<div class="form-group">
							<label>KTP <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="ktp" value="{{ old('ktp') }}" />
						</div>
						<div class="form-group">
							<label>Nama <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="nama" value="{{ old('nama') }}" />
						</div>						
						<div class="form-group">
							<label>Kelamin <span class="text-danger">*</span></label>
							<select class="form-control" name="kelamin" />
							<option value="l">Laki-Laki</option>
							<option value="p">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir <span class="text-danger">*</span></label>
							<input class="form-control" type="date" name="tgllahir" value="{{ old('tgllahir') }}" />
						</div>
						<div class="form-group">
							<label>Alamat <span class="text-danger">*</span></label>
							<textarea class="form-control" type="text" name="alamat">{{ old('alamat') }}</textarea>
						</div>
						<div class="form-group">
							<label>Nomor HP <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="nomorhp" value="{{ old('nomorhp') }}" />
						</div>
						<div class="form-group">
							<label>Pak Tukang <span class="text-danger">*</span></label>
							<select class="form-control" name="dokter" />
							@foreach($paktukang as $paktukang)
							@if($paktukang->paktukang == old('paktukang'))
							<option value="{{ $dokter->dokter.' ('.$dokter->pelayanan.')' }}" selected>{{ $paktukang->paktukang.' ('.$paktukang->pelayanan.')' }}</option>
							@else
							<option value="{{ $dokter->dokter.' ('.$dokter->pelayanan.')' }}">{{ $paktukang->paktukang.' ('.$paktukang->pelayanan.')' }}</option>
							@endif
							@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Keluhan <span class="text-danger">*</span></label>
							<textarea class="form-control" type="text" name="keluhan" value="{{ old('keluhan') }}" >
							</textarea>
						</div>
						<div class="form-group">
							<label>Penanganan <span class="text-danger">*</span></label>
							<textarea class="form-control" type="text" name="penanganan">{{ old('penanganan') }}</textarea>
						</div>
						<div class="form-group">
							<label>Biaya <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="biaya" value="{{ old('biaya') }}" />
						</div><br/>
						<div class="form-group">
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
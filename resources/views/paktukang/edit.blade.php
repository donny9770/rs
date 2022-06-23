@extends('layouts.app')

@section('content')
<div class="container why-us">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-header">Ubah Data Unit Kerja paktukang</div>

                <div class="card-body">
						@if($errors->any())
						@foreach($errors->all() as $err)
						<p class="alert alert-danger">{{ $err }}</p>
						@endforeach
						@endif
						<form action="{{ route('dokter.update', $row) }}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label>paktukang - ID <span class="text-danger">*</span></label>
								<select class="form-control" name="dokter" />
								@foreach($paktukangs as $paktukang)
								@if($paktukang->name == old('paktukang', $row->paktukang))
								<option value="{{ $paktukang->name }}" selected>{{ $paktukang->name.' - '.$paktukang->id }}</option>
								@else
								<option value="{{ $dokter->name }}">{{ $paktukang->name.' - '.$paktukang->id }}</option>
								@endif
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>paktukang - ID <span class="text-danger">*</span></label>
								<select class="form-control" name="pelayanan" />
								@foreach($pelayanans as $pelayanan)
								@if($pelayanan->nama == old('pelayanan', $row->pelayanan))
								<option value="{{ $pelayanan->nama }}" selected>{{ $pelayanan->nama }}</option>
								@else
								<option value="{{ $pelayanan->nama }}">{{ $pelayanan->nama }}</option>
								@endif
								@endforeach
								</select>
							</div>
							<div class="form-group" style="margin-top:25px">
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
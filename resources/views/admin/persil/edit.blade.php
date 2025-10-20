@extends('layouts.admin')

@section('content')
<div class="container">
	<h1 class="h3 mb-3">Edit Persil</h1>
	<form method="POST" action="{{ route('admin.persil.update', $persil->persil_id) }}">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label class="form-label">Kode Persil</label>
			<input name="kode_persil" class="form-control" value="{{ old('kode_persil', $persil->kode_persil) }}">
			@error('kode_persil')<div class="text-danger small">{{ $message }}</div>@enderror
		</div>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label class="form-label">Pemilik (User)</label>
				<select name="pemilik_warga_id" class="form-select">
					<option value="">- Opsional -</option>
					@foreach($users as $u)
						<option value="{{ $u->id }}" @selected(old('pemilik_warga_id', $persil->pemilik_warga_id)==$u->id)>{{ $u->name }} ({{ $u->email }})</option>
					@endforeach
				</select>
				@error('pemilik_warga_id')<div class="text-danger small">{{ $message }}</div>@enderror
			</div>
			<div class="col-md-3 mb-3">
				<label class="form-label">Luas (m2)</label>
				<input name="luas_m2" class="form-control" value="{{ old('luas_m2', $persil->luas_m2) }}">
				@error('luas_m2')<div class="text-danger small">{{ $message }}</div>@enderror
			</div>
			<div class="col-md-3 mb-3">
				<label class="form-label">Penggunaan</label>
				<input name="penggunaan" class="form-control" value="{{ old('penggunaan', $persil->penggunaan) }}">
				@error('penggunaan')<div class="text-danger small">{{ $message }}</div>@enderror
			</div>
		</div>
		<div class="mb-3">
			<label class="form-label">Alamat Lahan</label>
			<textarea name="alamat_lahan" class="form-control">{{ old('alamat_lahan', $persil->alamat_lahan) }}</textarea>
			@error('alamat_lahan')<div class="text-danger small">{{ $message }}</div>@enderror
		</div>
		<div class="row">
			<div class="col-md-2 mb-3">
				<label class="form-label">RT</label>
				<input name="rt" class="form-control" value="{{ old('rt', $persil->rt) }}">
				@error('rt')<div class="text-danger small">{{ $message }}</div>@enderror
			</div>
			<div class="col-md-2 mb-3">
				<label class="form-label">RW</label>
				<input name="rw" class="form-control" value="{{ old('rw', $persil->rw) }}">
				@error('rw')<div class="text-danger small">{{ $message }}</div>@enderror
			</div>
		</div>
		<div class="d-flex gap-2">
			<a href="{{ route('admin.persil.index') }}" class="btn btn-light">Batal</a>
			<button class="btn btn-primary">Update</button>
		</div>
	</form>
</div>
@endsection



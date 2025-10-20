@extends('layouts.admin')

@section('content')
<div class="container">
	<h1 class="h3 mb-3">Detail Persil</h1>
	<div class="card">
		<div class="card-body">
			<dl class="row mb-0">
				<dt class="col-sm-3">Kode Persil</dt>
				<dd class="col-sm-9">{{ $persil->kode_persil }}</dd>
				<dt class="col-sm-3">Pemilik</dt>
				<dd class="col-sm-9">{{ optional($persil->pemilik)->name }}</dd>
				<dt class="col-sm-3">Luas (m2)</dt>
				<dd class="col-sm-9">{{ $persil->luas_m2 }}</dd>
				<dt class="col-sm-3">Penggunaan</dt>
				<dd class="col-sm-9">{{ $persil->penggunaan }}</dd>
				<dt class="col-sm-3">Alamat</dt>
				<dd class="col-sm-9">{{ $persil->alamat_lahan }}</dd>
				<dt class="col-sm-3">RT/RW</dt>
				<dd class="col-sm-9">{{ $persil->rt }} / {{ $persil->rw }}</dd>
			</dl>
		</div>
	</div>
	<div class="mt-3">
		<a href="{{ route('admin.persil.index') }}" class="btn btn-light">Kembali</a>
		<a href="{{ route('admin.persil.edit', $persil->persil_id) }}" class="btn btn-primary">Edit</a>
	</div>
</div>
@endsection



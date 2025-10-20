@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<div>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-1">
					<li class="breadcrumb-item"><a href="{{ url('/admin/persil') }}">Persil</a></li>
					<li class="breadcrumb-item active" aria-current="page">List</li>
				</ol>
			</nav>
			<h1 class="h3 mb-0">Data Persil</h1>
			<small>List data seluruh persil</small>
		</div>
		<a href="{{ route('admin.persil.create') }}" class="btn btn-success">Tambah Persil</a>
	</div>

	@if(session('success'))
		<div class="alert alert-success">{{ session('success') }}</div>
	@endif
	@if($errors->any())
		<div class="alert alert-danger">Terjadi kesalahan input. Periksa kembali form Anda.</div>
	@endif

	<div class="card border-0 shadow">
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table align-items-center table-flush mb-0">
					<thead class="thead-light">
						<tr>
							<th scope="col">Kode Persil</th>
							<th scope="col">Pemilik</th>
							<th scope="col">Luas (m2)</th>
							<th scope="col">Penggunaan</th>
							<th scope="col" class="text-end">Action</th>
						</tr>
					</thead>
					<tbody>
					@forelse($items as $item)
						<tr>
							<td class="text-gray-900 fw-bold">{{ $item->kode_persil }}</td>
							<td>{{ optional($item->pemilik)->name }}</td>
							<td>{{ $item->luas_m2 }}</td>
							<td>{{ $item->penggunaan }}</td>
							<td class="text-end">
								<a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.persil.show', $item->persil_id) }}">Detail</a>
								<a class="btn btn-sm btn-primary" href="{{ route('admin.persil.edit', $item->persil_id) }}">Edit</a>
								<form class="d-inline" method="POST" action="{{ route('admin.persil.destroy', $item->persil_id) }}" onsubmit="return confirm('Hapus data ini?')">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-danger" type="submit">Hapus</button>
								</form>
							</td>
						</tr>
					@empty
						<tr><td colspan="5" class="text-center text-muted">Belum ada data</td></tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="mt-3">
		{{ $items->links() }}
	</div>
</div>
@endsection



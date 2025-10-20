@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h1 class="h3">Dokumen Persil</h1>
		<a href="{{ route('admin.dokumen-persil.create') }}" class="btn btn-primary">Tambah</a>
	</div>
	@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
	<div class="card"><div class="card-body p-0">
		<table class="table table-striped mb-0">
			<thead><tr><th>Persil</th><th>Jenis</th><th>Nomor</th><th>Aksi</th></tr></thead>
			<tbody>
			@foreach($items as $item)
				<tr>
					<td>{{ optional($item->persil)->kode_persil }}</td>
					<td>{{ $item->jenis_dokumen }}</td>
					<td>{{ $item->nomor }}</td>
					<td class="d-flex gap-2">
						<a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.dokumen-persil.show', $item->dokumen_id) }}">Detail</a>
						<a class="btn btn-sm btn-outline-primary" href="{{ route('admin.dokumen-persil.edit', $item->dokumen_id) }}">Edit</a>
						<form method="POST" action="{{ route('admin.dokumen-persil.destroy', $item->dokumen_id) }}" onsubmit="return confirm('Hapus data ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Hapus</button></form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div></div>
	<div class="mt-3">{{ $items->links() }}</div>
</div>
@endsection



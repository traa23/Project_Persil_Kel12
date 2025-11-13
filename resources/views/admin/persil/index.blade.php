@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-map-marker-multiple"></i>
        </span> Data Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Manajemen Data Persil <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<!-- Success Alert -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Main Card -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Daftar Persil</h4>
                    <a href="{{ route('admin.persil.create') }}" class="btn btn-gradient-primary btn-sm">
                        <i class="mdi mdi-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kode Persil</th>
                                <th>Pemilik</th>
                                <th>Luas (m²)</th>
                                <th>Penggunaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                            <tr>
                                <td><strong>{{ $item->kode_persil }}</strong></td>
                                <td>{{ optional($item->pemilik)->name ?? '-' }}</td>
                                <td>{{ number_format($item->luas_m2, 2) }} m²</td>
                                <td><span class="badge badge-primary">{{ $item->penggunaan }}</span></td>
                                <td>
                                    <a href="{{ route('admin.persil.show', $item->persil_id) }}" class="btn btn-gradient-info btn-sm" title="Lihat">
                                        <i class="mdi mdi-book-open"></i> READ
                                    </a>
                                    <a href="{{ route('admin.persil.edit', $item->persil_id) }}" class="btn btn-gradient-warning btn-sm" title="Edit">
                                        <i class="mdi mdi-pencil"></i> UPDATE
                                    </a>
                                    <form class="d-inline" method="POST" action="{{ route('admin.persil.destroy', $item->persil_id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data persil ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-gradient-danger btn-sm" type="submit" title="Hapus">
                                            <i class="mdi mdi-delete"></i> DELETE
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="text-center">Belum ada data persil</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

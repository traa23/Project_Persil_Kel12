@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-format-list-bulleted-type"></i>
        </span> Data Jenis Penggunaan
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Manajemen Jenis Penggunaan <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
                    <h4 class="card-title">Daftar Jenis Penggunaan</h4>
                    <a href="{{ route('admin.jenis-penggunaan.create') }}" class="btn btn-gradient-primary btn-sm">
                        <i class="mdi mdi-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Penggunaan</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                            <tr>
                                <td><strong>{{ $item->nama_penggunaan }}</strong></td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a href="{{ route('admin.jenis-penggunaan.show', $item->jenis_id) }}" class="btn btn-gradient-info btn-sm" title="Lihat">
                                        <i class="mdi mdi-book-open"></i> READ
                                    </a>
                                    <a href="{{ route('admin.jenis-penggunaan.edit', $item->jenis_id) }}" class="btn btn-gradient-warning btn-sm" title="Edit">
                                        <i class="mdi mdi-pencil"></i> UPDATE
                                    </a>
                                    <form class="d-inline" method="POST" action="{{ route('admin.jenis-penggunaan.destroy', $item->jenis_id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jenis penggunaan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-gradient-danger btn-sm" type="submit" title="Hapus">
                                            <i class="mdi mdi-delete"></i> DELETE
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center">Belum ada data jenis penggunaan</td></tr>
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

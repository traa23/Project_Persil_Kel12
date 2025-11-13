@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-file-document-box"></i>
        </span> Detail Dokumen Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Detail Dokumen Persil
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Informasi Detail</h4>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th width="30%">Persil</th>
                            <td>{{ optional($dokumenPersil->persil)->kode_persil ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Dokumen</th>
                            <td>{{ $dokumenPersil->jenis_dokumen ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Dokumen</th>
                            <td>{{ $dokumenPersil->nomor ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Status File</th>
                            <td>
                                @if($dokumenPersil->file_path)
                                    <span class="badge badge-success">Tersedia</span>
                                @else
                                    <span class="badge badge-danger">Tidak Ada</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $dokumenPersil->keterangan ?? 'Tidak ada' }}</td>
                        </tr>
                    </table>
                </div>

                @if($dokumenPersil->file_path)
                <div class="mt-3">
                    <a href="{{ asset('storage/'.$dokumenPersil->file_path) }}" target="_blank" class="btn btn-gradient-info">
                        <i class="mdi mdi-download"></i> Download File
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Aksi</h4>
                <a href="{{ route('admin.dokumen-persil.edit', $dokumenPersil->dokumen_id) }}" class="btn btn-gradient-warning btn-block mb-2">
                    <i class="mdi mdi-pencil"></i> Edit
                </a>
                <a href="{{ route('admin.dokumen-persil.index') }}" class="btn btn-light btn-block">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

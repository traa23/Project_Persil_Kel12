@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-alert-circle"></i>
        </span> Detail Sengketa Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Detail Sengketa Persil
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
                            <td>{{ optional($sengketaPersil->persil)->kode_persil ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Status Sengketa</th>
                            <td>
                                @if($sengketaPersil->status == 'Selesai')
                                    <span class="badge badge-success">{{ $sengketaPersil->status ?? '-' }}</span>
                                @elseif($sengketaPersil->status == 'Proses')
                                    <span class="badge badge-warning">{{ $sengketaPersil->status ?? '-' }}</span>
                                @else
                                    <span class="badge badge-info">{{ $sengketaPersil->status ?? '-' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Pihak 1</th>
                            <td>{{ $sengketaPersil->pihak_1 ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Pihak 2</th>
                            <td>{{ $sengketaPersil->pihak_2 ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Penyelesaian</th>
                            <td>{{ $sengketaPersil->penyelesaian ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kronologi</th>
                            <td>{{ $sengketaPersil->kronologi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>File Bukti</th>
                            <td>
                                @if($sengketaPersil->file_path)
                                    <a href="{{ asset('storage/'.$sengketaPersil->file_path) }}" target="_blank" class="btn btn-gradient-info btn-sm">
                                        <i class="mdi mdi-eye"></i> Lihat Bukti
                                    </a>
                                @else
                                    Tidak ada file bukti
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Aksi</h4>
                <a href="{{ route('admin.sengketa-persil.edit', $sengketaPersil->sengketa_id) }}" class="btn btn-gradient-warning btn-block mb-2">
                    <i class="mdi mdi-pencil"></i> Edit
                </a>
                <a href="{{ route('admin.sengketa-persil.index') }}" class="btn btn-light btn-block">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

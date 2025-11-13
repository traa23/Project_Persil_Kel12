@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-map"></i>
        </span> Detail Peta Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Detail Peta Persil
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
                            <td>{{ optional($petaPersil->persil)->kode_persil ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Panjang</th>
                            <td>{{ $petaPersil->panjang_m ?? '-' }} meter</td>
                        </tr>
                        <tr>
                            <th>Lebar</th>
                            <td>{{ $petaPersil->lebar_m ?? '-' }} meter</td>
                        </tr>
                        <tr>
                            <th>Luas Total</th>
                            <td>
                                @if($petaPersil->panjang_m && $petaPersil->lebar_m)
                                    {{ number_format($petaPersil->panjang_m * $petaPersil->lebar_m, 2) }} m²
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>File Lampiran</th>
                            <td>
                                @if($petaPersil->file_path)
                                    <a href="{{ asset('storage/'.$petaPersil->file_path) }}" target="_blank" class="btn btn-gradient-info btn-sm">
                                        <i class="mdi mdi-eye"></i> Lihat File
                                    </a>
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>

                @if($petaPersil->geojson)
                <div class="mt-4">
                    <h5>GeoJSON Data</h5>
                    <pre class="bg-light p-3 rounded">{{ $petaPersil->geojson }}</pre>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Aksi</h4>
                <a href="{{ route('admin.peta-persil.edit', $petaPersil->peta_id) }}" class="btn btn-gradient-warning btn-block mb-2">
                    <i class="mdi mdi-pencil"></i> Edit
                </a>
                <a href="{{ route('admin.peta-persil.index') }}" class="btn btn-light btn-block">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

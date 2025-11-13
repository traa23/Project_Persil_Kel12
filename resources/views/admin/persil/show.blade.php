@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-map-marker-multiple"></i>
        </span> Detail Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Detail Data Persil
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
                            <th width="30%">Kode Persil</th>
                            <td>{{ $persil->kode_persil }}</td>
                        </tr>
                        <tr>
                            <th>Pemilik</th>
                            <td>{{ optional($persil->pemilik)->name ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Luas</th>
                            <td>{{ $persil->luas_m2 ?? 'Tidak ada' }} m²</td>
                        </tr>
                        <tr>
                            <th>Penggunaan</th>
                            <td>{{ $persil->penggunaan ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>RT</th>
                            <td>{{ $persil->rt ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>RW</th>
                            <td>{{ $persil->rw ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Lahan</th>
                            <td>{{ $persil->alamat_lahan ?? 'Tidak ada' }}</td>
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
                <a href="{{ route('admin.persil.edit', $persil->persil_id) }}" class="btn btn-gradient-warning btn-block mb-2">
                    <i class="mdi mdi-pencil"></i> Edit
                </a>
                <a href="{{ route('admin.persil.index') }}" class="btn btn-light btn-block">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-format-list-bulleted-type"></i>
        </span> Detail Jenis Penggunaan
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Detail Jenis Penggunaan
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
                            <th width="30%">Nama Penggunaan</th>
                            <td>{{ $jenisPenggunaan->nama_penggunaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $jenisPenggunaan->keterangan ?? '-' }}</td>
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
                <a href="{{ route('admin.jenis-penggunaan.edit', $jenisPenggunaan->jenis_id) }}" class="btn btn-gradient-warning btn-block mb-2">
                    <i class="mdi mdi-pencil"></i> Edit
                </a>
                <a href="{{ route('admin.jenis-penggunaan.index') }}" class="btn btn-light btn-block">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

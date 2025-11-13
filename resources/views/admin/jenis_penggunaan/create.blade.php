@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-format-list-bulleted-type"></i>
        </span> Tambah Jenis Penggunaan
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Form Tambah Jenis Penggunaan <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Jenis Penggunaan</h4>
                <form method="POST" action="{{ route('admin.jenis-penggunaan.store') }}" class="forms-sample">
                    @csrf

                    <div class="form-group">
                        <label for="nama_penggunaan">Nama Jenis Penggunaan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_penggunaan') is-invalid @enderror" id="nama_penggunaan" name="nama_penggunaan" value="{{ old('nama_penggunaan') }}" placeholder="Contoh: Pemukiman, Pertanian, Perdagangan" required>
                        @error('nama_penggunaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan tambahan tentang jenis penggunaan (opsional)">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">
                        <i class="mdi mdi-content-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.jenis-penggunaan.index') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-file-document-box"></i>
        </span> Edit Dokumen Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Form Edit Dokumen Persil <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Dokumen Persil</h4>
                <form method="POST" action="{{ route('admin.dokumen-persil.update', $dokumenPersil->dokumen_id) }}" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="persil_id">Pilih Persil <span class="text-danger">*</span></label>
                        <select name="persil_id" id="persil_id" class="form-control @error('persil_id') is-invalid @enderror" required>
                            <option value="">- Pilih Persil -</option>
                            @foreach($persil as $p)
                                <option value="{{ $p->persil_id }}" @selected(old('persil_id', $dokumenPersil->persil_id)==$p->persil_id)>{{ $p->kode_persil }}</option>
                            @endforeach
                        </select>
                        @error('persil_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_dokumen">Jenis Dokumen <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('jenis_dokumen') is-invalid @enderror" id="jenis_dokumen" name="jenis_dokumen" value="{{ old('jenis_dokumen', $dokumenPersil->jenis_dokumen) }}" placeholder="Contoh: Sertifikat, Akta Jual Beli" required>
                        @error('jenis_dokumen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nomor">Nomor Dokumen</label>
                        <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" value="{{ old('nomor', $dokumenPersil->nomor) }}" placeholder="Nomor dokumen">
                        @error('nomor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan', $dokumenPersil->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">Upload File Dokumen (Opsional)</label>
                        @if($dokumenPersil->file_path)
                        <div class="alert alert-info">
                            <i class="mdi mdi-information"></i> File saat ini: <strong>{{ basename($dokumenPersil->file_path) }}</strong>
                        </div>
                        @endif
                        <input type="file" name="file" id="file" class="form-control-file @error('file') is-invalid @enderror" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                        <small class="form-text text-muted">PDF, DOC, DOCX, JPG, PNG (Max 5MB)</small>
                        @error('file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">
                        <i class="mdi mdi-content-save"></i> Update
                    </button>
                    <a href="{{ route('admin.dokumen-persil.index') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

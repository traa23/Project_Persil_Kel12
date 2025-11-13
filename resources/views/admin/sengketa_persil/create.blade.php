@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-alert-circle"></i>
        </span> Tambah Sengketa Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Form Tambah Sengketa Persil <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Sengketa Persil</h4>

                @if($persil->isEmpty())
                <div class="alert alert-warning" role="alert">
                    <i class="mdi mdi-alert"></i> Belum ada data Persil. Silakan <a href="{{ route('admin.persil.create') }}" class="alert-link">tambah Persil</a> terlebih dahulu.
                </div>
                @endif

                <form method="POST" action="{{ route('admin.sengketa-persil.store') }}" enctype="multipart/form-data" class="forms-sample">
                    @csrf

                    <div class="form-group">
                        <label for="persil_id">Pilih Persil <span class="text-danger">*</span></label>
                        <select name="persil_id" id="persil_id" class="form-control @error('persil_id') is-invalid @enderror" @if($persil->isEmpty()) disabled @endif required>
                            <option value="">- Pilih Persil -</option>
                            @foreach($persil as $p)
                                <option value="{{ $p->persil_id }}" @selected(old('persil_id')==$p->persil_id)>{{ $p->kode_persil }}</option>
                            @endforeach
                        </select>
                        @error('persil_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pihak_1">Pihak 1 <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('pihak_1') is-invalid @enderror" id="pihak_1" name="pihak_1" value="{{ old('pihak_1') }}" placeholder="Nama pihak pertama" required>
                                @error('pihak_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pihak_2">Pihak 2</label>
                                <input type="text" class="form-control @error('pihak_2') is-invalid @enderror" id="pihak_2" name="pihak_2" value="{{ old('pihak_2') }}" placeholder="Nama pihak kedua">
                                @error('pihak_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kronologi">Kronologi</label>
                        <textarea name="kronologi" id="kronologi" rows="4" class="form-control @error('kronologi') is-invalid @enderror" placeholder="Kronologi kejadian sengketa">{{ old('kronologi') }}</textarea>
                        @error('kronologi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}" placeholder="Contoh: Proses, Selesai">
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penyelesaian">Penyelesaian</label>
                                <input type="text" class="form-control @error('penyelesaian') is-invalid @enderror" id="penyelesaian" name="penyelesaian" value="{{ old('penyelesaian') }}" placeholder="Cara penyelesaian">
                                @error('penyelesaian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file">Bukti (Opsional)</label>
                        <input type="file" name="file" id="file" class="form-control-file @error('file') is-invalid @enderror" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                        <small class="form-text text-muted">PDF, DOC, DOCX, JPG, PNG (Max 5MB)</small>
                        @error('file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2" @if($persil->isEmpty()) disabled @endif>
                        <i class="mdi mdi-content-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.sengketa-persil.index') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

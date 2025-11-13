@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-alert-circle"></i>
        </span> Edit Sengketa Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Form Edit Sengketa Persil <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Sengketa Persil</h4>
                <form method="POST" action="{{ route('admin.sengketa-persil.update', $sengketaPersil->sengketa_id) }}" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="persil_id">Pilih Persil <span class="text-danger">*</span></label>
                        <select name="persil_id" id="persil_id" class="form-control @error('persil_id') is-invalid @enderror" required>
                            <option value="">- Pilih Persil -</option>
                            @foreach($persil as $p)
                                <option value="{{ $p->persil_id }}" @selected(old('persil_id', $sengketaPersil->persil_id)==$p->persil_id)>{{ $p->kode_persil }}</option>
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
                                <input type="text" class="form-control @error('pihak_1') is-invalid @enderror" id="pihak_1" name="pihak_1" value="{{ old('pihak_1', $sengketaPersil->pihak_1) }}" placeholder="Nama pihak pertama" required>
                                @error('pihak_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pihak_2">Pihak 2</label>
                                <input type="text" class="form-control @error('pihak_2') is-invalid @enderror" id="pihak_2" name="pihak_2" value="{{ old('pihak_2', $sengketaPersil->pihak_2) }}" placeholder="Nama pihak kedua">
                                @error('pihak_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kronologi">Kronologi</label>
                        <textarea name="kronologi" id="kronologi" rows="4" class="form-control @error('kronologi') is-invalid @enderror" placeholder="Kronologi kejadian sengketa">{{ old('kronologi', $sengketaPersil->kronologi) }}</textarea>
                        @error('kronologi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status', $sengketaPersil->status) }}" placeholder="Contoh: Proses, Selesai">
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penyelesaian">Penyelesaian</label>
                                <input type="text" class="form-control @error('penyelesaian') is-invalid @enderror" id="penyelesaian" name="penyelesaian" value="{{ old('penyelesaian', $sengketaPersil->penyelesaian) }}" placeholder="Cara penyelesaian">
                                @error('penyelesaian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file">Bukti (Opsional)</label>
                        @if($sengketaPersil->bukti)
                        <div class="alert alert-info">
                            <i class="mdi mdi-information"></i> File saat ini: <strong>{{ basename($sengketaPersil->bukti) }}</strong>
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
                    <a href="{{ route('admin.sengketa-persil.index') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

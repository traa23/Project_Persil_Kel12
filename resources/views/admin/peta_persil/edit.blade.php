@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-map"></i>
        </span> Edit Peta Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Form Edit Peta Persil <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Peta Persil</h4>
                <form method="POST" action="{{ route('admin.peta-persil.update', $petaPersil->peta_id) }}" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="persil_id">Pilih Persil <span class="text-danger">*</span></label>
                        <select name="persil_id" id="persil_id" class="form-control @error('persil_id') is-invalid @enderror" required>
                            <option value="">- Pilih Persil -</option>
                            @foreach($persil as $p)
                                <option value="{{ $p->persil_id }}" @selected(old('persil_id', $petaPersil->persil_id)==$p->persil_id)>{{ $p->kode_persil }}</option>
                            @endforeach
                        </select>
                        @error('persil_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="panjang_m">Panjang (m)</label>
                                <input type="number" step="0.01" class="form-control @error('panjang_m') is-invalid @enderror" id="panjang_m" name="panjang_m" value="{{ old('panjang_m', $petaPersil->panjang_m) }}" placeholder="0.00">
                                @error('panjang_m')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lebar_m">Lebar (m)</label>
                                <input type="number" step="0.01" class="form-control @error('lebar_m') is-invalid @enderror" id="lebar_m" name="lebar_m" value="{{ old('lebar_m', $petaPersil->lebar_m) }}" placeholder="0.00">
                                @error('lebar_m')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="geojson">GeoJSON</label>
                        <textarea name="geojson" id="geojson" rows="6" class="form-control @error('geojson') is-invalid @enderror" placeholder='{"type":"Polygon","coordinates":[[[lng,lat],[lng,lat]]]}'>{{ old('geojson', $petaPersil->geojson) }}</textarea>
                        @error('geojson')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">Lampiran Scan (Opsional)</label>
                        @if($petaPersil->lampiran_scan)
                        <div class="alert alert-info">
                            <i class="mdi mdi-information"></i> File saat ini: <strong>{{ basename($petaPersil->lampiran_scan) }}</strong>
                        </div>
                        @endif
                        <input type="file" name="file" id="file" class="form-control-file @error('file') is-invalid @enderror" accept=".pdf,.jpg,.jpeg,.png">
                        <small class="form-text text-muted">PDF, JPG, PNG (Max 5MB)</small>
                        @error('file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">
                        <i class="mdi mdi-content-save"></i> Update
                    </button>
                    <a href="{{ route('admin.peta-persil.index') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

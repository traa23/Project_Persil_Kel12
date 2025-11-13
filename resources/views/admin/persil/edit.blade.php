@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-map-marker-multiple"></i>
        </span> Edit Persil
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Form Edit Data Persil <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Persil</h4>
                <form method="POST" action="{{ route('admin.persil.update', $persil->persil_id) }}" class="forms-sample">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="kode_persil">Kode Persil <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode_persil') is-invalid @enderror" id="kode_persil" name="kode_persil" value="{{ old('kode_persil', $persil->kode_persil) }}" placeholder="Contoh: PSL-001" required>
                        @error('kode_persil')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pemilik_warga_id">Pemilik (User)</label>
                        <select name="pemilik_warga_id" id="pemilik_warga_id" class="form-control @error('pemilik_warga_id') is-invalid @enderror">
                            <option value="">- Pilih Pemilik (Opsional) -</option>
                            @foreach($users as $u)
                                <option value="{{ $u->id }}" @selected(old('pemilik_warga_id', $persil->pemilik_warga_id)==$u->id)>{{ $u->name }} ({{ $u->email }})</option>
                            @endforeach
                        </select>
                        @error('pemilik_warga_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="luas_m2">Luas (m²)</label>
                        <input type="number" step="0.01" class="form-control @error('luas_m2') is-invalid @enderror" id="luas_m2" name="luas_m2" value="{{ old('luas_m2', $persil->luas_m2) }}" placeholder="0.00">
                        @error('luas_m2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="penggunaan">Penggunaan</label>
                        <input type="text" class="form-control @error('penggunaan') is-invalid @enderror" id="penggunaan" name="penggunaan" value="{{ old('penggunaan', $persil->penggunaan) }}" placeholder="Contoh: Pemukiman">
                        @error('penggunaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_lahan">Alamat Lahan</label>
                        <textarea name="alamat_lahan" id="alamat_lahan" rows="4" class="form-control @error('alamat_lahan') is-invalid @enderror" placeholder="Masukkan alamat lengkap lahan">{{ old('alamat_lahan', $persil->alamat_lahan) }}</textarea>
                        @error('alamat_lahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rt">RT</label>
                                <input type="text" class="form-control @error('rt') is-invalid @enderror" id="rt" name="rt" value="{{ old('rt', $persil->rt) }}" placeholder="001">
                                @error('rt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rw">RW</label>
                                <input type="text" class="form-control @error('rw') is-invalid @enderror" id="rw" name="rw" value="{{ old('rw', $persil->rw) }}" placeholder="001">
                                @error('rw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">
                        <i class="mdi mdi-content-save"></i> Update
                    </button>
                    <a href="{{ route('admin.persil.index') }}" class="btn btn-light">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

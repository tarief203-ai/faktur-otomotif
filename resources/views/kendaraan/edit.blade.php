@extends('layouts.app')

@section('content')
<h2 class="fw-light text-secondary mb-3">Ubah Data Kendaraan</h2>
<div class="card card-table-rapi">
    <div class="card-header card-header-orange">
        <i class="fas fa-edit me-1"></i> Edit Kendaraan: {{ $k->no_rangka }}
    </div>
    <div class="card-body">
        <form action="{{ url('/kendaraan/update/'.$k->no_rangka) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">No. Rangka (Kunci)</label>
                    <input type="text" class="form-control" value="{{ $k->no_rangka }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">No. Mesin</label>
                    <input type="text" name="no_mesin" class="form-control" value="{{ $k->no_mesin }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Merk</label>
                    <input type="text" name="merk" class="form-control" value="{{ $k->merk }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tipe</label>
                    <input type="text" name="tipe" class="form-control" value="{{ $k->tipe }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" value="{{ $k->model }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun_model" class="form-control" value="{{ $k->tahun_model }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Warna</label>
                    <input type="text" name="warna" class="form-control" value="{{ $k->warna }}">
                </div>
            </div>

            <hr>
            <button type="submit" class="btn btn-warning fw-bold">Update Data</button>
            <a href="{{ url('/kendaraan') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
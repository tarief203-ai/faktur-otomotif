@extends('layouts.app')

@section('content')
<h2 class="fw-light text-secondary mb-3">Tambah Data Kendaraan</h2>
<div class="card card-table-rapi">
    <div class="card-header card-header-orange">
        <i class="fas fa-plus me-1"></i> Form Input Kendaraan
    </div>
    <div class="card-body">
        <form action="{{ url('/kendaraan/store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">No. Rangka</label>
                    <input type="text" name="no_rangka" class="form-control" required placeholder="Masukkan nomor rangka">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">No. Mesin</label>
                    <input type="text" name="no_mesin" class="form-control" required placeholder="Masukkan nomor mesin">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Merk</label>
                    <input type="text" name="merk" class="form-control" required placeholder="Contoh: Honda">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tipe</label>
                    <input type="text" name="tipe" class="form-control" required placeholder="Contoh: Vario">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" placeholder="Contoh: Sepeda Motor">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun Pembuatan</label>
                    <input type="number" name="tahun" class="form-control" placeholder="2023">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Warna</label>
                    <input type="text" name="warna" class="form-control" placeholder="Hitam / Merah">
                </div>
            </div>

            <hr>
            <button type="submit" class="btn btn-primary-orange">Simpan Kendaraan</button>
            <a href="{{ url('/kendaraan') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
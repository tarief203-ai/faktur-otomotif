@extends('layouts.app')

@section('content')
<h2 class="fw-light text-secondary mb-3">Detail Pembayaran</h2>

<div class="card card-table-rapi shadow-sm">
    <div class="card-header card-header-orange">
        <i class="fas fa-info-circle me-1"></i> Informasi Lengkap Faktur: {{ $data->no_faktur }}
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">No. Faktur</label>
                <input type="text" class="form-control bg-white" value="{{ $data->no_faktur }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">ID Pemilik</label>
                <input type="text" class="form-control bg-white" value="{{ $data->id_pemilik }}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">No. Rangka</label>
                <input type="text" class="form-control bg-white" value="{{ $data->no_rangka }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Harga</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control bg-white" value="{{ number_format($data->harga, 0, ',', '.') }}" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">No. PUPD</label>
                <input type="text" class="form-control bg-white" value="{{ $data->no_pupd ?? '-' }}" readonly>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">Tanggal PUPD</label>
                <input type="text" class="form-control bg-white" value="{{ $data->tgl_pupd ?? '-' }}" readonly>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">Jumlah Unit</label>
                <input type="text" class="form-control bg-white" value="{{ $data->jumlah_unit }}" readonly>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Terbilang</label>
            <textarea class="form-control bg-white" rows="2" readonly>{{ strtoupper($data->terbilang ?? '-') }}</textarea>
        </div>

        <hr>
        <div class="d-flex gap-2">
            <a href="{{ url('/pembayaran') }}" class="btn btn-secondary px-4">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
            <a href="{{ url('/pembayaran/cetak/'.$data->no_faktur) }}" target="_blank" class="btn btn-dark px-4">
                <i class="fas fa-print me-1"></i> Cetak Faktur
            </a>
        </div>
    </div>
</div>
@endsection
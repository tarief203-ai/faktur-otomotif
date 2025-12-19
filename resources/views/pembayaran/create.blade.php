@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h2 class="fw-light text-secondary mb-3 mt-3">Tambah Pembayaran</h2>

    <div class="card card-table-rapi shadow-sm mb-5" style="max-width: 700px;">
        <div class="card-header card-header-orange py-3">
            <i class="fas fa-plus-circle me-1"></i> Form Input Pembayaran Baru
        </div>
        <div class="card-body p-4">
            <form action="{{ url('/pembayaran/store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Nomor Faktur</label>
                    <input type="text" name="no_faktur" class="form-control py-2" placeholder="Contoh: FAK-2025-001" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih Pemilik</label>
                    <select name="id_pemilik" class="form-select py-2" required>
                        <option value="">-- Pilih Nama Pemilik --</option>
                        @foreach($pemiliks as $p)
                            <option value="{{ $p->id_pemilik }}">{{ $p->id_pemilik }} - {{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih No. Rangka Kendaraan</label>
                    <select name="no_rangka" class="form-select py-2" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        @foreach($kendaraans as $k)
                            <option value="{{ $k->no_rangka }}">{{ $k->no_rangka }} ({{ $k->merk }} - {{ $k->tipe }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Jumlah Unit</label>
                    <input type="number" name="jumlah_unit" class="form-control py-2" min="1" value="1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Harga Satuan (Rp)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light">Rp</span>
                        <input type="number" name="harga" class="form-control py-2" placeholder="Contoh: 25000000" required>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-grid gap-2 d-md-flex">
                    <button type="submit" class="btn btn-primary-orange px-5 fw-bold">Simpan Data</button>
                    <a href="{{ url('/pembayaran') }}" class="btn btn-secondary px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
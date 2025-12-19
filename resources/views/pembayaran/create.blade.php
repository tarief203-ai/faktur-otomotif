@extends('layouts.app')

@section('content')
<h2 class="fw-light text-secondary mb-3">Tambah Pembayaran Baru</h2>

<div class="card card-table-rapi">
    <div class="card-header card-header-orange">
        <i class="fas fa-file-invoice-dollar me-1"></i> Form Input Pembayaran
    </div>
    <div class="card-body">
        <form action="{{ url('/pembayaran/store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Faktur</label>
                    <input type="text" name="no_faktur" class="form-control" placeholder="Contoh: FAK-001" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pilih Pemilik</label>
                    <select name="id_pemilik" class="form-select" required>
                        <option value="">-- Pilih Pemilik --</option>
                        @foreach($pemiliks as $p)
                            <option value="{{ $p->id_pemilik }}">{{ $p->id_pemilik }} - {{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pilih Kendaraan (No Rangka)</label>
                    <select name="no_rangka" class="form-select" required>
                        <option value="">-- Pilih No Rangka --</option>
                        @foreach($kendaraans as $k)
                            <option value="{{ $k->no_rangka }}">{{ $k->no_rangka }} ({{ $k->merk }} - {{ $k->tipe }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah Unit</label>
                    <input type="number" name="jumlah_unit" class="form-control" min="1" value="1" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" placeholder="Contoh: 15000000" required>
                </div>
            </div>

            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary-orange">Simpan Pembayaran</button>
                <a href="{{ url('/pembayaran') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
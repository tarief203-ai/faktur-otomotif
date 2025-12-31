@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-orange-accent p-2 rounded-3 me-3 shadow-sm">
            <i class="fas fa-file-invoice-dollar text-white fs-4"></i>
        </div>
        <div>
            <h2 class="fw-bold mb-0 text-dark">TAMBAH PEMBAYARAN</h2>
            <small class="text-muted">Form Input Transaksi Baru</small>
        </div>
    </div>

    {{-- 1. ALERT NOTIFIKASI (MUNCUL JIKA PEMILIK/KENDARAAN SUDAH ADA DI TRANSAKSI) --}}
    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm fw-bold mb-4">
            <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 overflow-hidden" style="max-width: 900px; border-radius: 12px;">
        <div class="card-header bg-orange-dark py-3 border-0">
            <h5 class="card-title mb-0 text-white fw-bold">
                <i class="fas fa-edit me-2"></i>FORM TAMBAH
            </h5>
        </div>
        
        <div class="card-body p-0">
            <form action="{{ url('/pembayaran/store') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 align-middle">
                        <tbody>
                            <tr>
                                <th width="30%" class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No Faktur</th>
                                <td class="px-4 py-3">
                                    <input type="text" name="no_faktur" class="form-control" value="{{ old('no_faktur') }}" placeholder="Contoh: FKT-001" required>
                                </td>
                            </tr>
                            
                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No PUPD / Tgl PUPD</th>
                                <td class="px-4 py-3">
                                    <div class="input-group">
                                        <input type="text" name="no_pupd" class="form-control" value="{{ old('no_pupd') }}" placeholder="No PUPD" required>
                                        <input type="date" name="tgl_pupd" class="form-control" value="{{ old('tgl_pupd') }}" required>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Harga & Terbilang</th>
                                <td class="px-4 py-3">
                                    <input type="number" name="harga" class="form-control mb-2" value="{{ old('harga') }}" placeholder="Input nominal angka (Rp)" required>
                                    <input type="text" name="terbilang" class="form-control" value="{{ old('terbilang') }}" placeholder="Contoh: Satu Juta Rupiah" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Tanggal Pembayaran</th>
                                <td class="px-4 py-3">
                                    <input type="date" name="tgl_pembayaran" class="form-control" value="{{ old('tgl_pembayaran', date('Y-m-d')) }}" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Jumlah Unit</th>
                                <td class="px-4 py-3">
                                    <input type="number" name="jumlah_unit" class="form-control" value="{{ old('jumlah_unit', 1) }}" required>
                                </td>
                            </tr>

                            {{-- BAGIAN PILIH PEMILIK DENGAN PERINGATAN --}}
                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Pilih Pemilik</th>
                                <td class="px-4 py-3">
                                    <select name="id_pemilik" class="form-select" required>
                                        <option value="">-- Cari Nama Pemilik --</option>
                                        @foreach($pemiliks as $p)
                                            <option value="{{ $p->id_pemilik }}" {{ old('id_pemilik') == $p->id_pemilik ? 'selected' : '' }}>
                                                [{{ $p->id_pemilik }}] - {{ $p->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger fw-bold d-block mt-1">
                                        <i class="fas fa-info-circle me-1"></i> *Satu pemilik hanya boleh memiliki satu record pembayaran.
                                    </small>
                                </td>
                            </tr>

                            {{-- BAGIAN PILIH KENDARAAN DENGAN PERINGATAN --}}
                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Pilih Kendaraan</th>
                                <td class="px-4 py-3">
                                    <select name="no_rangka" class="form-select" required>
                                        <option value="">-- Pilih No Rangka --</option>
                                        @foreach($kendaraans as $k)
                                            <option value="{{ $k->no_rangka }}" {{ old('no_rangka') == $k->no_rangka ? 'selected' : '' }}>
                                                {{ $k->no_rangka }} ({{ $k->merk }} - {{ $k->model }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger fw-bold d-block mt-1">
                                        <i class="fas fa-info-circle me-1"></i> *Satu kendaraan hanya boleh memiliki satu record pembayaran.
                                    </small>
                                </td>
                            </tr>

                            <tr class="bg-light">
                                <td colspan="2" class="px-4 py-4 text-center">
                                    <a class="btn btn-secondary px-4 shadow-sm me-2" href="{{ url('/pembayaran') }}">
                                        <i class="fas fa-times me-1"></i> Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary-orange px-5 fw-bold shadow-sm">
                                        <i class="fas fa-save me-1"></i> Simpan Transaksi
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .bg-orange-soft { background-color: #fef4ea !important; }
    .bg-orange-dark { background-color: #FF6F00 !important; }
    .bg-orange-accent { background-color: #e65100 !important; }
    .text-orange-accent { color: #e65100 !important; }
    
    .btn-primary-orange { background-color: #FF6F00; color: white; border: none; }
    .btn-primary-orange:hover { background-color: #e65100; color: white; }
    
    .form-control:focus, .form-select:focus {
        border-color: #FF9800;
        box-shadow: 0 0 0 0.25rem rgba(255, 152, 0, 0.25);
    }
</style>
@endsection
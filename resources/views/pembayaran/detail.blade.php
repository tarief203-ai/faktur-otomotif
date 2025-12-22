@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h2 class="fw-light text-secondary mb-3">
        <i class="fas fa-receipt me-2 text-orange-accent"></i>Detail Pembayaran
    </h2>

    <div class="card shadow-sm border-0" style="max-width: 900px;">
        <div class="card-header bg-orange-dark text-white py-3">
            <i class="fas fa-info-circle me-1"></i> Informasi Lengkap Faktur: {{ $data->no_faktur }}
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0 align-middle">
                <tr>
                    <th width="30%" class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No. Faktur</th>
                    <td class="px-4 py-3 fw-bold text-dark">{{ $data->no_faktur }}</td>
                </tr>
                <tr>
                    <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">ID Pemilik</th>
                    <td class="px-4 py-3">{{ $data->id_pemilik }}</td>
                </tr>
                <tr>
                    <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No. Rangka</th>
                    <td class="px-4 py-3 font-monospace">{{ $data->no_rangka }}</td>
                </tr>
                <tr>
                    <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Harga Unit</th>
                    <td class="px-4 py-3">
                        <span class="badge bg-success fs-6">
                            Rp {{ number_format($data->harga, 0, ',', '.') }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No. PUPD / Tgl PUPD</th>
                    <td class="px-4 py-3">
                        {{ $data->no_pupd ?? '-' }} / <span class="text-muted">{{ $data->tgl_pupd ?? '-' }}</span>
                    </td>
                </tr>
                <tr>
                    <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Jumlah Unit</th>
                    <td class="px-4 py-3">{{ $data->jumlah_unit }} Unit</td>
                </tr>
                {{-- Baris Baru: Tanggal Pembayaran --}}
                <tr>
                    <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Tanggal Pembayaran</th>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($data->tgl_pembayaran)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Terbilang</th>
                    <td class="px-4 py-3 text-uppercase fst-italic text-secondary" style="font-size: 0.9rem;">
                        "{{ $data->terbilang ?? '-' }} Rupiah"
                    </td>
                </tr>
                <tr class="bg-light">
                    <td colspan="2" class="p-4 text-end">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small italic">
                                <i class="fas fa-clock me-1"></i> Data diakses pada: {{ date('d M Y H:i') }}
                            </span>
                            <div class="d-flex gap-2">
                                <a href="{{ url('/pembayaran') }}" class="btn btn-secondary px-4 fw-bold">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                                <a href="{{ url('/pembayaran/cetak/'.$data->no_faktur) }}" target="_blank" class="btn btn-dark px-4 fw-bold">
                                    <i class="fas fa-print me-1"></i> Cetak Faktur
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<style>
    .bg-orange-dark { background-color: #FF6F00 !important; }
    .bg-orange-soft { background-color: #fef4ea !important; }
    .text-orange-accent { color: #e65100 !important; }
    .btn-primary-orange { background-color: #FF6F00; border: none; }
</style>
@endsection
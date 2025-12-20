@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-orange-accent p-2 rounded-3 me-3 shadow-sm">
            <i class="fas fa-file-invoice-dollar text-white fs-4"></i>
        </div>
        <div>
            <h2 class="fw-bold mb-0 text-dark">DATA PEMBAYARAN</h2>
            <small class="text-muted">Manajemen transaksi faktur dan unit</small>
        </div>
    </div>
    
    <div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
        <div class="card-header bg-orange-dark py-3">
            <h5 class="card-title mb-0 text-white fw-bold">
                <i class="fas fa-table me-1"></i> Tabel Pembayaran
            </h5>
        </div>
        <div class="card-body">
            {{-- Tombol TAMBAH: Hanya muncul jika Role adalah ADMIN --}}
            @if(auth()->user()->role == 'admin')
            <a href="{{ url('/pembayaran/create') }}" class="btn btn-primary-orange mb-3 fw-bold text-white px-4 shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Tambah Pembayaran
            </a>
            @endif
            
            <div class="table-responsive">
                <table class="table table-hover table-bordered datatable-init align-middle">
                    <thead class="bg-orange-soft">
                        <tr class="text-center">
                            <th class="text-orange-accent">ID Pemilik</th>
                            <th class="text-orange-accent">Nama</th>
                            <th class="text-orange-accent">No Faktur</th>
                            <th class="text-orange-accent">Merk</th>
                            <th class="text-orange-accent">Unit</th>
                            <th class="text-orange-accent">Harga</th>
                            
                            {{-- Kolom AKSI: Hanya muncul jika Role adalah ADMIN --}}
                            @if(auth()->user()->role == 'admin')
                                <th class="text-orange-accent">Aksi</th>
                            @endif

                            <th class="text-orange-accent">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembayarans as $data)
                        <tr>
                            <td class="text-center">{{ $data->id_pemilik }}</td>
                            <td class="fw-bold text-dark">{{ $data->nama }}</td>
                            <td class="text-center">
                                <span class="badge bg-secondary px-2 py-2">{{ $data->no_faktur }}</span>
                            </td>
                            <td>{{ $data->merk }}</td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-light text-dark border">{{ $data->jumlah_unit }}</span>
                            </td>
                            <td class="text-end fw-bold">Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                            
                            {{-- Tombol EDIT & DELETE: Hanya untuk ADMIN --}}
                            @if(auth()->user()->role == 'admin')
                            <td class="text-center">
                                <div class="btn-group shadow-sm">
                                    <a href="{{ url('/pembayaran/edit/'.$data->no_faktur) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ url('/pembayaran/delete/'.$data->no_faktur) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            @endif

                            {{-- Tombol DETAIL & CETAK: Muncul untuk ADMIN maupun STAFF --}}
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ url('/pembayaran/detail/'.$data->no_faktur) }}" class="btn btn-sm btn-info text-white shadow-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ url('/pembayaran/cetak/'.$data->no_faktur) }}" target="_blank" class="btn btn-sm btn-dark shadow-sm">
                                        <i class="fas fa-print"></i> Cetak
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-orange-dark { background-color: #FF6F00 !important; }
    .bg-orange-soft { background-color: #fef4ea !important; }
    .bg-orange-accent { background-color: #e65100 !important; }
    .text-orange-accent { color: #e65100 !important; }
    
    .btn-primary-orange {
        background-color: #FF6F00;
        border: none;
        transition: 0.3s;
    }
    .btn-primary-orange:hover {
        background-color: #e65100;
        transform: translateY(-2px);
    }

    .table-hover tbody tr:hover {
        background-color: #fff9f4;
    }

    .datatable-init thead th {
        border-bottom: 2px solid #FF6F00 !important;
        vertical-align: middle;
    }
</style>
@endsection
@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h2 class="text-secondary mb-4">Data Pemilik</h2> 
    
    <div class="card shadow-sm border-0">
        <div class="card-header bg-orange-dark text-white py-3">
            <i class="fas fa-users me-1"></i> Tabel Pemilik
        </div>
        <div class="card-body">
            {{-- Tombol tambah hanya muncul jika login sebagai Admin --}}
            @if(auth()->user()->role == 'admin')
            <a href="{{ url('/pemilik/create') }}" class="btn btn-primary-orange mb-3 fw-bold text-white">
                <i class="fas fa-plus"></i> Tambah Pemilik
            </a>
            @endif
            
            <div class="table-responsive">
                <table class="table table-hover table-bordered datatable-init align-middle">
                    <thead class="bg-orange-soft">
                        <tr class="text-center text-orange-accent">
                            <th>ID Pemilik</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemiliks as $p) 
                        <tr>
                            <td class="text-center fw-bold">{{ $p->id_pemilik }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td class="text-center">{{ $p->kode_pos }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ url('/pemilik/edit/'.$p->id_pemilik) }}" class="btn btn-sm btn-warning text-white">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    {{-- Tombol hapus hanya muncul jika login sebagai Admin --}}
                                    @if(auth()->user()->role == 'admin')
                                    <a href="{{ url('/pemilik/delete/'.$p->id_pemilik) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data pemilik ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endif
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
    .text-orange-accent { color: #e65100 !important; }
    .btn-primary-orange { background-color: #FF6F00; border: none; }
    .btn-primary-orange:hover { background-color: #e65100; }
</style>
@endsection
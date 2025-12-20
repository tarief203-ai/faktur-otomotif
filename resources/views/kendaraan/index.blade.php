@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h2 class="text-secondary mb-4">Data Kendaraan</h2> <div class="card shadow-sm border-0">
        <div class="card-header bg-orange-dark text-white py-3">
            <i class="fas fa-car me-1"></i> Tabel Kendaraan
        </div>
        <div class="card-body">
            <a href="{{ url('/kendaraan/create') }}" class="btn btn-primary-orange mb-3 fw-bold text-white">
                <i class="fas fa-plus"></i> Tambah Kendaraan
            </a>
            
            <div class="table-responsive">
                <table class="table table-hover table-bordered datatable-init align-middle">
                    <thead class="bg-orange-soft">
                        <tr class="text-center text-orange-accent">
                            <th>No Rangka</th>
                            <th>No Mesin</th>
                            <th>Merk</th>
                            <th>Model</th>
                            <th>Warna</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kendaraans as $data) <tr>
                            <td class="text-center fw-bold">{{ $data->no_rangka }}</td>
                            <td class="text-center">{{ $data->no_mesin }}</td>
                            <td>{{ $data->merk }}</td>
                            <td>{{ $data->model }}</td>
                            <td class="text-center">{{ $data->warna }}</td>
                            <td class="text-center">{{ $data->tahun_model }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ url('/kendaraan/edit/'.$data->no_rangka) }}" class="btn btn-sm btn-warning text-white">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ url('/kendaraan/delete/'.$data->no_rangka) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kendaraan ini?')">
                                        <i class="fas fa-trash"></i>
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
    .text-orange-accent { color: #e65100 !important; }
    .btn-primary-orange { background-color: #FF6F00; border: none; }
    .btn-primary-orange:hover { background-color: #e65100; }
</style>
@endsection
@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h2 class="fw-light text-secondary mb-3">
        <i class="fas fa-edit me-2 text-orange-accent"></i>Ubah Data Kendaraan
    </h2>
    
    <div class="card shadow-sm border-0" style="max-width: 900px;">
        <div class="card-header bg-orange-dark text-white py-3">
            <i class="fas fa-edit me-1"></i> Form Edit Kendaraan: {{ $k->no_rangka }}
        </div>
        <div class="card-body p-0">
            <form action="{{ url('/kendaraan/update/'.$k->no_rangka) }}" method="POST">
                @csrf
                <table class="table table-bordered mb-0 align-middle">
                    <tr>
                        <th width="30%" class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No. Rangka</th>
                        <td class="px-4 py-3">
                            <input type="text" class="form-control bg-light" value="{{ $k->no_rangka }}" disabled>
                            <small class="text-muted">* No. Rangka adalah kunci unik dan tidak dapat diubah</small>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No. Mesin</th>
                        <td class="px-4 py-3">
                            <input type="text" name="no_mesin" class="form-control" value="{{ $k->no_mesin }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Merk</th>
                        <td class="px-4 py-3">
                            <input type="text" name="merk" class="form-control" value="{{ $k->merk }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Tipe</th>
                        <td class="px-4 py-3">
                            <input type="text" name="tipe" class="form-control" value="{{ $k->tipe }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Model</th>
                        <td class="px-4 py-3">
                            <input type="text" name="model" class="form-control" value="{{ $k->model }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Warna</th>
                        <td class="px-4 py-3">
                            <input type="text" name="warna" class="form-control" value="{{ $k->warna }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Tahun Model</th>
                        <td class="px-4 py-3">
                            <input type="number" name="tahun_model" class="form-control" value="{{ $k->tahun_model }}">
                        </td>
                    </tr>
                    <tr class="bg-light">
                        <td colspan="2" class="p-4 text-end">
                            <a href="{{ url('/kendaraan') }}" class="btn btn-secondary px-4 me-2 fw-bold">Batal</a>
                            <button type="submit" class="btn btn-primary-orange px-5 fw-bold text-white">Update Data</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<style>
    .bg-orange-dark { background-color: #FF6F00 !important; }
    .bg-orange-soft { background-color: #fef4ea !important; }
    .text-orange-accent { color: #e65100 !important; }
    .btn-primary-orange { background-color: #FF6F00; border: none; }
    .btn-primary-orange:hover { background-color: #e65100; color: white; }
</style>
@endsection
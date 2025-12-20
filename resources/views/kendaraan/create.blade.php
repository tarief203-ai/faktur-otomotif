@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h2 class="fw-light text-secondary mb-3"><i class="fas fa-car me-2 text-orange-accent"></i>Tambah Kendaraan</h2>
    <div class="card shadow-sm border-0" style="max-width: 900px;">
        <div class="card-header card-header-orange py-3">
            <i class="fas fa-plus-circle me-1"></i> Form Input Unit Baru
        </div>
        <div class="card-body p-0">
            <form action="{{ url('/kendaraan/store') }}" method="POST">
                @csrf
                <table class="table table-bordered mb-0 align-middle">
                    <tr>
                        <th width="30%" class="table-orange-header px-4 py-3 text-orange-accent fw-bold">No. Rangka</th>
                        <td class="px-4 py-3"><input type="text" name="no_rangka" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th class="table-orange-header px-4 py-3 text-orange-accent fw-bold">Merk</th>
                        <td class="px-4 py-3"><input type="text" name="merk" class="form-control" placeholder="Contoh: HONDA" required></td>
                    </tr>
                    <tr>
                        <th class="table-orange-header px-4 py-3 text-orange-accent fw-bold">Tipe</th>
                        <td class="px-4 py-3"><input type="text" name="tipe" class="form-control" placeholder="Contoh: SEDAN / SUV" required></td>
                    </tr>
                    <tr>
                        <th class="table-orange-header px-4 py-3 text-orange-accent fw-bold">Model</th>
                        <td class="px-4 py-3"><input type="text" name="model" class="form-control" placeholder="Contoh: CIVIC / HRV" required></td>
                    </tr>
                    <tr>
                        <th class="table-orange-header px-4 py-3 text-orange-accent fw-bold">Tahun Model</th>
                        <td class="px-4 py-3"><input type="number" name="tahun_model" class="form-control" placeholder="Contoh: 2024" required></td>
                    </tr>
                    <tr>
                        <th class="table-orange-header px-4 py-3 text-orange-accent fw-bold">Warna</th>
                        <td class="px-4 py-3"><input type="text" name="warna" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th class="table-orange-header px-4 py-3 text-orange-accent fw-bold">No Mesin</th>
                        <td class="px-4 py-3"><input type="text" name="no_mesin" class="form-control" required></td>
                    </tr>
                    <tr class="bg-light">
                        <td colspan="2" class="p-4 text-end">
                            <a href="{{ url('/kendaraan') }}" class="btn btn-secondary px-4 me-2">Batal</a>
                            <button type="submit" class="btn btn-primary-orange px-5 fw-bold">Simpan Unit</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
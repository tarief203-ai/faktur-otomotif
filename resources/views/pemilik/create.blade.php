@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h2 class="fw-light text-secondary mb-3"><i class="fas fa-user-plus me-2 text-orange-accent"></i>Tambah Pemilik</h2>
    <div class="card shadow-sm border-0" style="max-width: 800px;">
        <div class="card-header card-header-orange py-3">
            <i class="fas fa-id-card me-1"></i> Form Data Pemilik Baru
        </div>
        <div class="card-body p-0">
            <form action="{{ url('/pemilik/store') }}" method="POST">
                @csrf
                <table class="table table-bordered mb-0 align-middle">
                    <tr>
                        <th width="30%" class="table-orange-header px-4 py-3 text-orange-accent fw-bold">ID Pemilik</th>
                        <td class="px-4 py-3"><input type="text" name="id_pemilik" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th class="table-orange-header px-4 py-3 text-orange-accent fw-bold">Nama Lengkap</th>
                        <td class="px-4 py-3"><input type="text" name="nama" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th class="table-orange-header px-4 py-3 text-orange-accent fw-bold">Alamat</th>
                        <td class="px-4 py-3"><textarea name="alamat" class="form-control" rows="3" required></textarea></td>
                    </tr>
                   <tr>
                        <th class="table-orange-header px-4 py-3 text-orange-accent fw-bold">Kode Pos</th>
                        <td class="px-4 py-3"><input type="text" name="kode_pos" class="form-control" required></td>
                    </tr>
                    <tr class="bg-light">
                        <td colspan="2" class="p-4 text-end">
                            <a href="{{ url('/pemilik') }}" class="btn btn-secondary px-4 me-2">Batal</a>
                            <button type="submit" class="btn btn-primary-orange px-5 fw-bold">Simpan</button>
                        </td>
                    </tr>
                    
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
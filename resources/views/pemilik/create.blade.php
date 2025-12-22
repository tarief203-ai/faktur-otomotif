@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">

    <div class="d-flex align-items-center mb-4">
        <div class="bg-orange-accent p-2 rounded-3 me-3 shadow-sm">
            <i class="fas fa-user-plus text-white fs-4"></i>
        </div>
        <div>
            <h2 class="fw-bold mb-0 text-dark">TAMBAH PEMILIK</h2>
            <small class="text-muted">Form Input Data Pemilik Baru</small>
        </div>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden" style="max-width: 900px; border-radius: 12px;">
        <div class="card-header bg-orange-dark py-3 border-0">
            <h5 class="card-title mb-0 text-white fw-bold">
                <i class="fas fa-edit me-2"></i>FORM TAMBAH
            </h5>
        </div>

        <div class="card-body p-0">
            <form action="{{ url('/pemilik/store') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 align-middle">
                        <tbody>

                            <tr>
                                <th width="30%" class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">
                                    ID Pemilik
                                </th>
                                <td class="px-4 py-3">
                                    <input type="text" name="id_pemilik" class="form-control" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">
                                    Nama Lengkap
                                </th>
                                <td class="px-4 py-3">
                                    <input type="text" name="nama" class="form-control" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">
                                    Alamat
                                </th>
                                <td class="px-4 py-3">
                                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">
                                    Kode Pos
                                </th>
                                <td class="px-4 py-3">
                                    <input type="text" name="kode_pos" class="form-control" required>
                                </td>
                            </tr>

                            <tr class="bg-light">
                                <td class="px-4 py-4">
                                    <a href="{{ url('/pemilik') }}" class="btn btn-secondary px-4 shadow-sm">
                                        Kembali
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-end">
                                    <button type="submit" class="btn btn-primary-orange px-5 fw-bold shadow-sm">
                                        Simpan
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

    .btn-primary-orange {
        background-color: #FF6F00;
        color: white;
        border: none;
    }
    .btn-primary-orange:hover {
        background-color: #e65100;
        color: white;
    }

    .form-control:focus {
        border-color: #FF9800;
        box-shadow: 0 0 0 0.25rem rgba(255, 152, 0, 0.25);
    }
</style>
@endsection

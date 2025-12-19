@extends('layouts.app')

@section('content')
<div class="card card-table-rapi">
    <div class="card-header card-header-orange">
        <i class="fas fa-plus me-1"></i> Tambah Data Pemilik
    </div>
    <div class="card-body">
        <form action="{{ url('/pemilik/store') }}" method="POST">
            @csrf <div class="mb-3">
                <label class="form-label">ID Pemilik</label>
                <input type="text" name="id_pemilik" class="form-control" placeholder="P00x" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Kode Pos</label>
                <input type="text" name="kode_pos" class="form-control">
            </div>
            <hr>
            <button type="submit" class="btn btn-primary-orange">Simpan</button>
            <a href="{{ url('/pemilik') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
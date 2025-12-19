@extends('layouts.app')

@section('content')
<div class="card card-table-rapi">
    <div class="card-header card-header-orange">
        <i class="fas fa-edit me-1"></i> Ubah Data Pemilik
    </div>
    <div class="card-body">
        <form action="{{ url('/pemilik/update/'.$pemilik->id_pemilik) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">ID Pemilik</label>
                <input type="text" class="form-control" value="{{ $pemilik->id_pemilik }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $pemilik->nama }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $pemilik->alamat }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kode Pos</label>
                <input type="text" name="kode_pos" class="form-control" value="{{ $pemilik->kode_pos }}">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ url('/pemilik') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-secondary mb-4">Edit Data Pemilik</h2>
            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-orange-dark text-white py-3">
                    <i class="fas fa-edit me-1"></i> Form Ubah Data Pemilik
                </div>
                <div class="card-body p-4">
                    <form action="{{ url('/pemilik/update/'.$pemilik->id_pemilik) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold text-orange-accent">ID Pemilik</label>
                            <input type="text" class="form-control bg-light" value="{{ $pemilik->id_pemilik }}" disabled>
                            <small class="text-muted italic">* ID Pemilik tidak dapat diubah</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-orange-accent">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control border-orange-focus" value="{{ $pemilik->nama }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-orange-accent">Alamat</label>
                            <textarea name="alamat" class="form-control border-orange-focus" rows="3">{{ $pemilik->alamat }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-orange-accent">Kode Pos</label>
                            <input type="text" name="kode_pos" class="form-control border-orange-focus" value="{{ $pemilik->kode_pos }}">
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary-orange fw-bold text-white px-4">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                            <a href="{{ url('/pemilik') }}" class="btn btn-light border fw-bold px-4">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-orange-dark { background-color: #FF6F00 !important; }
    .text-orange-accent { color: #e65100 !important; }
    .btn-primary-orange { background-color: #FF6F00; border: none; }
    .btn-primary-orange:hover { background-color: #e65100; }
    .border-orange-focus:focus { 
        border-color: #FF6F00; 
        box-shadow: 0 0 0 0.25 reconnaissance rgba(255, 111, 0, 0.25); 
    }
</style>
@endsection
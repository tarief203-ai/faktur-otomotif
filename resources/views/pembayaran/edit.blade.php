@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h2 class="fw-light text-secondary mb-3 mt-3">Ubah Data Pembayaran</h2>

    <div class="card card-table-rapi shadow-sm mb-5" style="max-width: 700px;">
        <div class="card-header card-header-orange py-3">
            <i class="fas fa-edit me-1"></i> Form Update Faktur: <strong>{{ $data->no_faktur }}</strong>
        </div>
        <div class="card-body p-4">
            <form action="{{ url('/pembayaran/update/'.$data->no_faktur) }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-bold text-muted">Nomor Faktur (Kunci)</label>
                    <input type="text" class="form-control bg-light py-2" value="{{ $data->no_faktur }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih Pemilik</label>
                    <select name="id_pemilik" class="form-select py-2" required>
                        @foreach($pemiliks as $p)
                            <option value="{{ $p->id_pemilik }}" {{ $p->id_pemilik == $data->id_pemilik ? 'selected' : '' }}>
                                {{ $p->id_pemilik }} - {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih Kendaraan</label>
                    <select name="no_rangka" class="form-select py-2" required>
                        @foreach($kendaraans as $k)
                            <option value="{{ $k->no_rangka }}" {{ $k->no_rangka == $data->no_rangka ? 'selected' : '' }}>
                                {{ $k->no_rangka }} - {{ $k->merk }} ({{ $k->tipe }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Jumlah Unit</label>
                    <input type="number" name="jumlah_unit" class="form-control py-2" value="{{ $data->jumlah_unit }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Harga (Rp)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light">Rp</span>
                        <input type="number" name="harga" class="form-control py-2" value="{{ $data->harga }}" required>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-grid gap-2 d-md-flex">
                    <button type="submit" class="btn btn-warning px-5 fw-bold text-dark">Simpan Perubahan</button>
                    <a href="{{ url('/pembayaran') }}" class="btn btn-secondary px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
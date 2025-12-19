@extends('layouts.app')

@section('content')
<h2 class="fw-light text-secondary mb-3">Ubah Data Pembayaran</h2>

<div class="card card-table-rapi shadow-sm">
    <div class="card-header card-header-orange text-white">
        <i class="fas fa-edit me-1"></i> Edit Faktur: {{ $data->no_faktur }}
    </div>
    <div class="card-body">
        <form action="{{ url('/pembayaran/update/'.$data->no_faktur) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Faktur (Kunci)</label>
                    <input type="text" class="form-control bg-light" value="{{ $data->no_faktur }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pilih Pemilik</label>
                    <select name="id_pemilik" class="form-select" required>
                        @foreach($pemiliks as $p)
                            <option value="{{ $p->id_pemilik }}" {{ $p->id_pemilik == $data->id_pemilik ? 'selected' : '' }}>
                                {{ $p->id_pemilik }} - {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pilih Kendaraan (No Rangka)</label>
                    <select name="no_rangka" class="form-select" required>
                        @foreach($kendaraans as $k)
                            <option value="{{ $k->no_rangka }}" {{ $k->no_rangka == $data->no_rangka ? 'selected' : '' }}>
                                {{ $k->no_rangka }} ({{ $k->merk }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah Unit</label>
                    <input type="number" name="jumlah_unit" class="form-control" value="{{ $data->jumlah_unit }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" value="{{ $data->harga }}" required>
                </div>
            </div>

            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning fw-bold text-dark">Update Pembayaran</button>
                <a href="{{ url('/pembayaran') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
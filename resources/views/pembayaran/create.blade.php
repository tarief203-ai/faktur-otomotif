@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-orange-accent p-2 rounded-3 me-3 shadow-sm">
            <i class="fas fa-file-invoice-dollar text-white fs-4"></i>
        </div>
        <div>
            <h2 class="fw-bold mb-0 text-dark">TAMBAH PEMBAYARAN</h2>
            <small class="text-muted">Form Input Transaksi Baru</small>
        </div>
    </div>

    <div class="card shadow-sm border-0 overflow-hidden" style="max-width: 900px; border-radius: 12px;">
        <div class="card-header bg-orange-dark py-3 border-0">
            <h5 class="card-title mb-0 text-white fw-bold">
                <i class="fas fa-edit me-2"></i>FORM TAMBAH
            </h5>
        </div>
        
        <div class="card-body p-0">
            <form action="{{ url('/pembayaran/store') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 align-middle">
                        <tbody>
                            <tr>
                                <th width="30%" class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No Faktur</th>
                                <td class="px-4 py-3">
                                    <input type="text" name="no_faktur" class="form-control" required>
                                </td>
                            </tr>
                            
                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No_pupd</th>
                                <td class="px-4 py-3">
                                    <input type="text" name="no_pupd" class="form-control" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Tanggal pupd</th>
                                <td class="px-4 py-3">
                                    <input type="date" name="tgl_pupd" class="form-control" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Harga</th>
                                <td class="px-4 py-3">
                                    <input type="number" name="harga" class="form-control" placeholder="0" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Terbilang</th>
                                <td class="px-4 py-3">
                                    <input type="text" name="terbilang" class="form-control" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Tanggal pembayaran</th>
                                <td class="px-4 py-3">
                                    <input type="date" name="tgl_pembayaran" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Jumlah unit</th>
                                <td class="px-4 py-3">
                                    <input type="number" name="jumlah_unit" class="form-control" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">Id Pemilik</th>
                                <td class="px-4 py-3">
                                    <select name="id_pemilik" class="form-select" required>
                                        <option value="">--Pilih--</option>
                                        @foreach($pemiliks as $p)
                                            <option value="{{ $p->id_pemilik }}">{{ $p->id_pemilik }} - {{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-orange-soft px-4 py-3 text-orange-accent fw-bold">No Rangka</th>
                                <td class="px-4 py-3">
                                    <select name="no_rangka" class="form-select" required>
                                        <option value="">--Pilih--</option>
                                        @foreach($kendaraans as $k)
                                            <option value="{{ $k->no_rangka }}">{{ $k->no_rangka }} ({{ $k->merk }})</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr class="bg-light">
                                <td class="px-4 py-4"><a class="btn btn-secondary px-4 shadow-sm" href="{{ url('/pembayaran') }}">Kembali</a></td>
                                <td class="px-4 py-4">
                                    <button type="submit" name="proses" class="btn btn-primary-orange px-5 fw-bold shadow-sm">Simpan</button>
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
    .form-control:focus, .form-select:focus {
        border-color: #FF9800;
        box-shadow: 0 0 0 0.25rem rgba(255, 152, 0, 0.25);
    }
</style>
@endsection
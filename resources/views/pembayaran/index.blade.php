@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h2 class="text-secondary mb-4">Data Pembayaran</h2>
    
    <div class="card shadow-sm">
        <div class="card-header card-header-orange">
            <i class="fas fa-table me-1"></i> Tabel Pembayaran
        </div>
        <div class="card-body">
            <a href="{{ url('/pembayaran/create') }}" class="btn btn-primary-orange mb-3">
                <i class="fas fa-plus"></i> Tambah Pembayaran
            </a>
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-custom datatable-init">
                    <thead class="table-orange-header">
                        <tr>
                            <th>ID Pemilik</th>
                            <th>Nama</th>
                            <th>No Rangka</th>
                            <th>No Faktur</th>
                            <th>Merk</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembayarans as $data)
                        <tr>
                            <td>{{ $data->id_pemilik }}</td>
                            <td class="fw-bold">{{ $data->nama }}</td>
                            <td>{{ $data->no_rangka }}</td>
                            <td>{{ $data->no_faktur }}</td>
                            <td>{{ $data->merk }}</td>
                            <td>{{ $data->jumlah_unit }}</td>
                            <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ url('/pembayaran/edit/'.$data->no_faktur) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('/pembayaran/delete/'.$data->no_faktur) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
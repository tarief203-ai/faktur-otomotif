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
        <tr class="text-center">
            <th>ID Pemilik</th>
            <th>Nama</th>
            <th>No Faktur</th>
            <th>Merk</th>
            <th>Unit</th>
            <th>Harga</th>
            <th>Aksi</th> <th>Keterangan</th> </tr>
    </thead>
    <tbody>
        @foreach($pembayarans as $data)
        <tr>
            <td class="text-center">{{ $data->id_pemilik }}</td>
            <td class="fw-bold">{{ $data->nama }}</td>
            <td class="text-center"><span class="badge bg-secondary">{{ $data->no_faktur }}</span></td>
            <td>{{ $data->merk }}</td>
            <td class="text-center">{{ $data->jumlah_unit }}</td>
            <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
            
            <td class="text-center">
                <div class="d-flex justify-content-center gap-1">
                    <a href="{{ url('/pembayaran/edit/'.$data->no_faktur) }}" class="btn btn-sm btn-warning" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ url('/pembayaran/delete/'.$data->no_faktur) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>

            <td class="text-center">
                <div class="d-flex justify-content-center gap-1">
                    <a href="{{ url('/pembayaran/detail/'.$data->no_faktur) }}" class="btn btn-sm btn-info text-white">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                    <a href="{{ url('/pembayaran/cetak/'.$data->no_faktur) }}" target="_blank" class="btn btn-sm btn-dark">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
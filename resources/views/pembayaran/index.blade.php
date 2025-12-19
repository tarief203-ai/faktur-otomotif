@extends('layouts.app')

@section('content')
<h2 class="fw-light text-secondary mb-3">
    <i class="fas fa-file-invoice-dollar me-2 text-orange-accent"></i> Data Pembayaran
</h2>

<div class="card mb-4 card-table-rapi">
    <div class="card-header card-header-orange">
        <i class="fas fa-table me-1"></i> Tabel Pembayaran
    </div>
    <div class="card-body">
        <a href="{{ url('/pembayaran/create') }}" class="btn btn-primary-orange mb-3">
            <i class="fas fa-plus"></i> Tambah Pembayaran
        </a>

        <div class="table-responsive">
            <table class="table table-striped table-bordered datatable-init">
                <thead class="table-orange-header">
                    <tr>
                        <th>ID Pemilik</th>
                        <th>Nama</th>
                        <th>No Rangka</th>
                        <th>No Faktur</th>
                        <th>Merk</th>
                        <th>Unit</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayarans as $data)
                    <tr>
                        <td>{{ $data->id_pemilik }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->no_rangka }}</td>
                        <td>{{ $data->no_faktur }}</td>
                        <td>{{ $data->merk }}</td>
                        <td>{{ $data->jumlah_unit }}</td>
                        <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning btn-icon-action" href="{{ url('/pembayaran/edit/'.$data->no_faktur) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger btn-icon-action" href="{{ url('/pembayaran/delete/'.$data->no_faktur) }}" onclick="return confirm('Yakin hapus?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info text-white" href="{{ url('/pembayaran/detail/'.$data->no_faktur) }}">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a class="btn btn-sm btn-dark" href="{{ url('/pembayaran/cetak/'.$data->no_faktur) }}" target="_blank">
                                <i class="fas fa-print"></i> Cetak
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
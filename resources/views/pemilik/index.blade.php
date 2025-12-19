@extends('layouts.app')

@section('title', 'Data Pemilik')

@section('content')
    <h2 class="fw-light text-secondary mb-3">
        <i class="fas fa-users me-2 text-orange-accent"></i> Data Pemilik
    </h2>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Manajemen Data Pemilik</li>
    </ol>

    <div class="card mb-4 card-table-rapi">
        <div class="card-header card-header-orange">
            <i class="fas fa-table me-1"></i> Daftar Pemilik
        </div>
        <div class="card-body">
            <a href="{{ url('/pemilik/create') }}" class="btn btn-primary-orange mb-3">
                <i class="fas fa-plus"></i> Tambah Pemilik
            </a>
            
            <div class="table-responsive">
                <table id="pemilikTable" class="table table-striped table-bordered datatable-init" style="width:100%">
                    <thead class="table-orange-header">
                        <tr>
                            <th>ID Pemilik</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                            <th class="text-center">Aksi</th> </tr>
                    </thead>
                    <tbody>
                        @foreach($pemiliks as $p)
                        <tr>
                            <td>{{ $p->id_pemilik }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->kode_pos }}</td>
                            <td class="text-center">
                                <a href="{{ url('/pemilik/edit/'.$p->id_pemilik) }}" class="btn btn-sm btn-warning btn-icon-action" title="Ubah Data">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="{{ url('/pemilik/delete/'.$p->id_pemilik) }}" 
                                   class="btn btn-sm btn-danger btn-icon-action" 
                                   onclick="return confirm('Yakin ingin menghapus data {{ $p->nama }}?')" 
                                   title="Hapus Data">
                                    <i class="fas fa-trash"></i>
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
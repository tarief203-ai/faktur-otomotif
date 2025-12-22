@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        .text-orange-accent { color: #FF9800 !important; }
        .text-orange-dark { color: #E65100 !important; }
        .bg-orange-soft { background-color: #FFF3E0 !important; }
        .bg-orange-accent { background-color: #FF9800 !important; }
    </style>

    <div class="d-flex align-items-center gap-3 mb-4">
        <img src="{{ asset('img2.jpeg') }}" onerror="this.src='https://via.placeholder.com/50/FF9800/FFFFFF?text=V'" style="width: 50px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <div>
            <h2 class="fw-bold text-dark m-0">Dashboard</h2>
            <small class="text-muted text-uppercase" style="letter-spacing: 1px;">
                {{ auth()->user()->role == 'admin' ? 'Ringkasan Sistem Prospect Motor' : 'Panel Kerja Staff' }}
            </small>
        </div>
    </div>

    <div class="row g-4">
        
        {{-- HANYA MUNCUL UNTUK ADMIN --}}
        @if(auth()->user()->role == 'admin')
        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-bottom border-warning border-5 p-3 bg-white h-100">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted fw-bold">TOTAL PEMILIK</small>
                            <h3 class="fw-bold mb-0 mt-1 text-orange-accent">{{ $total_pemilik }} Data</h3>
                        </div>
                        <div class="bg-orange-soft p-3 rounded-circle">
                            <i class="fas fa-user-circle fa-2x text-orange-dark"></i>
                        </div>
                    </div>
                    <hr class="my-3 opacity-50">
                    <a href="{{ url('/pemilik') }}" class="text-decoration-none small fw-bold text-orange-accent">
                        Lihat Semua Pemilik <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-bottom border-warning border-5 p-3 bg-white h-100">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted fw-bold">TOTAL KENDARAAN</small>
                            <h3 class="fw-bold mb-0 mt-1 text-orange-accent">{{ $total_kendaraan }} Data</h3>
                        </div>
                        <div class="bg-orange-soft p-3 rounded-circle">
                            <i class="fas fa-car fa-2x text-orange-dark"></i>
                        </div>
                    </div>
                    <hr class="my-3 opacity-50">
                    <a href="{{ url('/kendaraan') }}" class="text-decoration-none small fw-bold text-orange-accent">
                        Lihat Semua Kendaraan <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        @endif

        {{-- MUNCUL UNTUK SEMUA (ADMIN & STAFF) --}}
        <div class="{{ auth()->user()->role == 'admin' ? 'col-md-4' : 'col-md-12' }}">
            <div class="card shadow-sm border-0 border-bottom border-warning border-5 p-3 bg-white h-100">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted fw-bold">PEMBAYARAN</small>
                            <h3 class="fw-bold mb-0 mt-1 text-orange-accent">
                                {{ $total_pembayaran }} Data 
                                <small class="fs-6 text-muted fw-normal">{{ auth()->user()->role == 'staff' ? '(Milik Saya)' : '' }}</small>
                            </h3>
                        </div>
                        <div class="bg-orange-soft p-3 rounded-circle">
                            <i class="fas fa-file-invoice-dollar fa-2x text-orange-dark"></i>
                        </div>
                    </div>
                    <hr class="my-3 opacity-50">
                    <a href="{{ url('/pembayaran') }}" class="text-decoration-none small fw-bold text-orange-accent">
                        Lihat Laporan Keuangan <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="alert bg-white border-0 shadow-sm d-flex align-items-center">
                <div class="bg-orange-accent text-white rounded-2 p-2 me-3">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div>
                    <span class="fw-bold text-dark">Informasi Sistem:</span> 
                    {{ auth()->user()->role == 'admin' 
                        ? 'Sistem ini digunakan untuk memantau data operasional Prospect Motor secara real-time.' 
                        : 'Anda masuk sebagai Staff. Anda hanya dapat melihat dan mencetak data pembayaran yang Anda kelola.' }}
                    Ditemukan total <strong>{{ $total_pembayaran }}</strong> transaksi yang tercatat.
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex align-items-center gap-3 mb-4">
        <img src="{{ asset('img2.jpeg') }}" onerror="this.src='https://via.placeholder.com/50/FF9800/FFFFFF?text=V'" style="width: 50px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <div>
            <h2 class="fw-bold text-dark m-0">Dashboard</h2>
            <small class="text-muted text-uppercase" style="letter-spacing: 1px;">Ringkasan Sistem Prospect Motor</small>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-bottom border-warning border-5 p-3 bg-white h-100">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted fw-bold">TOTAL PEMILIK</small>
                            <h3 class="fw-bold mb-0 mt-1 text-orange-accent">10 Data</h3>
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
                            <h3 class="fw-bold mb-0 mt-1 text-orange-accent">25 Data</h3>
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

        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-bottom border-warning border-5 p-3 bg-white h-100">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted fw-bold">PEMBAYARAN</small>
                            <h3 class="fw-bold mb-0 mt-1 text-orange-accent">15 Data</h3>
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
                    Sistem ini digunakan untuk memantau data operasional Prospect Motor secara real-time.
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid px-4">
    <div class="dashboard-title-container mt-4 mb-2">
        <i class="fas fa-chart-line fa-2x text-orange-accent me-2"></i>
        <h2 class="fw-light text-secondary mb-0">Dashboard</h2>
    </div>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active fw-bold text-orange-accent">Ringkasan Data The Vos</li>
    </ol>

    <div class="row g-4 mb-4">
        
        <div class="col-xl-4 col-md-6">
            <div class="card card-metric shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small fw-normal text-muted">Total Pemilik</div>
                        <div class="h3">
                            {{ \App\Models\Pemilik::count() }} Data
                        </div>
                    </div>
                    <i class="fas fa-users fa-3x text-orange-accent opacity-25"></i>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a class="small text-orange-accent stretched-link fw-bold text-decoration-none" href="{{ url('/pemilik') }}">Lihat Detail</a>
                    <div class="small text-orange-accent"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card card-metric shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small fw-normal text-muted">Total Kendaraan</div>
                        <div class="h3">
                            {{ \App\Models\Kendaraan::count() }} Unit
                        </div>
                    </div>
                    <i class="fas fa-car fa-3x text-orange-accent opacity-25"></i>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a class="small text-orange-accent stretched-link fw-bold text-decoration-none" href="{{ url('/kendaraan') }}">Lihat Detail</a>
                    <div class="small text-orange-accent"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card card-metric shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small fw-normal text-muted">Total Transaksi</div>
                        <div class="h3">
                            {{ \App\Models\Pembayaran::count() }} Faktur
                        </div>
                    </div>
                    <i class="fas fa-file-invoice-dollar fa-3x text-orange-accent opacity-25"></i>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a class="small text-orange-accent stretched-link fw-bold text-decoration-none" href="{{ url('/pembayaran') }}">Lihat Detail</a>
                    <div class="small text-orange-accent"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>

    <div class="card border-0 shadow-sm bg-orange-soft p-4">
        <div class="d-flex align-items-center">
            <div class="me-4">
                <i class="fas fa-hand-sparkles fa-3x text-orange-accent"></i>
            </div>
            <div>
                <h4 class="text-orange-accent fw-bold">Selamat Datang, Admin The Vos!</h4>
                <p class="mb-0 text-muted">Gunakan menu di sebelah kiri untuk mengelola data pemilik, armada kendaraan, dan memantau status pembayaran faktur secara real-time.</p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Tambahan Style khusus Dashboard agar identik dengan permintaan */
    .card-metric {
        background-color: #ffffff !important;
        border: none;
        border-bottom: 5px solid #e65100 !important; 
        border-radius: 8px;
        transition: transform 0.3s;
    }

    .card-metric:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15) !important;
    }

    .card-metric .h3 {
        color: #e65100; 
        font-weight: 800;
        margin-top: 5px;
    }

    .bg-orange-soft {
        background-color: #fce4cc !important;
    }

    .dashboard-title-container {
        display: flex;
        align-items: center;
    }
</style>
@endsection
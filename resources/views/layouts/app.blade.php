<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - The Vos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --orange-light: #FF9800;
            --orange-dark: #FF6F00;
            --orange-accent: #e65100;
            --white-clean: #ffffff;
            --orange-soft: #fce4cc; /* Warna header tabel index */
        }

        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-width: 250px;
            max-width: 250px;
            background-color: var(--orange-dark);
            color: white;
            transition: all 0.3s;
        }

        .sidebar-heading {
            padding: 1.5rem;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            background-color: var(--orange-accent);
            letter-spacing: 2px;
        }

        .list-group-item {
            background-color: transparent;
            color: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 1rem 1.5rem;
            border-left: 4px solid transparent;
        }

        .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid white;
        }

        .list-group-item.active {
            background-color: rgba(0, 0, 0, 0.1);
            color: white;
            border-left: 4px solid white;
            font-weight: bold;
        }

        /* Content Styling */
        #page-content-wrapper {
            width: 100%;
            padding: 20px;
        }

        /* CSS Global Untuk Tabel dan Form */
        .card-header-orange {
            background-color: var(--orange-light) !important;
            color: white;
            font-weight: bold;
        }

        .btn-primary-orange {
            background-color: var(--orange-accent) !important;
            border-color: var(--orange-accent) !important;
            color: white;
        }
        
        .btn-primary-orange:hover {
            background-color: var(--orange-dark) !important;
            color: white;
        }

        /* Styling Header Tabel di Index */
        .table-orange-header th {
            background-color: var(--orange-soft) !important;
            color: var(--orange-dark);
            padding: 15px !important;
        }

        /* STYLING KHUSUS FORM VERTIKAL (TAMBAH/UBAH) */
        .table-form th {
            background-color: var(--orange-soft) !important;
            color: var(--orange-accent);
            width: 30%;
            padding: 18px 20px !important;
            border-right: 1px solid #dee2e6 !important;
        }

        .table-form td {
            padding: 15px 20px !important;
        }

        .text-orange-accent {
            color: var(--orange-accent) !important;
        }
    </style>
</head>
<body>

    <div id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom">THE VOS</div>
        <div class="list-group list-group-flush mt-3">
            <small class="px-4 text-white-50 text-uppercase" style="font-size: 0.7rem;">Menu Utama</small>
            
            <a href="{{ url('/pemilik') }}" class="list-group-item list-group-item-action {{ Request::is('pemilik*') ? 'active' : '' }}">
                <i class="fas fa-user-circle me-2"></i> Data Pemilik
            </a>
            
            <a href="{{ url('/kendaraan') }}" class="list-group-item list-group-item-action {{ Request::is('kendaraan*') ? 'active' : '' }}">
                <i class="fas fa-car me-2"></i> Data Kendaraan
            </a>
            
            <a href="{{ url('/pembayaran') }}" class="list-group-item list-group-item-action {{ Request::is('pembayaran*') ? 'active' : '' }}">
                <i class="fas fa-file-invoice-dollar me-2"></i> Pembayaran
            </a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.datatable-init').DataTable({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json" }
            });
        });
    </script>
</body>
</html>
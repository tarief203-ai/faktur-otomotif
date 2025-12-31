<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Prospect Motor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --orange-light: #FF9800;
            --orange-dark: #FF6F00;
            --orange-accent: #e65100;
            --white-clean: #ffffff;
            --orange-soft: #fce4cc;
            --sidebar-width: 260px;
        }

        body {
            min-height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: var(--orange-dark);
            color: white;
            z-index: 1001;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            transition: margin 0.25s ease-out;
        }

        .sidebar-heading {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            font-weight: bold;
            background-color: var(--orange-accent);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .list-group-item {
            background-color: transparent;
            color: rgba(255, 255, 255, 0.85);
            border: none;
            padding: 1rem 1.5rem;
            border-left: 4px solid transparent;
            transition: 0.2s;
        }

        .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid var(--orange-soft);
        }

        .list-group-item.active {
            background-color: rgba(0, 0, 0, 0.15) !important;
            color: white !important;
            border-left: 4px solid white !important;
            font-weight: bold;
        }

        /* Content Wrapper */
        #page-content-wrapper {
            flex: 1;
            margin-left: var(--sidebar-width);
            display: flex;
            flex-direction: column;
            min-width: 0;
            transition: margin 0.25s ease-out;
        }

        /* Navbar Orange */
        .navbar-custom {
            height: 60px;
            background-color: var(--orange-light) !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Efek Toggle Sidebar */
        body.sb-toggled #sidebar-wrapper {
            margin-left: calc(-1 * var(--sidebar-width));
        }
        body.sb-toggled #page-content-wrapper {
            margin-left: 0;
        }

        .main-content { padding: 30px; }
        
        .btn-toggle {
            color: white;
            border: none;
            background: transparent;
            font-size: 1.5rem;
            margin-right: 15px;
            cursor: pointer;
        }

        .btn-orange-pill { 
            background: white; 
            color: var(--orange-accent); 
            font-weight: bold; 
            border-radius: 50px; 
            padding: 5px 20px;
            border: none;
            transition: 0.3s;
            text-decoration: none;
        }
        .btn-orange-pill:hover { background: var(--orange-soft); color: var(--orange-dark); }
    </style>
</head>
<body>

    <div id="sidebar-wrapper">
        <div class="sidebar-heading">
            <i class="fas fa-car-side me-2"></i>Prospect Motor
        </div>
        <div class="list-group list-group-flush mt-3">
            <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action {{ Request::is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>

            {{-- HANYA ADMIN yang bisa melihat menu Data Pemilik dan Data Kendaraan --}}
            @if(auth()->check() && auth()->user()->role == 'admin')
                <a href="{{ url('/pemilik') }}" class="list-group-item list-group-item-action {{ Request::is('pemilik*') ? 'active' : '' }}">
                    <i class="fas fa-user-circle me-2"></i> Data Pemilik
                </a>
                
                <a href="{{ url('/kendaraan') }}" class="list-group-item list-group-item-action {{ Request::is('kendaraan*') ? 'active' : '' }}">
                    <i class="fas fa-car me-2"></i> Data Kendaraan
                </a>
            @endif

            {{-- Admin dan Staff bisa melihat menu Pembayaran --}}
            <a href="{{ url('/pembayaran') }}" class="list-group-item list-group-item-action {{ Request::is('pembayaran*') ? 'active' : '' }}">
                <i class="fas fa-file-invoice-dollar me-2"></i> Pembayaran
            </a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-dark navbar-custom">
            <div class="container-fluid p-0">
                <div class="d-flex align-items-center">
                    <button class="btn-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <span class="text-white fw-bold d-none d-md-inline ms-2">SISTEM INFORMASI PROSPECT MOTOR</span>
                </div>
                
                <div class="ms-auto d-flex align-items-center">
                    @if(auth()->check())
                        <div class="text-white me-3 d-none d-lg-block text-end">
                            <span class="fw-bold" style="font-size: 14px;">{{ auth()->user()->name }}</span>
                            <br>
                            <small class="opacity-75" style="font-size: 10px;">{{ strtoupper(auth()->user()->role) }}</small>
                        </div>
                    @endif

                    <a href="{{ url('/logout') }}" class="btn btn-orange-pill shadow-sm" onclick="return confirm('Apakah Anda ingin keluar?')">
                        Keluar <i class="fas fa-sign-out-alt ms-1"></i>
                    </a>
                </div>
            </div>
        </nav>

        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function () {
            // Sidebar Toggle
            $("#sidebarToggle").click(function(e) {
                e.preventDefault();
                $("body").toggleClass("sb-toggled");
            });

            // DataTable Init
            if ($('.datatable-init').length > 0) {
                $('.datatable-init').DataTable({
                    "language": { "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json" }
                });
            }
        });
    </script>
</body>
</html>
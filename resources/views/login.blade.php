<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - The Vos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .login-header {
            background-color: #FF6F00;
            color: white;
            text-align: center;
            padding: 2rem;
            border-radius: 15px 15px 0 0;
        }
        .btn-login {
            background-color: #e65100;
            border: none;
            color: white;
            font-weight: bold;
            padding: 12px;
        }
        .btn-login:hover {
            background-color: #bf4300;
            color: white;
        }
        .form-control:focus {
            border-color: #FF9800;
            box-shadow: 0 0 0 0.25rem rgba(255, 152, 0, 0.25);
        }
    </style>
</head>
<body>

<div class="card login-card">
    <div class="login-header">
        <h3 class="mb-0 fw-bold">THE VOS</h3>
        <small>Silakan masuk ke akun Anda</small>
    </div>
    <div class="card-body p-4">
        @if(session('error'))
            <div class="alert alert-danger small">{{ session('error') }}</div>
        @endif

        <form action="{{ url('/login/proses') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-bold">Email / Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-muted"><i class="fas fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="admin" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-muted"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="12345" required>
                </div>
            </div>
            <button type="submit" class="btn btn-login w-100 shadow-sm">LOG IN</button>
        </form>
    </div>
</div>

</body>
</html>
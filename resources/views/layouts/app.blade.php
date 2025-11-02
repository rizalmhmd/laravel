<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .navbar-brand {
            font-weight: bold;
        }
        .profile-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .jumbotron {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 2rem;
            border-radius: 15px;
        }
        
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        
        main {
            flex: 1;
        }

        footer {
            margin-top: auto;
        }
        
        .activity-item {
            transition: all 0.3s ease;
        }
        
        .activity-item:hover {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin: -15px -15px 15px -15px;
        }
        
        .btn-group .btn {
            margin-right: 5px;
        }

        .activity-number {
            width: 60px;
            height: 60px;
        }

        .btn-github {
            background: #24292e;
            color: white;
            border-color: #24292e;
        }

        .btn-github:hover {
            background: #1b1f23;
            color: white;
            border-color: #1b1f23;
        }

        /* ADMIN DASHBOARD STYLES */
        .admin-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .admin-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .quick-action-btn {
            border: none;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }

        .quick-action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .quick-action-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            display: block;
        }

        .admin-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .recent-activity {
            max-height: 400px;
            overflow-y: auto;
        }

        .activity-timeline {
            position: relative;
            padding-left: 30px;
        }

        .activity-timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e9ecef;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 20px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -23px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #667eea;
            border: 3px solid white;
            box-shadow: 0 0 0 3px #667eea;
        }

        /* LOGIN PAGE STYLES */
        .login-container {
            min-height: 100vh; /* Full height tanpa navbar */
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
        }

        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
        }

        .login-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 40px 20px;
            text-align: center;
        }

        .login-body {
            padding: 40px 30px;
            background: white;
        }

        .login-icon {
            font-size: 3.5rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .login-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-right: none;
        }

        .password-toggle {
            cursor: pointer;
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-left: none;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .back-to-home {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- NAVBAR - HILANG HANYA DI LOGIN -->
    @if(!Request::is('admin/login'))
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-code"></i> ZallPortfolio
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                    <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    <a class="nav-link {{ Request::is('aktivitas') ? 'active' : '' }}" href="/aktivitas">
                        <i class="fas fa-briefcase"></i> Aktivitas
                    </a>
                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">
                        <i class="fas fa-envelope"></i> Kontak
                    </a>
                    @auth
                        @if(Auth::user()->is_admin)
                            <a class="nav-link {{ Request::is('admin*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-cog"></i> Admin
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    @endif

    <main>
        @yield('content')
    </main>

    <!-- FOOTER - HILANG HANYA DI LOGIN -->
    @if(!Request::is('admin/login'))
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p>&copy; 2025 ZallPortfolio. All rights reserved.</p>
            <div class="social-links">
                <a href="https://www.linkedin.com/in/rizz-all-36294b386/" class="text-white mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                <a href="https://github.com/rizalmhmd" class="text-white mx-2"><i class="fab fa-github fa-lg"></i></a>
                <a href="https://instagram.com/zallzall02" class="text-white mx-2"><i class="fab fa-instagram fa-lg"></i></a>
            </div>
        </div>
    </footer>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('form[action*="destroy"]');
            
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Aktivitas yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Password toggle functionality
            const passwordToggle = document.querySelector('.password-toggle');
            if (passwordToggle) {
                passwordToggle.addEventListener('click', function() {
                    const passwordInput = document.getElementById('password');
                    const icon = this.querySelector('i');
                    
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            }
        });
    </script>
</body>
</html>
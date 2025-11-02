@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <!-- Back to Home Button -->
    <div class="back-to-home">
        <a href="{{ url('/') }}" class="btn btn-light btn-sm">
            <i class="fas fa-arrow-left me-1"></i> Back to Home
        </a>
    </div>

    <div class="login-card">
        <div class="login-header">
            <div class="login-icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <h3 class="mb-2">Welcome Back!</h3>
            <p class="mb-0 opacity-75">Login to your ZallPortfolio account</p>
        </div>
        
        <div class="login-body">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Social Login Buttons -->
            <div class="social-login mb-4">
                <a href="{{ route('admin.auth.google') }}" class="btn btn-google w-100 mb-3">
                    <i class="fab fa-google me-2"></i> Continue with Google
                </a>

                <a href="{{ route('auth.github') }}" class="btn btn-github w-100">
                    <i class="fab fa-github me-2"></i> Continue with GitHub
                </a>
            </div>

            <div class="divider">
                <span>or continue with email</span>
            </div>

            <!-- Regular Login Form -->
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">
                        <i class="fas fa-envelope me-2 text-primary"></i>Email Address
                    </label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">
                        <i class="fas fa-lock me-2 text-primary"></i>Password
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Enter your password" required>
                        <span class="input-group-text password-toggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn login-btn text-white w-100 mb-3">
                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                </button>

                <div class="text-center">
                    <p class="text-muted mb-0">
                        Don't have an account? 
                        <a href="{{ url('/') }}" class="text-decoration-none">Contact admin</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.social-login .btn {
    padding: 12px;
    font-weight: 500;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.social-login .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.btn-google {
    background: white;
    color: #757575;
    border-color: #ddd;
}

.btn-google:hover {
    background: #f8f9fa;
    color: #757575;
}

.btn-facebook {
    background: #1877f2;
    color: white;
    border-color: #1877f2;
}

.btn-facebook:hover {
    background: #166fe5;
    color: white;
}

.divider {
    text-align: center;
    margin: 20px 0;
    position: relative;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #e9ecef;
}

.divider span {
    background: white;
    padding: 0 15px;
    color: #6c757d;
    font-size: 0.9rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
@endsection
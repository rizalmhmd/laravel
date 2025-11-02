@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container mt-4">
    <div class="jumbotron text-center">
        <h1 class="display-4">Selamat Datang di Portfolio Saya!</h1>
        <p class="lead">Halo! Saya Rizal, seorang Web Developer yang passionate dalam menciptakan solusi digital yang inovatif.</p>
        <hr class="my-4">
        <p>Jelajahi portfolio saya untuk mengetahui lebih lanjut tentang skill, pengalaman, dan project yang telah saya kerjakan.</p>
        <div class="mt-4">
            <a href="/profile" class="btn btn-light btn-lg me-2">
                <i class="fas fa-user"></i> Lihat Profile
            </a>
            <a href="/contact" class="btn btn-outline-light btn-lg">
                <i class="fas fa-envelope"></i> Hubungi Saya
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="fas fa-user fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Profile</h5>
                    <p class="card-text">Lihat data diri, pendidikan, dan informasi lengkap tentang saya.</p>
                    <a href="/profile" class="btn btn-primary">Lihat Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="fas fa-briefcase fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Aktivitas</h5>
                    <p class="card-text">Jelajahi project dan pengalaman kerja yang telah saya selesaikan.</p>
                    <a href="/activities" class="btn btn-success">Lihat Aktivitas</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="fas fa-envelope fa-3x text-info mb-3"></i>
                    <h5 class="card-title">Kontak</h5>
                    <p class="card-text">Hubungi saya untuk diskusi project atau kolaborasi.</p>
                    <a href="/contact" class="btn btn-info">Hubungi Saya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
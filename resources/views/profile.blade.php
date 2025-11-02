@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ asset('storage/' . $profileData['foto']) }}" 
                         class="profile-img rounded-circle mx-auto d-block" 
                         alt="Foto {{ $profileData['nama'] }}"
                         onerror="this.src='https://via.placeholder.com/200x200/007bff/ffffff?text=Foto+Profile'">
                    
                    <h4 class="mt-3">{{ $profileData['nama'] }}</h4>
                    <p class="text-muted">{{ $profileData['profesi'] }}</p>
                    
                    <div class="d-grid gap-2">
                        <a href="/contact" class="btn btn-primary">
                            <i class="fas fa-envelope"></i> Hubungi Saya
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-info-circle"></i> Informasi Data Diri</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%"><i class="fas fa-user"></i> Nama Lengkap</th>
                                    <td>{{ $profileData['nama'] }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fas fa-briefcase"></i> Profesi</th>
                                    <td>{{ $profileData['profesi'] }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fas fa-envelope"></i> Email</th>
                                    <td>{{ $profileData['email'] }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fas fa-phone"></i> Telepon</th>
                                    <td>{{ $profileData['telepon'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%"><i class="fas fa-birthday-cake"></i> Umur</th>
                                    <td>{{ $profileData['umur'] }} tahun</td>
                                </tr>
                                <tr>
                                    <th><i class="fas fa-map-marker-alt"></i> Lokasi</th>
                                    <td>{{ $profileData['lokasi'] }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fas fa-graduation-cap"></i> Pendidikan</th>
                                    <td>{{ $profileData['pendidikan'] }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fas fa-star"></i> Status</th>
                                    <td><span class="badge bg-success">Available</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0"><i class="fas fa-address-card"></i> Informasi Kontak</h4>
                </div>
                <div class="card-body">
                    <div class="contact-info">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-envelope fa-lg text-info me-3"></i>
                            <div>
                                <strong>Email</strong><br>
                                {{ $contactInfo['email'] }}
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-phone fa-lg text-success me-3"></i>
                            <div>
                                <strong>Telepon/WhatsApp</strong><br>
                                {{ $contactInfo['telepon'] }}
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt fa-lg text-danger me-3"></i>
                            <div>
                                <strong>Alamat</strong><br>
                                {{ $contactInfo['alamat'] }}
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fab fa-linkedin fa-lg text-primary me-3"></i>
                            <div>
                                <strong>LinkedIn</strong><br>
                                {{ $contactInfo['linkedin'] }}
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="fab fa-github fa-lg text-dark me-3"></i>
                            <div>
                                <strong>GitHub</strong><br>
                                {{ $contactInfo['github'] }}
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <i class="fab fa-instagram fa-lg text-warning me-3"></i>
                            <div>
                                <strong>Instagram</strong><br>
                                {{ $contactInfo['instagram'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0"><i class="fas fa-paper-plane"></i> Form Kontak</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   placeholder="Masukkan nama Anda" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   placeholder="nama@example.com" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">Nomor Whatsapp</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" 
                                   placeholder="628xxxxxxx" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" name="message" 
                                      rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">
                            <i class="fas fa-paper-plane"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
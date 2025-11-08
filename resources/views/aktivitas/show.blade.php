@extends('layouts.app')

@section('title', 'Detail Aktivitas - ' . $aktivitas->nama_aktivitas)

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-info-circle"></i> Detail Aktivitas</h4>
                    <div>
                        <a href="{{ route('aktivitas.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        @auth
                            @if(Auth::user()->is_admin)
                                <a href="{{ route('aktivitas.edit', $aktivitas->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h3 class="text-success">{{ $aktivitas->nama_aktivitas }}</h3>
                            <div class="d-flex align-items-center mt-2">
                                <span class="badge {{ $aktivitas->status ? 'bg-success' : 'bg-warning' }} me-2">
                                    {{ $aktivitas->status ? 'Completed' : 'Pending' }}
                                </span>
                                <span class="text-muted">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    {{ \Carbon\Carbon::parse($aktivitas->tanggal)->format('d F Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-light p-3 rounded">
                                <small class="text-muted">Tahun</small>
                                <h4 class="text-primary mb-0">
                                    {{ \Carbon\Carbon::parse($aktivitas->tanggal)->format('Y') }}
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h5 class="border-bottom pb-2 mb-3">Alamat</h5>
                            <div class="p-3 bg-light rounded">
                                @if($aktivitas->alamat)
                                    {!! nl2br(e($aktivitas->alamat)) !!}
                                @else
                                    <p class="text-muted fst-italic">Tidak ada alamat yang tersedia untuk aktivitas ini.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h5 class="border-bottom pb-2 mb-3">Deskripsi Aktivitas</h5>
                            <div class="p-3 bg-light rounded">
                                @if($aktivitas->deskripsi)
                                    {!! nl2br(e($aktivitas->deskripsi)) !!}
                                @else
                                    <p class="text-muted fst-italic">Tidak ada deskripsi yang tersedia untuk aktivitas ini.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    @auth
                        @if(Auth::user()->is_admin)
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5 class="border-bottom pb-2 mb-3">Administrator Actions</h5>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('aktivitas.edit', $aktivitas->id) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Edit Aktivitas
                                    </a>
                                    <form action="{{ route('aktivitas.destroy', $aktivitas->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')">
                                            <i class="fas fa-trash"></i> Hapus Aktivitas
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endauth
                </div>

                <div class="card-footer text-muted">
                    <small>
                        <i class="fas fa-clock me-1"></i>
                        Terakhir diperbarui: {{ $aktivitas->updated_at->format('d M Y H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
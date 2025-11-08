@extends('layouts.app')

@section('title', 'Aktivitas')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-briefcase"></i> Aktivitas & Pengalaman</h4>
                    @auth
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('aktivitas.create') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-plus"></i> Tambah Aktivitas
                            </a>
                        @endif
                    @endauth
                </div>
                <div class="card-body">
                    @if($data->count() > 0)
                        @foreach($data as $index => $activity)
                        <div class="activity-item mb-4">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center activity-number">
                                        <strong>{{ $index + 1 }}</strong>
                                    </div>
                                    <div class="mt-2">
                                        <span class="badge bg-primary">
                                            {{ \Carbon\Carbon::parse($activity->tanggal)->format('Y') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h5 class="text-success">{{ $activity->nama_aktivitas }}</h5>
                                    <p class="mb-1"><strong>Tanggal:</strong> 
                                        {{ \Carbon\Carbon::parse($activity->tanggal)->format('d F Y') }}
                                    </p>
                                    <p class="mb-1"><strong>Alamat:</strong> {{ $activity->alamat }}</p>
                                    <p class="mb-1"><strong>Deskripsi:</strong> {{ $activity->deskripsi }}</p>
                                    <p class="mb-1"><strong>Status:</strong> 
                                        <span class="badge {{ $activity->status ? 'bg-success' : 'bg-warning' }}">
                                            {{ $activity->status ? 'Completed' : 'Pending' }}
                                        </span>
                                    </p>
                                    <div class="mt-3">
                                        @auth
                                            @if(Auth::user()->is_admin)
                                                <a href="{{ route('aktivitas.edit', $activity->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('aktivitas.destroy', $activity->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        @endauth
                                        <a href="{{ route('aktivitas.show', $activity->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-info-circle"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(!$loop->last)
                            <hr class="mt-3">
                            @endif
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada aktivitas.</p>
                            @auth
                                @if(Auth::user()->is_admin)
                                    <a href="{{ route('aktivitas.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Tambah Aktivitas Pertama
                                    </a>
                                @else
                                    <p class="text-muted small">Hubungi administrator untuk menambah aktivitas.</p>
                                @endif
                            @else
                                <p class="text-muted small">Login sebagai administrator untuk menambah aktivitas.</p>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.activity-number {
    width: 50px;
    height: 50px;
    font-size: 1.2rem;
}
</style>
@endsection
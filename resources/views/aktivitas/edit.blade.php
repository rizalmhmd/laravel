@extends('layouts.app')

@section('title', 'Edit Aktivitas - ZallPortfolio')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="fas fa-edit"></i> Edit Aktivitas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('aktivitas.update', $aktivitas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                            <input type="date" class="form-control" 
                                   id="tanggal" name="tanggal" value="{{ old('tanggal', $aktivitas->tanggal) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_aktivitas" class="form-label fw-bold">Judul Aktivitas</label>
                            <input type="text" class="form-control" 
                                   id="nama_aktivitas" name="nama_aktivitas" 
                                   value="{{ old('nama_aktivitas', $aktivitas->nama_aktivitas) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control" 
                                      id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $aktivitas->deskripsi) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="0" {{ old('status', $aktivitas->status) == 0 ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ old('status', $aktivitas->status) == 1 ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('aktivitas.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Update Aktivitas
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
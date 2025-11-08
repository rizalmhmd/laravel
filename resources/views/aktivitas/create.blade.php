@extends('layouts.app')

@section('title', 'Tambah Aktivitas')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Tambah Aktivitas</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aktivitas.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_aktivitas" class="form-label">Judul Aktivitas</label>
                                <input type="text" class="form-control" id="nama_aktivitas" name="nama_aktivitas" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tahun</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('aktivitas.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
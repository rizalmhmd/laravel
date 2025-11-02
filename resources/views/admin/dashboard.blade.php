@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0"><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h1>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
            </div>
            <p class="text-muted">Welcome back, Admin! Manage your application efficiently.</p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <i class="fas fa-users fa-2x mb-3"></i>
                <h2 class="stat-number">150</h2>
                <p class="stat-label">Total Users</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <i class="fas fa-briefcase fa-2x mb-3"></i>
                <h2 class="stat-number">{{ \App\Models\Aktivitas::count() }}</h2>
                <p class="stat-label">Activities</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <i class="fas fa-envelope fa-2x mb-3"></i>
                <h2 class="stat-number">23</h2>
                <p class="stat-label">Messages</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <i class="fas fa-chart-line fa-2x mb-3"></i>
                <h2 class="stat-number">89%</h2>
                <p class="stat-label">Performance</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card admin-card h-100">
                <div class="card-header admin-header">
                    <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <a href="{{ route('aktivitas.index') }}" class="btn quick-action-btn w-100">
                                <i class="fas fa-briefcase quick-action-icon text-primary"></i>
                                <span class="fw-bold">Manage Activities</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <button class="btn quick-action-btn w-100">
                                <i class="fas fa-users quick-action-icon text-success"></i>
                                <span class="fw-bold">User Management</span>
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn quick-action-btn w-100">
                                <i class="fas fa-cog quick-action-icon text-warning"></i>
                                <span class="fw-bold">Settings</span>
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn quick-action-btn w-100">
                                <i class="fas fa-chart-bar quick-action-icon text-info"></i>
                                <span class="fw-bold">Analytics</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card admin-card h-100">
                <div class="card-header admin-header">
                    <h5 class="mb-0"><i class="fas fa-history me-2"></i>Recent Activity</h5>
                </div>
                <div class="card-body recent-activity">
                    <div class="activity-timeline">
                        <div class="timeline-item">
                            <div class="d-flex justify-content-between">
                                <strong>New user registered</strong>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                            <p class="mb-0 text-muted">John Doe joined the platform</p>
                        </div>
                        <div class="timeline-item">
                            <div class="d-flex justify-content-between">
                                <strong>Activity created</strong>
                                <small class="text-muted">5 hours ago</small>
                            </div>
                            <p class="mb-0 text-muted">"Laravel Workshop" was added</p>
                        </div>
                        <div class="timeline-item">
                            <div class="d-flex justify-content-between">
                                <strong>Profile updated</strong>
                                <small class="text-muted">1 day ago</small>
                            </div>
                            <p class="mb-0 text-muted">User Jane Smith updated profile</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
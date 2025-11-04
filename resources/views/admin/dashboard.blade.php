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
                <h2 class="stat-number">{{ \App\Models\User::count() }}</h2>
                <p class="stat-label">Total Users</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <i class="fas fa-user-shield fa-2x mb-3"></i>
                <h2 class="stat-number">{{ \App\Models\User::where('is_admin', true)->count() }}</h2>
                <p class="stat-label">Admin Users</p>
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
                <i class="fas fa-chart-line fa-2x mb-3"></i>
                <h2 class="stat-number">{{ \App\Models\Aktivitas::where('status', true)->count() }}</h2>
                <p class="stat-label">Active Activities</p>
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
                            <a href="{{ route('admin.users.index') }}" class="btn quick-action-btn w-100">
                                <i class="fas fa-users quick-action-icon text-success"></i>
                                <span class="fw-bold">User Management</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('profile') }}" class="btn quick-action-btn w-100">
                                <i class="fas fa-cog quick-action-icon text-warning"></i>
                                <span class="fw-bold">Settings</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('contact.index') }}" class="btn quick-action-btn w-100">
                                <i class="fas fa-envelope quick-action-icon text-info"></i>
                                <span class="fw-bold">Messages</span>
                            </a>
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
                        @php
                            $recentUsers = \App\Models\User::latest()->take(3)->get();
                            $recentActivities = \App\Models\Aktivitas::latest()->take(3)->get();
                        @endphp
                        
                        @foreach($recentUsers as $user)
                        <div class="timeline-item">
                            <div class="d-flex justify-content-between">
                                <strong>New user registered</strong>
                                <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-0 text-muted">{{ $user->name }} joined the platform</p>
                        </div>
                        @endforeach
                        
                        @foreach($recentActivities as $activity)
                        <div class="timeline-item">
                            <div class="d-flex justify-content-between">
                                <strong>Activity created</strong>
                                <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-0 text-muted">"{{ $activity->nama_aktivitas }}" was added</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Users & Activities Tables -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card admin-card h-100">
                <div class="card-header admin-header">
                    <h5 class="mb-0"><i class="fas fa-users me-2"></i>Recent Users</h5>
                </div>
                <div class="card-body">
                    @if($recentUsers->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentUsers as $user)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">{{ $user->name }}</h6>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                                <span class="badge {{ $user->is_admin ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center mb-0">No users found.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card admin-card h-100">
                <div class="card-header admin-header">
                    <h5 class="mb-0"><i class="fas fa-briefcase me-2"></i>Recent Activities</h5>
                </div>
                <div class="card-body">
                    @if($recentActivities->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentActivities as $activity)
                            <div class="list-group-item">
                                <h6 class="mb-1">{{ $activity->nama_aktivitas }}</h6>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($activity->tanggal)->format('M d, Y') }} • 
                                    <span class="badge {{ $activity->status ? 'bg-success' : 'bg-warning' }}">
                                        {{ $activity->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </small>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center mb-0">No activities found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.stat-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem 1rem;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 0;
}

.admin-card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.admin-header {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    border-radius: 10px 10px 0 0 !important;
    border: none;
    padding: 1rem 1.5rem;
}

.quick-action-btn {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 1.5rem 0.5rem;
    transition: all 0.3s ease;
    height: 100%;
}

.quick-action-btn:hover {
    background: white;
    border-color: #007bff;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.quick-action-icon {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    display: block;
}

.recent-activity {
    max-height: 300px;
    overflow-y: auto;
}

.timeline-item {
    padding: 1rem 0;
    border-bottom: 1px solid #e9ecef;
}

.timeline-item:last-child {
    border-bottom: none;
}

.list-group-item {
    border: none;
    padding: 0.75rem 0;
}

.list-group-item:first-child {
    padding-top: 0;
}

.list-group-item:last-child {
    padding-bottom: 0;
}
</style>
@endsection
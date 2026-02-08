<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h3 class="card-title">Welcome, {{ Auth::user()->name }}!</h3>
                    <p class="card-text text-muted">You are successfully logged into your dashboard.</p>
                </div>
            </div>

            <!-- User Information Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">User Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Username:</strong>
                            <p class="mb-0">{{ Auth::user()->username }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Full Name:</strong>
                            <p class="mb-0">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Email:</strong>
                            <p class="mb-0">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Account Status:</strong>
                            <p class="mb-0">
                                @if(Auth::user()->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Last Login:</strong>
                            <p class="mb-0">
                                @if(Auth::user()->last_login)
                                    {{ Auth::user()->last_login->format('F d, Y h:i A') }}
                                @else
                                    <span class="text-muted">Never</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Member Since:</strong>
                            <p class="mb-0">{{ Auth::user()->created_at->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

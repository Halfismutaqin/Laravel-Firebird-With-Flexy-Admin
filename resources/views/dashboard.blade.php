@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <h1 class="mb-4">Welcome to Nice Admin Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">Manage all your application users here.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reports</h5>
                    <p class="card-text">View and manage your business reports.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Settings</h5>
                    <p class="card-text">Adjust application settings as needed.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    </div>
@endsection

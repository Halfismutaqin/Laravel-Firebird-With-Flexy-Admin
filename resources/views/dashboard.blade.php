@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <h1 class="my-2 text-lg">Welcome to Flexy Admin Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>

             <!-- Button to trigger toast -->
            <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>
            <!-- Toast container -->
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img class="rounded me-2" alt="...">
                        <strong class="me-auto">Bootstrap</strong>
                        <small>Just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Hello, world! This is a toast message.
                    </div>
                </div>
            </div>
            
            <span class="badge text-bg-primary">Primary</span>
            <span class="badge rounded-pill text-bg-success">Success</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-primary">
                New to or unfamiliar with flexbox? Read this CSS Tricks flexbox guide for background, terminology,
                guidelines, and code snippets.
            </div>
            <div class="callout callout-secondary">
                New to or unfamiliar with flexbox? Read this CSS Tricks flexbox guide for background, terminology,
                guidelines, and code snippets.
            </div>
            <div class="callout callout-success">
                New to or unfamiliar with flexbox? Read this CSS Tricks flexbox guide for background, terminology,
                guidelines, and code snippets.
            </div>
            <div class="callout callout-danger">
                New to or unfamiliar with flexbox? Read this CSS Tricks flexbox guide for background, terminology,
                guidelines, and code snippets.
            </div>
            <div class="callout callout-warning">
                New to or unfamiliar with flexbox? Read this CSS Tricks flexbox guide for background, terminology,
                guidelines, and code snippets.
            </div>
            <div class="callout callout-info">
                New to or unfamiliar with flexbox? Read this CSS Tricks flexbox guide for background, terminology,
                guidelines, and code snippets.
            </div>
            <div class="callout callout-light">
                New to or unfamiliar with flexbox? Read this CSS Tricks flexbox guide for background, terminology,
                guidelines, and code snippets.
            </div>
            <div class="callout callout-dark">
                New to or unfamiliar with flexbox? Read this CSS Tricks flexbox guide for background, terminology,
                guidelines, and code snippets.
            </div>
        </div>
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

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastTrigger = document.getElementById('liveToastBtn');
            const toastLiveExample = document.getElementById('liveToast');

            if (toastTrigger) {
                toastTrigger.addEventListener('click', function () {
                    const toast = new bootstrap.Toast(toastLiveExample);
                    toast.show();
                });
            }
        });
    </script>
@endsection

@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/ManageAccess">Manage Access</a></li>
<li class="breadcrumb-item active" aria-current="page"></li>
@endsection

@section('content')
    <div class="row">
        <div class="card p-0 b-1 shadow-sm border-light">
            <div class="card-header bg-light-info border-secondary px-3 pt-3 pb-2">
                <h4 class="card-title m-auto px-2 pb-1"><strong>Manage Access</strong></h4>
            </div>
            <div class="card-body py-3 px-3 min-vh-50">
                <!-- Tampilkan Pesan: -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row mx-2 px-2 d-flex">
                    <div class="col-md-3 col-sm-12 p-2">
                        <div class="card rounded border-primary shadow-sm h-100">
                            <div class="card-body bg-gradient text-center p-4 d-flex flex-column">
                                <i class="fas fa-users-cog fa-3x text-primary primary-gradient mb-3"></i>
                                <h5 class="text-dark mb-3">Manage User Access</h5>
                                <a href="{{ route('manageAccess.userRole.list') }}"
                                    class="btn btn-primary primary-gradient width-min-120 w-100 rounded-pill px-4 py-2 mt-auto">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 p-2">
                        <div class="card rounded border-primary shadow-sm h-100">
                            <div class="card-body bg-gradient text-center p-4 d-flex flex-column">
                                <i class="fas fa-user-tag fa-3x text-primary primary-gradient mb-3"></i>
                                <h5 class="text-dark mb-3">Manage Role Access</h5>
                                <a href="{{ route('manageAccess.configRole.list') }}" 
                                    class="btn btn-primary primary-gradient width-min-120 w-100 rounded-pill px-4 py-2 mt-auto">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-12 p-2">
                        <div class="card rounded border-primary shadow-sm h-100">
                            <div class="card-body bg-gradient text-center p-4 d-flex flex-column">
                                <i class="fas fa-bars fa-3x text-primary primary-gradient mb-3"></i>
                                <h5 class="text-dark mb-3">Manage Menu</h5>
                                <a href="{{ route('manageAccess.configMenu.list') }}" 
                                    class="btn btn-primary primary-gradient width-min-120 w-100 rounded-pill px-4 py-2 mt-auto">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-12 p-2">
                        <div class="card rounded border-primary shadow-sm h-100">
                            <div class="card-body bg-gradient text-center p-4 d-flex flex-column">
                                <i class="fas fa-pager fa-3x text-primary primary-gradient mb-3"></i>
                                <h5 class="text-dark mb-3">Manage Page</h5>
                                <a href="#" class="btn btn-primary primary-gradient width-min-120 w-100 rounded-pill px-4 py-2 mt-auto">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Pastikan DOM telah dimuat sebelum menginisialisasi DataTable
        document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#myTable');
        });
    </script>
@endsection
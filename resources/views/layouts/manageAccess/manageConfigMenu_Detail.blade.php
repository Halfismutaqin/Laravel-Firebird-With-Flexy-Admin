@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/ManageAccess">Manage Access</a></li>
    <li class="breadcrumb-item"><a href="/ManageAccess/RoleList">Config Role</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection

@section('content')
    <div class="row">
        <div class="card p-0 b-1 shadow-sm border-light">
            <div class="card-header bg-light-info border-secondary px-3 pt-3 pb-2">
                <h4 class="card-title m-auto px-2 pb-1"><strong>Add Role</strong></h4>
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

                <div class="row px-2 d-flex justify-content-end">
                    <div class="col-lg-2 col-md-3 col-sm-6 text-end">
                        <a href="{{ route('manageAccess.configRole.list') }}" class="btn btn-primary width-min-120">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="row px-2">
                    <div class="col-lg-8 col-sm-12">
                        <form action="{{ route('manageAccess.configRole.save') }}" method="post">
                            @csrf
                        
                            <input type="hidden" class="form-control" name="roleID" value="{{ e($data['roleDetail']['ROLE_ID'] ?? '') }}" readonly>
                            <div class="mb-3">
                                <label for="roleType" class="form-label">Role Type</label>
                                <select class="form-select" id="roleType" name="roleType" required>
                                    <option value="" disabled selected>Select Type For</option>
                                    <option value="EAS" {{ e($data['roleDetail']['ROLE_TYPE']) == 'EAS' ? 'selected' : '' }}>EAS ONLY</option>
                                    <option value="WEB" {{ e($data['roleDetail']['ROLE_TYPE']) == 'WEB' ? 'selected' : '' }}>WEB ONLY</option>
                                    <option value="MOBILE" {{ e($data['roleDetail']['ROLE_TYPE']) == 'MOBILE' ? 'selected' : '' }}>MOBILE ONLY</option>
                                    <option value="SYSTEM" {{ e($data['roleDetail']['ROLE_TYPE']) == 'SYSTEM' ? 'selected' : '' }}>ALL SYSTEM</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="roleCategory" class="form-label">Role Category</label>
                                <input type="text" class="form-control text-uppercase" id="roleCategory" name="roleCategory" value="{{ e($data['roleDetail']['ROLE_CATEGORY'] ?? '') }}" 
                                placeholder="ex: Human Resource, Purchasing, Sales, Marketing, PPIC, Production,..." required>
                            </div>

                            <div class="mb-3">
                                <label for="roleName" class="form-label">Role Name</label>
                                <input type="text" class="form-control text-uppercase" id="roleName" name="roleName" value="{{ e($data['roleDetail']['ROLE_CATEGORY'] ?? '') }}" readonly required>
                            </div>

                            <div class="mb-3">
                                <label for="roleDesc" class="form-label">Role Description</label>
                                <textarea class="form-control" name="roleDesc" id="roleDesc" rows="3">{{ e($data['roleDetail']['ROLE_DESC'] ?? '') }}</textarea>
                            </div>
                        
                            <div class="mb-3">
                                <label for="roleStatus" class="form-label">Role Status</label>
                                <select class="form-select" id="roleStatus" name="roleStatus" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="A" {{ e($data['roleDetail']['ROLE_STATUS']) == 'A' ? 'selected' : '' }}>Active</option>
                                    <option value="N" {{ e($data['roleDetail']['ROLE_STATUS']) == 'N' ? 'selected' : '' }}>Non Active</option>
                                </select>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary width-min-120">
                                    <i class="fas fa-save"></i> Submit
                                </button>
                            </div>
                            <br>
                        </form>
                    </div>
                    <div class="col-lg-4 col-sm-12 d-none d-md-block">
                        <div class="text-center mt-2">
                            <img src="{{ asset('assets/images/form/addUser.png') }}" alt="flexy-img" class="img-fluid rounded" width="90%">
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

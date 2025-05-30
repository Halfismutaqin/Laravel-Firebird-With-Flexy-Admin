@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/ManageAccess">Manage Access</a></li>
    <li class="breadcrumb-item"><a href="/ManageAccess/UserList">User Role</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection

@section('content')
    <div class="row">
        <div class="card p-0 b-1 shadow-sm border-light">
            <div class="card-header bg-light-info border-secondary px-3 pt-3 pb-2">
                <h4 class="card-title m-auto px-2 pb-1"><strong>Add User</strong></h4>
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
                        <a href="{{ route('manageAccess.userRole.list') }}" class="btn btn-primary width-min-120">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="row px-2">
                    <div class="col-lg-8 col-sm-12">
                        <form action="{{ route('manageAccess.userRole.save') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="user_id" class="form-label">User ID</label>
                                <select class="form-select select2" id="user_id" name="user_id" placeholder="Select User" required>
                                    <option value="" disabled {{ old('user_id') ? '' : 'selected' }}>Select User ID</option>
                                    @foreach($data['empList'] as $employee)
                                        <option value="{{ $employee->EMP_NIK }}" {{ old('user_id') == $employee->EMP_NIK ? 'selected' : '' }}>
                                            {{ $employee->EMP_NIK }} - {{ $employee->EMP_NAME }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>
                        
                            <div class="mb-3">
                                <label for="role_access" class="form-label">Role Access</label>
                                <select class="form-select select2" id="role_access" name="role_access" placeholder="Select Role" required>
                                    <option value="" {{ old('role_access') ? '' : 'selected' }} disabled>Select Role</option>
                                    @foreach($data['roleList'] as $role)
                                        <option value="{{ $role->ROLE_ID }}" {{ old('role_access') == $role->ROLE_ID ? 'selected' : '' }}>
                                            {{ $role->ROLE_CATEGORY }} - {{ $role->ROLE_NAME }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="A" {{ old('status') == 'A' ? 'selected' : '' }}>Active</option>
                                    <option value="N" {{ old('status') == 'N' ? 'selected' : '' }}>Non Active</option>
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

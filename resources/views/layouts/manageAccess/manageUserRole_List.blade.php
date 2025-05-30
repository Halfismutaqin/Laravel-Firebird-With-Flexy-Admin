@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/ManageAccess">Manage Access</a></li>
    <li class="breadcrumb-item"><a href="/ManageAccess/UserList">User Role</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
@endsection

@section('content')
    <div class="row">
        <div class="card p-0 b-1 shadow-sm border-light">
            <div class="card-header bg-light-info border-secondary px-3 pt-3 pb-2">
                <h4 class="card-title m-auto px-2 pb-1"><strong>User Role Access List</strong></h4>
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
                
                <div class="row px-2 d-flex justify-content-start">
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <a href="{{ route('manageAccess.userRole.add') }}" class="btn btn-primary width-min-120">
                            <i class="fas fa-plus"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="row px-2">
                    <div class="col-12">
                        <div class="overflow-auto">
                            <table class="table table-responsive table-bordered table-hover table-striped w-100 text-sm" id="myTable">
                                <thead class="bg-light">
                                    <tr class="table-light">
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle width-min-120">User ID</th>
                                        <th class="text-center align-middle">Role Type</th>
                                        <th class="text-center align-middle">Role Category</th>
                                        <th class="text-center align-middle width-min-180">Role Name</th>
                                        <th class="text-center align-middle">Last Updated</th>
                                        <th class="text-center align-middle">Updated By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center align-middle">{{ $i++ }}</td>
                                            <td class="text-left align-middle">{{ $item->USER_ID }}</td>
                                            <td class="text-left align-middle">{{ $item->getUserRole->ROLE_TYPE ?? 'N/A' }}</td>
                                            <td class="text-left align-middle">{{ $item->getUserRole->ROLE_CATEGORY ?? 'N/A' }}</td>
                                            <td class="text-left align-middle">{{ $item->getUserRole->ROLE_NAME ?? 'N/A' }}</td>
                                            <td class="text-center align-middle">
                                                {{ $item->LAST_UPDATED_DT ? \Carbon\Carbon::parse($item->LAST_UPDATED_DT)->format('Y-m-d H:i:s') : 'N/A' }}
                                            </td>
                                            <td class="text-center align-middle">{{ $item->LAST_UPDATED_BY ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" hidden>
                    <div class="bg-light-info"><br></div>
                    <div class="bg-info"><br></div>
                    <div class="bg-light-primary"><br></div>
                    <div class="bg-primary"><br></div>
                    <div class="bg-light-secondary"><br></div>
                    <div class="bg-secondary"><br></div>
                    <div class="bg-light-warning"><br></div>
                    <div class="bg-warning"><br></div>
                    <div class="bg-light-success"><br></div>
                    <div class="bg-success"><br></div>
                    <div class="bg-light-danger"><br></div>
                    <div class="bg-danger"><br></div>
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

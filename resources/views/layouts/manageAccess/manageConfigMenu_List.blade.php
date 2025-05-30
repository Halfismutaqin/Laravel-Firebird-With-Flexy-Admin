@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/ManageAccess">Manage Access</a></li>
    <li class="breadcrumb-item"><a href="/ManageAccess/MenuList">Config Menu</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
@endsection

@section('content')
    <div class="row">
        <div class="card p-0 b-1 shadow-sm border-light">
            <div class="card-header bg-light-info border-secondary px-3 pt-3 pb-2">
                <h4 class="card-title m-auto px-2 pb-1"><strong>Manage Config Main Menu List</strong></h4>
            </div>
            <div class="card-body py-3 px-3 min-vh-50">
                <div class="row px-2 d-flex justify-content-start">
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <a href="{{ route('manageAccess.configMenu.add') }}" class="btn btn-primary width-min-120">
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
                                        <th class="text-center align-middle">Menu Type</th>
                                        <th class="text-center align-middle">Menu Name</th>
                                        <th class="text-center align-middle width-min-180">Menu Desc</th>
                                        <th class="text-center align-middle width-min-120">Menu Status</th>
                                        <th class="text-center align-middle">Last Updated</th>
                                        <th class="text-center align-middle">Updated By</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center align-middle">{{ $i++ }}</td>
                                            <td class="text-left align-middle">{{ $item['MENU_TYPE'] ?? 'N/A' }}</td>
                                            <td class="text-left align-middle">{{ $item['MENU_NAME'] ?? 'N/A' }}</td>
                                            <td class="text-left align-middle">{{ $item['MENU_DESC'] ?? 'N/A' }}</td>
                                            <td class="text-center align-middle">
                                                {!! $item['MENU_STATUS'] === 'A' ? '<span class="mb-1 badge bg-success rounded-pill text-sm">ACTIVE</span>' 
                                                : ($item['MENU_STATUS'] === 'N' ? '<span class="mb-1 badge bg-danger rounded-pill text-sm">NON ACTIVE</span>' 
                                                : '<span class="mb-1 badge bg-light rounded-pill text-dark text-sm">N/A</span>') !!}
                                            </td>
                                            <td class="text-center align-middle">
                                                {{ $item['LAST_UPDATED_DT'] ? \Carbon\Carbon::parse($item['LAST_UPDATED_DT'])->format('Y-m-d H:i:s') : 'N/A' }}
                                            </td>   
                                            <td class="text-center align-middle">{{ $item['LAST_UPDATED_BY'] ?? 'N/A' }}</td>
                                            <td class="text-center align-middle">
                                                <a href="{{ route('manageAccess.configMenuSub.list', ['id' => $item['MENU_ID']]) }}" 
                                                    class="btn btn-primary width-min-120"><i class="fas fa-ellipsis-v"></i> Detail
                                                </a>                                            
                                            </td>
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

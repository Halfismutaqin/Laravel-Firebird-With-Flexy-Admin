@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-header py-3">
            <div class="card-title m-auto">
                <strong>Daftar Users</strong>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="overflow-auto">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th>USER ID</th>
                                <th>MANAGE USER</th>
                                <th>MANAGE ITEMS</th>
                                <th>MANAGE ITEMS REPORT</th>
                                <th>MANAGE ITEMS IMPORT</th>
                                <th>MANAGE LOCATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user->USER_ID }}</td>
                                    <td>{{ $user->MNG_USR }}</td>
                                    <td>{{ $user->MNG_ITEMS }}</td>
                                    <td>{{ $user->MNG_ITEMS_RPT }}</td>
                                    <td>{{ $user->MNG_ITEMS_IMPORT }}</td>
                                    <td>{{ $user->MNG_LOCN }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

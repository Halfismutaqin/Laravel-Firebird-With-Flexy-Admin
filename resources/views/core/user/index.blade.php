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
                    <table id="myTable" class="table table-bordered text-sm w-100">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">USER ID</th>
                                <th class="text-center align-middle">MANAGE USER</th>
                                <th class="text-center align-middle">MANAGE ITEMS</th>
                                <th class="text-center align-middle">MANAGE ITEMS REPORT</th>
                                <th class="text-center align-middle">MANAGE ITEMS IMPORT</th>
                                <th class="text-center align-middle">MANAGE LOCATION</th>
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

@section('scripts')
<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        responsive: true, // Mengaktifkan tabel responsif
        paging: true,     // Mengaktifkan paginasi
        searching: true,  // Mengaktifkan fitur pencarian
        ordering: false,   // Mengaktifkan fitur pengurutan
    });
});
</script>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>@yield('title', 'Nice Admin Lite Template by WrapPixel')</title>
    <link rel="canonical" href="" />
    <!-- Custom CSS -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}" />

</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="body-wrapper">
            <!-- Navbar -->
            @include('partials.navbar')

            <!-- Sidebar -->
            @include('partials.sidebar')

            <!-- Page Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- Footer -->
                @include('partials.footer')
            </div>
        </div>
    </div>

    <!-- Tambahkan JS Template -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/dashboard.js') }}"></script> --}}
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

    @yield('scripts')
</body>
</html>

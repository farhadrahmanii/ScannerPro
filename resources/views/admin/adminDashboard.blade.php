<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--plugins-->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">


    <!-- Font awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <!-- Font awesome Icons -->

    <!-- Data table -->
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <!--End  Data table -->

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
    <title>Scanners Project</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Add your font style here -->
    </style>
    <!-- CDN Models -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Bahij Helvetica Neue 55 Roman';
            src: url('{{ asset('uploads/font/Neue-Helvetica.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {

            font-family: 'Bahij Helvetica Neue 55 Roman', sans-serif;
        }
    </style>
    <tallstackui:script />
    @livewireStyles
    @vite('resources/css/app.css')

</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('admin.body.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('admin.body.header')
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            @yield('admin')
            @if (request()->is('/'))
                <livewire:home-wedgetslivewire />
            @endif
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!-- Footer -->
        @include('admin.body.footer')
        <!-- End Footer -->
    </div>
    <!--end wrapper-->

    <!-- search modal -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Select 2 link connected using below CDN -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/validate.min.js') }}"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/code.js') }}"></script>

    <!--end switcher-->
    <!-- Bootstrap JS -->
    <!--plugins-->
    <!-- Chart Code is start Here -->
    <script src="{{asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
    <script src="{{ asset('js/chart-renderer.js') }}"></script>
    <script src="{{asset('assets/js/widgets.js')}}"></script>
    <!--app JS-->
    <script>
        new PerfectScrollbar(".app-container")
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>


    <!-- Data Table Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Toaster for Livewire -->
    <x-toaster-hub /> <!-- 👈 -->
    @stack('scripts')
    <!-- Way 1 -->
    <x:pharaonic-select2::scripts />

    <!-- Way 2 : Vendor Publishing REQURIED -->
    <script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
    <!-- Require the Modal Pro component -->

    @livewireScripts
</body>

</html>
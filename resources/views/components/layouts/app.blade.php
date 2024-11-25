<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NBB</title>
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" type="text/css" id="style-stylesheet">
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet">
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">
    <link href="{{asset('backend/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Notification css (Toastr) -->
    <link href="{{asset('backend/assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('backend/assets/libs/custombox/custombox.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-layout="horizontal">

    <!-- Begin page -->
    <div id="wrapper">

        @include('components.layouts.headbar')

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    {{ $slot }}

                </div>
            </div>
            @include('components.layouts.footer')
        </div>
    </div>
    <!-- END wrapper -->

    @livewireScripts
    <!-- Vendor js -->
    <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

    <!-- <script src="{{asset('backend/assets/libs/morris-js/morris.min.js')}}"></script> -->
    <script src="{{asset('backend/assets/libs/raphael/raphael.min.js')}}"></script>

    <!-- <script src="{{asset('backend/assets/js/pages/dashboard.init.js')}}"></script> -->
    <script src="{{asset('backend/assets/libs/select2/select2.min.js')}}"></script>
    <!-- App js -->
    <script src="{{asset('backend/assets/js/app.min.js')}}"></script>
    <!-- Toastr js -->
    <script src="{{asset('backend/assets/libs/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/toastr.init.js')}}"></script>
    <script src="{{asset('backend/assets/js/money.format.js')}}"></script>
    <!-- Modal -->
    <script src="{{asset('backend/assets/libs/custombox/custombox.min.js')}}"></script>

    <script src="{{asset('backend/assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
    <script>
        window.Livewire.on('alert', param => {
            toastr.options.positionClass = 'toast-bottom-right';
            toastr[param['type']](param['message'],param['type']);
        });

        @if(Session::has('success'))
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.success("{{Session::get('success') }}")
        @elseif(Session::has('warning'))
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.warning("{{Session::get('warning')}}")
        @elseif(Session::has('error'))
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.error("{{Session::get('error')}}")
        @endif

    </script>

        @stack('scripts')
    </div>
</body>

</html>
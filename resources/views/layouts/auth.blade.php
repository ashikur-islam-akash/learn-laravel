<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-scompiler-id="0">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SME - Foundation') }}</title>

    <!-- icon -->
    <link rel="icon" type="image/png" href="{{asset('admin/stroyka/images/favicon.ico')}}" />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="{{asset('admin/stroyka/vendor/bootstrap/css/bootstrap.ltr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/stroyka/vendor/highlight.js/styles/github.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/stroyka/vendor/simplebar/simplebar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/stroyka/vendor/quill/quill.snow.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/stroyka/vendor/air-datepicker/css/datepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/stroyka/vendor/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/stroyka/vendor/datatables/css/dataTables.bootstrap5.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/stroyka/vendor/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/stroyka/vendor/fullcalendar/main.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" href="{{asset('admin/stroyka/css/style.css')}}" />
</head>
<body>
<div class="container-fluid min-h-100">
    @yield('content')
</div>
<div class="sa-app__footer d-block d-md-flex">
    <!-- copyright -->
    Copyright — &copy; PKSF, All Right Reserved.
    <div class="m-auto"></div>
    <div class="footer-logo">
        Design & Developed by
        <a  href="https://dream71.com" target="_blank">
            <img src="{{asset('admin/stroyka/images/dream71-logo.png')}}" class="footer-img" alt="">
        </a>
    </div>
    <!-- copyright / end -->
</div>
<!-- scripts -->
<script src="{{asset('admin/stroyka/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/highlight.js/highlight.pack.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/air-datepicker/js/datepicker.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/air-datepicker/js/i18n/datepicker.en.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/fontawesome/js/all.min.js')}}" data-auto-replace-svg="" async=""></script>
<script src="{{asset('admin/stroyka/vendor/chart.js/chart.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/datatables/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('admin/stroyka/js/stroyka.js')}}"></script>
<script src="{{asset('admin/stroyka/js/custom.js')}}"></script>
<script src="{{asset('admin/stroyka/js/calendar.js')}}"></script>
<script src="{{asset('admin/stroyka/js/demo.js')}}"></script>
<script src="{{asset('admin/stroyka/js/demo-chart-js.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function(){
        $("#successMessage").delay(5000).slideUp(300);
    });


    @if(Session::has('success'))
        toastr.options = {
        "closeButton" : true,
        "progressBar" : true,
    }
    toastr.success("{{ Session::get('success') }}");
    @endif

        @if(Session::has('error'))
        toastr.options = {
        "closeButton" : true,
        "progressBar" : true
    }
    toastr.error('{{ Session::get('error') }}');
    @endif
</script>
</body>
</html>


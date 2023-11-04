<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-scompiler-id="0">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="description" content="SME-Foundation">
    <meta name="author" content="Sazzad Bin Ashique">
    <meta name="keyword" content="Loan Monitoring">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel role permision') }}</title>
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
    <link rel="stylesheet" href="{{asset('admin/stroyka/css/custom-color.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/stroyka/css/style.custom.css')}}" />
    @stack('css')

</head>
<body>
<div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">

    @include('partials.sidebar')

    <!-- sa-app__content -->
    <div class="sa-app__content">
        @include('partials.header')
        @yield('content')

        @include('partials.footer')
    </div>
    <div class="sa-app__toasts toast-container bottom-0 end-0"></div>
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
<script src="{{asset('admin/stroyka/vendor/fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/chart.js/chart.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/datatables/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
<script src="{{asset('admin/stroyka/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('admin/stroyka/vendor/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('admin/stroyka/js/stroyka.js')}}"></script>
<script src="{{asset('admin/stroyka/js/custom.js')}}"></script>
<script src="{{asset('admin/stroyka/js/calendar.js')}}"></script>
<script src="{{asset('admin/stroyka/js/demo.js')}}"></script>
<script src="{{asset('admin/stroyka/js/demo-chart-js.js')}}"></script>
<script src="{{asset('admin/js/formValidation.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type='text/javascript'>
   /* //Disable context menu (right-click)
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });

    //Disable view source using Ctrl+U
    document.addEventListener('keydown', function (e) {
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            e.preventDefault();
        }
    });
*/

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

    @if(Session::has('warning'))
        toastr.options = {
        "closeButton" : true,
        "progressBar" : true
    }
    toastr.warning('{{ Session::get('warning') }}');
    @endif

    $(document).ready(function(){
        $("#successMessage").delay(5000).slideUp(300);

        $('[data-toggle="tooltip"]').tooltip();
    });
    // active menu
    $(document).ready(function () {
        $(function($) {
            let url = window.location.href;
            $('.sa-nav__menu-item--has-icon a').each(function() {
                if (this.href === url) {
                    $(this).addClass("sa-nav-link-active");
                }
                if ($(this).hasClass("sa-nav-link-active")) {
                    $(this).parents(".sa-nav__menu-item--has-icon").find(".main-menu").addClass("sa-nav-link-parent-active");
                }
            });

        });
    });

    $(function() {
        $('.mark-as-read-from-header').click(function() {
            $.ajax({
                url: "{{--{{ route('admin.mark-as-read-from-header') }}--}}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', id: $(this).data('id')},
                success: function (response) {
                }
            })
        });
    });

    //


</script>
@yield('profile-js')
@yield('custom-js')
@stack('js')
</body>
</html>


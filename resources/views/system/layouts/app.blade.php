<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/system.css') }}" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/vendor/select2/select2.css') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/global/fonts/mfglabs/mfglabs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/fonts/font-awesome/font-awesome.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <script src="{{ asset('assets/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
        Breakpoints();
    </script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
</head>
<body class="animsition site-navbar-small ">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @include('system.layouts.header')

    <div class="page">
        <div class="page-header">
            @if(isset($config) && $config['title'])
            <h1 class="page-title">{{ $config['title'] }}</h1>
            @endif
            @include('system.layouts.breadcrumb')
        </div>
        @yield('content')
    </div>

    <!-- Core  -->
    <script src="{{ asset('assets/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('assets/global/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/global/vendor/popper-js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/global/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/global/vendor/animsition/animsition.js') }}"></script>
    <script src="{{ asset('assets/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('assets/global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ asset('assets/global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/global/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />
    <script src="{{ asset('assets/global/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/global/vendor/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/global/vendor/select2/select2.full.min.js') }}"></script>

    <script src="{{ asset('assets/global/vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.maskMoney.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('assets/global/js/Component.js') }}"></script>
    <script src="{{ asset('assets/global/js/Plugin.js') }}"></script>
    <script src="{{ asset('assets/global/js/Base.js') }}"></script>
    <script src="{{ asset('assets/global/js/Config.js') }}"></script>

    <script src="{{ asset('assets/js/Section/Menubar.js') }}"></script>
    <script src="{{ asset('assets/js/Section/Sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/Section/PageAside.js') }}"></script>
    <script src="{{ asset('assets/js/Plugin/menu.js') }}"></script>
    <script src="{{ asset('assets/js/Plugin/tabs.js') }}"></script>

    <!-- Page -->
    <script src="{{ asset('assets/js/Site.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/tasks.js') }}"></script>
    <script src="{{ asset('assets/global/js/Plugin/datatables.js') }}"></script>
    <script src="{{ asset('assets/global/js/Plugin/select2.js') }}"></script>

    <script>
        (function(document, window, $){
            'use strict';

            var Site = window.Site;
            $(document).ready(function(){
                Site.run();
            });
        })(document, window, jQuery);
    </script>

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>

</body>
</html>

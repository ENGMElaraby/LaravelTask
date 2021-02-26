<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ assetFile('assets/img/favicon.ico') }}"/>
    <link href="{{ assetFile('assets/css/loader.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ assetFile('assets/js/loader.js') }}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ assetFile('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ assetFile('assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ assetFile('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ assetFile('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ assetFile('plugins/animate/animate.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ assetFile('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ assetFile('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ assetFile('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ assetFile('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@stack('css')
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>
@yield('body')
</html>

@extends('layouts.app')

@section('body')
    <body>
    @include('layouts.parts.loader')

    @include('layouts.parts.navbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

    @include('layouts.parts.sidebar')

    <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <!-- CONTENT AREA -->
            @yield('content')
            <!-- CONTENT AREA -->
            </div>
            @include('layouts.parts.footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ assetFile('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ assetFile('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ assetFile('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ assetFile('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ assetFile('assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>
    <script src="{{ assetFile('assets/js/custom.js') }}"></script>
    <script src="{{ assetFile('plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ assetFile('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ assetFile('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @stack('js')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @stack('script')
    </body>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    @include('layouts.styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('alerts.all')
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            {{-- <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">

                </li>
            </ul> --}}
            <div class="navbar-nav ml-auto">
                <livewire:active-fiscal-year-button />
            </div>
            <!-- Button trigger modal -->

            <!-- Modal -->

        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid py-3">
                    <!-- Main row -->
                    @yield('content')
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="http://mopid.sudurpashchim.gov.np/"> भौतिक पूर्वाधार विकास मन्त्रालय</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                Powered By <a href="https://mohrain.com">Mohrain Websoft P. Ltd.</a>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('layouts.scripts')
</body>

</html>

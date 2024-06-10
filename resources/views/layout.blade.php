<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title>برنامج تذاكر العيادات - دار اليتيم</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Icons -->
    <link href="{{asset('asset/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('asset/dest/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.rtl.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />

    @yield('styles')
</head>
<body class="navbar-fixed sidebar-nav fixed-nav">

    <header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#"></a>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>
            </ul>

        </div>
    </header>
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('doctorView')}}"><i class="icon-pie-chart"></i>واجهة الطبيب</a>
                </li>
                @if (Auth::user()->type == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front_view')}}"><i class="icon-pie-chart"></i>اعداد واجهة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('doctorsTable')}}"><i class="icon-pie-chart"></i>جدول الأطباء</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('clinicsTable')}}"><i class="icon-pie-chart"></i>جدول العيادات</a>
                </li>
                @endif
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">تسجيل الخروج</button>
                    </form>
                </li>


            </ul>
        </nav>
    </div>
    <main class="main">

        <div class="container-fluid">

            <div class="animated fadeIn"> @yield('contant')
            </div>
        </div>
        <!--/.container-fluid-->
    </main>

        {{-- js --}}
            <!-- Bootstrap and necessary plugins -->
        <script src="{{asset('asset/js/libs/jquery.min.js')}}"></script>
        <script src="{{asset('asset/js/libs/tether.min.js')}}"></script>
        <script src="{{asset('asset/js/libs/bootstrap.min.js')}}"></script>
        <script src="{{asset('asset/js/libs/pace.min.js')}}"></script>

        <!-- Plugins and scripts required by all views -->
        <script src="{{asset('asset/js/libs/Chart.min.js')}}"></script>

        <!-- CoreUI main scripts -->

        <script src="{{asset('asset/js/app.js')}}"></script>

        <!-- Plugins and scripts required by this views -->
        <!-- Custom scripts required by this view -->
        <script src="{{asset('asset/js/views/main.js')}}"></script>

        <!-- Grunt watch plugin -->
        <script src="//localhost:35729/livereload.js"></script>
        @yield('scripts')

    </body>
</html>

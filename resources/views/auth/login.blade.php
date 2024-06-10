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
    <title>CoreUI Bootstrap 4 Admin Template</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Icons -->
    <link href="{{asset('asset/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('asset/dest/style.css')}}" rel="stylesheet">
    @yield('styles')
</head>

<body class="">
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-x-auto pull-xs-none vamiddle">
                <div class="card-group ">

                    <div class="card p-a-2">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="card-block">
                            <h1>تسجيل دخول</h1>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <x-text-input id="username" placeholder="اسم المستخدم" class="form-control block mt-1 w-full" type="text" name="username" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="input-group m-b-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <x-text-input id="password" class=" form-control block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" placeholder="كلمة السر" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <button type="submit" class="btn btn-primary p-x-2">
                                        <i class="icon-login"></i>
                                        ارسال</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="card card-inverse card-primary p-y-3" style="width:44%">
                        <div class="card-block text-xs-center">
                            <div>
                                <h2>برنامج تذاكر العيادة</h2>
                                <p>جمعية دار اليتيم الفلسطيني</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- js --}}
    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('asset/js/libs/jquery.min.js')}}"></script>
    <script src="{{asset('asset/js/libs/tether.min.js')}}"></script>
    <script src="{{asset('asset/js/libs/bootstrap.min.js')}}"></script>


    <script>
        function verticalAlignMiddle()
        {
            var bodyHeight = $(window).height();
            var formHeight = $('.vamiddle').height();
            var marginTop = (bodyHeight / 2) - (formHeight / 2);
            if (marginTop > 0)
            {
                $('.vamiddle').css('margin-top', marginTop);
            }
        }
        $(document).ready(function()
        {
            verticalAlignMiddle();
        });
        $(window).bind('resize', verticalAlignMiddle);
    </script>
    <!-- Grunt watch plugin -->
</body>

</html>

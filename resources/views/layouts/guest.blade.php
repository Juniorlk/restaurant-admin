<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>foodapp : Creative Admin Dashboard</title>
        <!-- Standard -->
        <link rel="shortcut icon" href="{{asset('/images/logo3.png')}}" >
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('/images/logo3.png')}}">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('/images/logo3.png')}}">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/images/logo3.png')}}">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/images/logo3.png')}}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{asset('/assets/css/lib/chartist/chartist.min.css')}} " rel="stylesheet">
        <link href="{{asset('/assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/css/lib/themify-icons.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
        <link href="{{asset('/assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
        <link href="{{asset('/assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
        <link href="{{asset('/assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/css/lib/unix.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <style>
            .background-image {
                position: relative;
                height: 100vh;
            }

            .background-image::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url({{asset('images/hotel.jpg')}});
                background-size: cover;
                background-position: center;
                opacity: 0.4; /* Adjust the opacity as needed */
                z-index: -2;
            }
            .background-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #1bac4b73; /* Green color with opacity */
                z-index: -1;
            }
        </style>
    </head>
    <body class="background-image background-overlay">
        <div class="unix-login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="login-content">

                            <div class="login-form" style="border-radius: 10px">
                                <div class="login-logo">
                                    <a href="{{route('dashboard')}}"><img src="{{asset('/images/logoAF.png')}}" alt="logo"></a>
                                </div>
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .background-image {
                position: relative;
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
                background-color: rgba(0, 128, 0, 0.866); /* Green color with opacity */
                z-index: -1;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 background-image">
            <div class="w-full col-4 sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex flex-col sm:justify-center items-center mb-6">
                <a href="/">
                    <img src="{{asset('/images/logoAF.png')}}" alt="foodapp" class="w-30 h-40 fill-current text-gray-500">
                </a>
            </div>


                {{ $slot }}


            </div>
        </div>
    </body>
</html>

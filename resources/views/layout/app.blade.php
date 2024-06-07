<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NOM DU RESTAURANT : Creative Admin Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
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
    <!-- Example for Bootstrap 4 -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}


</head>

<body>
    @include('partials.sidebar')
    @include('partials.navbar')

    @yield('content')
<script src="{{asset('/assets/js/lib/jquery.min.js')}}"></script>
    <!-- jquery vendor -->
    <script src="{{asset('/assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{asset('/assets/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('assets/js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset('/assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/js/phoenix.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('/assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('/assets/js/lib/weather/weather-init.js')}}"></script>
    <script src="{{asset('/assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('/assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{asset('/assets/js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('/assets/js/lib/chartist/chartist-init.js')}}"></script>
    <script src="{{asset('/assets/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('/assets/js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{asset('/assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <script src="{{asset('/assets/js/scripts.js')}}"></script>
    <script>
        (function (global, factory) {
            typeof exports === "object" && typeof module !== "undefined"
                ? (module.exports = factory())
                : typeof define === "function" && define.amd
                ? define(factory)
                : ((global =
                    typeof globalThis !== "undefined" ? globalThis : global || self),
                (global.config = factory()));
            })(this, function () {
            "use strict";

            const initialConfig = {
                phoenixIsNavbarVerticalCollapsed: !1,
                phoenixTheme: "light",
                phoenixNavbarTopStyle: "default",
                phoenixNavbarVerticalStyle: "default",
                phoenixNavbarPosition: "vertical",
                phoenixNavbarTopShape: "default",
                phoenixIsRTL: !1,
                phoenixSupportChat: !0,
                },
                CONFIG = { ...initialConfig },
                setConfig = (e, a = !0) => {
                Object.keys(e).forEach((t) => {
                    (CONFIG[t] = e[t]), a && localStorage.setItem(t, e[t]);
                });
                },
                resetConfig = () => {
                Object.keys(initialConfig).forEach((e) => {
                    (CONFIG[e] = initialConfig[e]),
                    localStorage.setItem(e, initialConfig[e]);
                });
                },
                urlSearchParams = new URLSearchParams(window.location.search),
                params = Object.fromEntries(urlSearchParams.entries());

            var config = { config: CONFIG, reset: resetConfig, set: setConfig };

            return config;
        });
        //# sourceMappingURL=config.js.map

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>

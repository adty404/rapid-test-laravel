<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png" />

    <title> @yield('title') </title>

    {{-- style --}}
    @stack('prepend-style')
    @include('includes.front.style')
    @stack('addon-style')

</head>

<body data-scroll-animation="true">
    <div class="body_wrapper">

        <!--================Preloader Area =================-->
        @include('includes.front.preloader')
        <!--================End Preloader Area =================-->

        <!--================Mobile Canvus Menu Area =================-->
        @include('includes.front.mobile-canvas-menu')
        <!--================End Mobile Canvus Menu Area =================-->

        <!--================Header Area =================-->
        @stack('header')
        <!--================End Header Area =================-->

        {{-- content --}}
        @yield('content')

        <!--================Footer Area =================-->
        @include('includes.front.footer')
        <!--================End Footer Area =================-->
    </div>

    @stack('modal')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @stack('prepend-script')
    @include('includes.front.script')
    @stack('addon-script')
</body>

</html>

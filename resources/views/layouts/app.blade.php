<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('user.templates.layouts.header')


    <title>KDot | Login </title>


</head>
<body  class="front-page transparent-header">

    <div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>

    <div class="page-wrapper">

        @include('user.templates.layouts.customer_nav')

        <div id="app">


            <main class="py-4">
                @yield('content')
            </main>
        </div>

        @include('user.templates.layouts.footer')
    </div>
</body>
</html>

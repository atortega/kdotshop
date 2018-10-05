<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('user.templates.layouts.header')


    <title>KDot | Login </title>


</head>
<body  class="front-page transparent-header">

    <div class="scrollToTop circle"><i class="fa fa-angle-up"></i></div>

    < class="page-wrapper">

        @include('user.templates.layouts.customer_nav')

        <!-- breadcrumb start -->
        <!-- ================ -->
        <div class="breadcrumb-container">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a class="link-dark" href="/">Home</a></li>
                    <li class="breadcrumb-item active">Page Login</li>
                </ol>
            </div>
        </div>
        <!-- breadcrumb end -->
        <div id="app">


            <main class="py-4">
                @yield('content')
            </main>
        </div>

        @include('user.templates.layouts.footer')
    </div>
</body>
</html>

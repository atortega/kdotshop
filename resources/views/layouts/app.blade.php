<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('user.templates.layouts.header')

        @include('user.templates.layouts.customer_nav')

                @yield('content')
            </main>
            <!-- main end -->
        </div>
        <!-- div #app start -->

        @include('user.templates.layouts.footer')
    </div>
    <!-- page-wrapper end -->
</body>

</html>
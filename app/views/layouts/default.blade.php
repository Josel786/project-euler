<!doctype html>
<html class="no-js" lang="">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        <div class="site-container row">
            <div class="sidebar-container">
                @include('layouts.partials.sidebar')
            </div>

            <div class="content-container">
                @yield('content')
            </div>
        </div>

        @include('layouts.partials.footer')
    </body>
</html>

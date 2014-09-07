<!doctype html>
<html class="no-js" lang="">
    <head>
        @include('layouts.partials.head')
    </head>
    <body class="@yield('page-class')">
        <div class="site-container row">
            <div class="header">
                <h1>Project Euler PHP Solutions</h1>

                <div class="button-group">
                    <a href="{{ URL::route('problems.create') }}" class="btn">Add</a>
                    <a href="@yield('edit-url')" class="btn">Edit</a>
                </div>
            </div>

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

<!doctype html>
<html lang="en" class="bg-theme vh-100">
    <head>
        @include('template.head')
    </head>
    <body class="bg-theme vh-100">
        @include('template.owner-navbar')
        @yield('main-content')
        @include('template.script')
        @yield('add-script')
    </body>
</html>
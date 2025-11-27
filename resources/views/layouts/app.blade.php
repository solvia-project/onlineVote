<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>

    <link rel="icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="/fonts/Montserrat.css" rel="stylesheet">
    <link href="/fonts/Roboto.css" rel="stylesheet">
    <link href="/fonts/Rubik.css" rel="stylesheet">

    <!-- Icons & CSS -->
    <link rel="stylesheet" href="/css/fontawesome.css">
    <link rel="stylesheet" href="/css/icofont.css">
    <link rel="stylesheet" href="/css/themify.css">
    <link rel="stylesheet" href="/css/flag-icon.css">
    <link rel="stylesheet" href="/css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="/css/datatables.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Main Style -->
    <link rel="stylesheet" href="/css/style.css">
    <link id="color" rel="stylesheet" href="/css/color-1.css">
    <link rel="stylesheet" href="/css/responsive.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <nav>
        @include('layouts.navbar')
    </nav>

    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        @include('layouts.footer')
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/icons/feather-icon/feather.min.js"></script>
    <script src="/js/icons/feather-icon/feather-icon.js"></script>
    <script src="/js/sidebar-menu.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/bootstrap/popper.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="/js/datatable/datatables/datatable.custom.js"></script>
    <script src="/js/tooltip-init.js"></script>

    @stack('scripts')
</body>
</html>

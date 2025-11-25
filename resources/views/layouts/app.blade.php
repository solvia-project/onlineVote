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
<script src="https://laravel.pixelstrap.com/viho/assets/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="https://laravel.pixelstrap.com/viho/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="https://laravel.pixelstrap.com/viho/assets/js/sidebar-menu.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/config.js"></script>
<!-- Bootstrap js-->
<script src="https://laravel.pixelstrap.com/viho/assets/js/bootstrap/popper.min.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
      <script src="https://laravel.pixelstrap.com/viho/assets/js/chart/chartist/chartist.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/chart/knob/knob.min.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/chart/knob/knob-chart.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/chart/apex-chart/apex-chart.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/chart/apex-chart/stock-prices.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/prism/prism.min.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/clipboard/clipboard.min.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/counter/jquery.waypoints.min.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/counter/jquery.counterup.min.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/counter/counter-custom.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/custom-card/custom-card.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/notify/bootstrap-notify.min.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/dashboard/default.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/notify/index.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/datepicker/date-picker/datepicker.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/datepicker/date-picker/datepicker.en.js"></script>
      <script src="https://laravel.pixelstrap.com/viho/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="https://laravel.pixelstrap.com/viho/assets/js/script.js"></script>
<script src="https://laravel.pixelstrap.com/viho/assets/js/theme-customizer/customizer.js"></script>
    @stack('scripts')
</body>
</html>

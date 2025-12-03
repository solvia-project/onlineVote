<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            Pollaris
        </a>

        <!-- Voters Dashboard -->
        <a class="btn btn-success ms-3" href="{{ url('/voters-dashboard') }}">
            Voters Dashboard
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side -->
            <ul class="navbar-nav me-auto">
                @stack('nav-left')
            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav ms-auto align-items-center">

                @guest
                    <li class="nav-item me-2">
                        <a class="btn btn-dark" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif

                @else
                    <!-- Username -->
                    <li class="nav-item me-2">
                        <span class="fw-semibold">{{ Auth::user()->name }}</span>
                    </li>

                    <!-- Logout Button -->
                    <li class="nav-item">
                        <a class="btn btn-outline-danger"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i data-feather="log-out"></i> Logout
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest

            </ul>
        </div>
    </div>
</nav>

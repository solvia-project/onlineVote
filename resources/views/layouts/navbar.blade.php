<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            Pollaris
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side -->
            <ul class="navbar-nav me-auto">
                @stack('nav-left')
            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav ms-auto">
                @guest
                <li class="nav-item me-2">
                    <a class="btn btn-dark" href="{{ route('login') }}"><i data-feather="log-in"></i> Login</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @else
                <li class="nav-item me-2">
                    <a class="btn btn-primary-light" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-feather="log-out"></i> Logout
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @stack('account-links')
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

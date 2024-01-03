<!DOCTYPE html>
<html lang="en">
<head>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/default.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}"/>

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>@yield('title')</title>
</head>
<body>
<nav class="sidebar">
    <header>
        <div>
            <span class="name">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</span>
            <span class="profession">{{ Auth::user()->type }}</span>
        </div>
    </header>

    <div class="menu">
        <ul class="menu-links">
            @yield('nav')
        </ul>
    </div>

    <div class="menu-bar">
        <li class="">
            <a href="{{ route('logout') }}" title="Déconnexion">
                <i class='bx bx-log-out icon'></i>
                <span class="text nav-text">Déconnexion</span>
            </a>
        </li>
    </div>
</nav>


<section class="home">
    @yield('content')
</section>

@yield('imports')
</body>
</html>

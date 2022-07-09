<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(View::hasSection('title'))
            @yield('title')
        @else
            {{ config('app.name', 'Laravel') }}
        @endif
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#d5d45b">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<div id="app" class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/img/logo.png" alt="" title="{{ config('app.name', 'Laravel') }}" class="logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        <li class="navbar-item me-3">
                            <div class="dropdown">
                                <button class="btn navbar-notification" type="button" id="notifications" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if(count(\App\Models\Notification::where([['user_id', '=', Auth()->user()->id], ['checked', '=', 'false']])->get()) > 0)
                                        <div class="navbar-notification--redicon"></div>
                                    @endif
                                    <img src="/img/svg/notification.svg" alt="" class="navbar-notification--img" title="Повідомлення">
                                </button>

                                <div class="dropdown-menu p-4 notifications pb-0">
                                    @foreach(\App\Models\Notification::where('user_id', Auth()->user()->id)->latest()->take(2)->get() as $notification)
                                        <div class="notifications-item {{ $notification->checked ? 'text-muted' : '' }}">
                                            <a class="notifications-item-title link-unstyled py-2" href="/notifications">
                                                <span>
                                                    {{ $notification->title }}
                                                </span>
                                                <img src="/img/svg/right-arrow.svg" alt="" class="notifications-item-title--arrow">
                                            </a>
                                            <p class="notifications-item--text">
                                                {{ $notification->text }}
                                            </p>
                                        </div>
                                    @endforeach

                                    <a href="/notifications" class="btn w-100 py-3">Всі сповіщення</a>
                                </div>
                            </div>
                        </li>
                    @endauth

                    <li class="navbar-item me-3">
                        <a href="/join" class="text-decoration-none">
                            <button class="nav-link btn btn-light btn-gradient">Зареєструвати своє помешкання</button>
                        </a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item me-3">
                                <a class="nav-link btn text-black" href="{{ route('login') }}">Увійти</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn text-black" href="{{ route('register') }}">Зареєструватися</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img
                                    src="{{ Auth::user()->profile->getAvatar() }}"
                                    alt=""
                                    class="avatar">

                                {{ Auth::user()->profile->name ?? 'Ваш профіль' }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile/settings">
                                    Налаштування
                                </a>

                                <a class="dropdown-item" href="/profile/bookings">
                                    Бронювання
                                </a>

                                <a class="dropdown-item" href="/profile/reviews">
                                    Ваші відгуки
                                </a>

                                <a class="dropdown-item" href="/profile/saved">
                                    Збережене
                                </a>

                                <a class="dropdown-item" href="/profile/apartments">
                                    Ваші помешкання
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Вийти
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
    <main
        @if(Request::path() !== '/' and Request::path() !== 'join')
            class="py-4"
        @endif
    >
        @yield('content')
    </main>

    <footer class="footer mt-auto">
        <div class="footer-bg"></div>

        <div class="footer--copyright py-3">
            Авторські права © 2022 Point.com. Усі права захищено.
        </div>
    </footer>
</div>
</body>
</html>

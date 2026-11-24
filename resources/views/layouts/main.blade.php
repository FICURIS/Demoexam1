<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header-title')</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a href="/" class="logo">
                <img src="{{ asset('images/logo.jpg') }} " alt="Конференции.РФ" class="site-logo">
                <span class="site-name">Конференции.РФ</span>
            </a>
            <nav class="main-nav">
                @auth
                <a href="{{ route('catalog.index') }}">Главная</a> 
                <a href="{{ route('applications.index') }}">Мои заявки</a>
                <a href="{{ route('applications.create') }}">Новая заявка</a>
                @if(Auth::user()->role_id ==2)
                <a href="{{ route('admin.applications') }}">Панель администратора</a>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="link-btn">Выйти</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('register') }}">Регистрация</a>
                <a href="{{ route('login') }}">Войти</a>
            @endguest
            </nav>
        </div>

    </header>
    <main class="container">
    @yield('content')
    </main>
</body>
</html>
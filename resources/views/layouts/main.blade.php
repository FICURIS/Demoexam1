<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header-title')</title>
</head>
<body>
    <header>
        <a href="/" class="logo">Конференции.РФ</a>  
        <nav>
            @auth 
            <a href="{{ route('applications.index') }}">Мои заявки</a>
            <a href="{{ route('applications.create') }}">Новая заявка</a>
            @if(Auth::user()->role_id ==2)
            <a href="{{ route('admin.applications') }}">Адмника</a>
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

    </header>
    <main class="container">
    @yield('content')
    </main>
</body>
</html>
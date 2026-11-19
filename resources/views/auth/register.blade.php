@extends('layouts.main')

@section('header-title')
Регистрация - Конференции.РФ
@endsection

@section('content')
@if($errors->any())
    <div class="block-errors">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="main-container">
    <div class="main-block">
        <h1>Регистрация</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label for="login">Логин</label>
            <input type="text" placeholder="Введите логин" name="login" id="login" required minlength="6" value="{{ old('login') }}">

            <label for="password">Пароль</label>
            <input type="password" placeholder="Введите пароль" name="password" id="password" required minlength="8">

            <label for="name">Фамилия</label>
            <input type="text" placeholder="Введите фамилию" name="surname" id="surname" required value="{{ old('surname') }}">

            <label for="name">Имя</label>
            <input type="text" placeholder="Введите имя" name="name" id="name" required value="{{ old('name') }}">

            <label for="name">Отчество</label>
            <input type="text" placeholder="Введите отчество" name="middlename" id="middlename" required value="{{ old('middlename') }}">

            <label for="phone">Телефон</label>
            <input type="tel" placeholder="8(XXX)XXX-XX-XX" name="phone" id="phone" required value="{{ old('phone') }}">

            <label for="email">Email</label>
            <input type="email" placeholder="your.mail@mail.ru" name="email" id="email" required value="{{ old('email') }}">

            <button type="submit">Создать пользователя</button>

            <a href="{{ route('login') }}">Уже есть аккаунт? Войти</a>
        </form>
    </div>
</div>
@endsection
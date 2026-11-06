@extends('layouts.main')

@section('header-title')
Регистрация - Конференции.РФ
@endsection

@section('content')
<div class="main-container">
    <div class="main-block">
        <h1>Регистрация</h1>
        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <label for="login">Логин</label>
            <input type="text" placeholder="Введите логин" name="login" id="login" required minlength="6" value="{{ old('login') }}">

            <label for="password">Пароль</label>
            <input type="password" placeholder="Введите пароль" name="password" id="password" required minlength="8" value="{{ old('password') }}">

            <label for="name">ФИО</label>
            <input type="text" placeholder="Иванов Иван Иванович" name="name" id="name" required value="{{ old('name') }}">

            <label for="phone">Телефон</label>
            <input type="tel" placeholder="8(XXX)XXX-XX-XX" name="phone" id="phone" required value="{{ old('name') }}">

            <label for="email">Email</label>
            <input type="email" placeholder="your.mail@mail.ru" name="email" id="email" required value="{{ old('email') }}">

            <button type="submit">Создать пользователя</button>

            <a href="authorization.html">Уже есть аккаунт? Войти</a>
        </form>
    </div>
</div>
@endsection
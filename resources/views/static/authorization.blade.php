@extends('layouts.main')

@section('header-title')
Авторизация - Конференции.РФ
@endsection

@section('content')
<div class="main-container">
    <div class="main-block">
        <h1>Авторизация</h1>
        <form>
            <label for="login">Логин</label>
            <input type="text" placeholder="Введите логин" name="login" id="login" required minlength="6">
            <label for="password">Пароль</label>
            <input type="password" placeholder="Введите пароль" name="password" id="password" required minlength="8">
            <button type="submit">Войти</button>
            <a href="register.html">Еще не зарегистрированы? Регистрация</a>
        </form>
    </div>
</div>
@endsection
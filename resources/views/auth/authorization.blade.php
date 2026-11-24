@extends('layouts.main')

@section('header-title')
Авторизация - Конференции.РФ
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
        <div class="auth-card">
                <h1>Авторизация</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="login">Логин</label>
                    <input type="text" placeholder="Введите логин" name="login" id="login" required value="{{ old('login') }}">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" placeholder="Введите пароль" name="password" id="password" required>
                </div>
                <button type="submit" class="btn-register">Войти</button>
                <div class="auth-links">
                    <a href="{{ route('register') }}">Еще не зарегистрированы? Регистрация</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
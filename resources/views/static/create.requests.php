@extends('layouts.main')

@section('header-title')
Новая заявка - Конференции.РФ
@endsection

@section('content')
<div class="header">
    <a href="requests.html" class="logo">Конференции.РФ</a>
    <nav>
        <a href="requests.html">Мои заявки</a>
        <a href="create-requests.html">Новая заявка</a>
        <a href="register.html">Выйти</a>
    </nav>
</div>

<div class="main-container">
    <h1 class="page-title">Формирование заявки</h1>
</div>
@endsection
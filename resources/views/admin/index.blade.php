@extends('layouts.main')

@section('header-title')
Панель администратора - Конференции.РФ
@endsection

@section('content')

<div class="main-container">
    <div class="main-block">
        <h1>Панель администратора</h1>

        {{-- Фильтр по статусу --}}
        <form action="{{ route('admin.applications') }}" method="GET">
            <label for="status-filter">Фильтр по статусу:</label>
            <select name="status" id="status-filter">
                <option value="">Все заявки</option>
                <option value="Новая" {{ request('status') == 'Новая' ? 'selected' : '' }}>Новая</option>
                <option value="Мероприятие назначено" {{ request('status') == 'Мероприятие назначено' ? 'selected' : '' }}>Мероприятие назначено</option>
                <option value="Завершено" {{ request('status') == 'Завершено' ? 'selected' : '' }}>Завершено</option>
            </select>
            <button type="submit">Применить</button>
        </form>

        @forelse($applications as $app)
            <div class="card">
                <h3>Заявка #{{ $app->id }}</h3>
                <p><strong>Статус:</strong> {{ $app->status }}</p>
                <p><strong>Пользователь:</strong> {{ $app->user->surname }} {{ $app->user->name }} {{ $app->user->middlename }}</p>
                <p><strong>Телефон:</strong> {{ $app->user->phone }}</p>
                <p><strong>Email:</strong> {{ $app->user->email }}</p>
                <p><strong>Помещение:</strong> {{ $app->room->title }} ({{ $app->room->type }})</p>
                <p><strong>Дата:</strong> {{ $app->date }}</p>
                <p><strong>Оплата:</strong> {{ $app->payment }}</p>

                <form action="{{ route('admin.applications.status', $app->id) }}" method="POST">
                    @csrf
                    <label for="status-{{ $app->id }}">Изменить статус:</label>
                    <select name="status" id="status-{{ $app->id }}">
                        <option value="Новая" {{ $app->status == 'Новая' ? 'selected' : '' }}>Новая</option>
                        <option value="Мероприятие назначено" {{ $app->status == 'Мероприятие назначено' ? 'selected' : '' }}>Мероприятие назначено</option>
                        <option value="Завершено" {{ $app->status == 'Завершено' ? 'selected' : '' }}>Завершено</option>
                    </select>
                    <button type="submit">Обновить</button>
                </form>
            </div>
        @empty
            <p>Заявок не найдено.</p>
        @endforelse
    </div>
</div>

@endsection
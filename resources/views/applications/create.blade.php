@extends('layouts.main')

@section('header-title')
Новая заявка - Конференции.РФ
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
        <h1>Формирование заявки</h1>
        <form action="{{ route('applications.store') }}" method="POST">
            @csrf

            <label for="room_id">Выберите помещение</label>
            <select name="room_id" id="room_id" required>
                <option value="">-- Выберите помещение --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                        {{ $room->title }} ({{ $room->type }}) - {{ $room->price }} руб.
                    </option>
                @endforeach
            </select>

            <label for="date">Дата начала конференции</label>
            <input type="date" name="date" id="date" required value="{{ old('date') }}">

            <label for="payment">Способ оплаты</label>
            <select name="payment" id="payment" required>
                <option value="">-- Выберите способ --</option>
                <option value="При очном посещении" {{ old('payment') == 'При очном посещении' ? 'selected' : '' }}>При очном посещении</option>
                <option value="Оплата по СБП" {{ old('payment') == 'Оплата по СБП' ? 'selected' : '' }}>Оплата по СБП</option>
            </select>

            <button type="submit">Отправить заявку</button>
            <a href="{{ route('applications.index') }}">Назад к списку</a>
        </form>
    </div>
</div>
@endsection
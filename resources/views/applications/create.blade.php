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
        <div class="page-header-create">
            <h1>Формирование заявки</h1>
        </div>
        
        <form action="{{ route('applications.store') }}" method="POST" class="application-form">
            @csrf

            <div class="form-group">
                <label for="room_id">Выберите помещение</label>
                <select name="room_id" id="room_id" required>
                    <option value="">-- Выберите помещение --</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" 
                            {{ old('room_id') == $room->id || (isset($selectedRoomId) && $selectedRoomId == $room->id) ? 'selected' : '' }}>
                            {{ $room->title }} ({{ $room->type }}) - {{ $room->price }} руб.
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Дата начала конференции</label>
                <input type="date" name="date" id="date" required value="{{ old('date') }}">
            </div>

            <div class="form-group">
                <label for="payment">Способ оплаты</label>
                <select name="payment" id="payment" required>
                    <option value="">-- Выберите способ --</option>
                    <option value="При очном посещении" {{ old('payment') == 'При очном посещении' ? 'selected' : '' }}>При очном посещении</option>
                    <option value="Оплата по СБП" {{ old('payment') == 'Оплата по СБП' ? 'selected' : '' }}>Оплата по СБП</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="create-btn">Отправить заявку</button>
                <a href="{{ route('catalog.index') }}" class="back-link">Назад к списку</a>
            </div>
        </form>
    </div>
</div>
@endsection
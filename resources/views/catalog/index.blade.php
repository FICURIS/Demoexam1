@extends('layouts.main')

@section('header-title')
Главная - Конференции.РФ
@endsection

@section('content')

<div class="hero-slider">
    <div class="slide slide-1">
        <img src="{{ asset('images/auditorium.jpg') }}" alt="Главная аудитория">
        <div class="slide-content">
            <h2>Проведите конференцию на высшем уровне</h2>
            <p>Аудитории, коворкинги и кинозалы в центре города.</p>
        </div>
    </div>
    
    <div class="slide slide-2">
        <img src="{{ asset('media/1643087798_5-bigfoto-name-p-id.jpg') }}" alt="Кинозал">
        <div class="slide-content">
            <h2>Современное оборудование</h2>
            <p>Проекторы, звук и комфортные места для участников.</p>
        </div>
    </div>
    
    <div class="slide slide-3">
        <img src="{{ asset('images/coworking.jpg') }}" alt="Коворкинг">
        <div class="slide-content">
            <h2>Удобная оплата</h2>
            <p>Оплачивайте при очном посещении или через СБП.</p>
        </div>
    </div>
</div>

<div class="main-container" style="margin-top: 40px;">
    <div class="main-block">
        <h1>Доступные помещения</h1>
        
        <div class="rooms-grid">
            @foreach($rooms as $room)
                <a href="{{ route('catalog.show', $room->id) }}" class="room-card">
                    <div class="room-image">
                        @if($room->image)
                            <img src="{{ asset($room->image) }}" alt="{{ $room->title }}">
                        @else
                            <div class="no-image">Нет фото</div>
                        @endif
                    </div>
                    <div class="room-info">
                        <h3>{{ $room->title }}</h3>
                        <span class="room-type">{{ $room->type }}</span>
                        <p class="room-price">от {{ $room->price }} ₽</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
@extends('layouts.main')

@section('header-title')
{{ $room->title }} - Конференции.РФ
@endsection

@section('content')

<div class="main-container">
    <div class="main-block">
        <a href="{{ route('catalog.index') }}" style="color: var(--gray); text-decoration: none; margin-bottom: 20px; display: inline-block;">&larr; Назад в каталог</a>
        
        <div class="room-detail">
            <div class="room-detail-image">
                @if($room->image)
                    <img src="{{ asset($room->image) }}" alt="{{ $room->title }}">
                @endif
            </div>
            
            <div class="room-detail-info">
                <h1>{{ $room->title }}</h1>
                <span class="room-type">{{ $room->type }}</span>
                
                <p class="room-description">{{ $room->description }}</p>
                
                <div class="price-box">
                    <span>Стоимость аренды:</span>
                    <strong>{{ $room->price }} ₽</strong>
                </div>
                
                <a href="{{ route('applications.create', ['room_id' => $room->id]) }}" class="btn btn-full">
                    Забронировать это помещение
                </a>
                <div class="room-reviews-section">
                    <h2>Отзывы о помещении</h2>
                    
                    @if($room->reviews->count() > 0)
                        <div class="reviews-list">
                            @foreach($room->reviews as $review)
                                <div class="review-item">
                                    <div class="review-header">
                                        <strong>{{ $review->user->surname }} {{ $review->user->name }}</strong>
                                        <span class="review-date">{{ $review->created_at->format('d.m.Y') }}</span>
                                    </div>
                                    <p class="review-text">{{ $review->text }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="no-reviews">Пока нет отзывов об этом помещении. Станьте первым, кто его оценит!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
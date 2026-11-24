@extends('layouts.main')

@section('header-title')
Мои заявки - Конференции.РФ
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
        <div class="page-header">
            <h1>Мои заявки</h1>
        </div>

        <div class="applications-grid">
            @forelse($applications as $app)
            <div class="card admin-card">
                <div class="card-header">
                    <h3>{{ $app->room->title }} ({{ $app->room->type }})</h3>
                    <span class="badge badge-{{ $app->status == 'Новая' ? 'new' : ($app->status == 'Завершено' ? 'done' : 'assigned') }}">
                        {{ $app->status }}
                    </span>
                </div>
                
                <div class="card-body">
                    <p><strong>Дата начала:</strong> {{ $app->date }}</p>
                    <p><strong>Способ оплаты:</strong> {{ $app->payment }}</p>
                </div>

                @if($app->status == 'Завершено')
                    <div class="card-footer">
                        @if($app->review)
                            <div class="review-block">
                                <p><strong>Ваш отзыв:</strong> {{ $app->review->text }}</p>
                            </div>
                        @else
                            <form action="{{ route('reviews.store') }}" method="POST" class="review-form">
                                @csrf
                                <input type="hidden" name="application_id" value="{{ $app->id }}">

                                <label for="text-{{ $app->id }}">Оставьте отзыв о мероприятии:</label>
                                <textarea name="text" id="text-{{ $app->id }}" rows="2" required></textarea>

                                <button type="submit" class="btn btn-outline">Отправить отзыв</button>
                            </form>
                        @endif
                    </div>
                @endif
            </div>
            @empty
            <div class="empty-state">
                <p>У вас пока нет заявок. <a href="{{ route('applications.create') }}">Создайте первую!</a></p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
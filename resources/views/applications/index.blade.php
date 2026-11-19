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
        <h1>Мои заявки</h1>
        <a href="{{ route('applications.create') }}">Создать заявку</a>

        @forelse($applications as $app)
        <div class="card">
            <h3>{{ $app->room->title }}({{ $app->room->type }})</h3>
            <p><strong>Дата начала:</strong>{{ $app->date }}</p>
            <p><strong>Способ оплаты:</strong>{{ $app->payment }}</p>
            <p><strong>Статус:</strong>{{ $app->status }}</p>

            @if($app->status == 'Завершено')
                @if($app->review)
                <div class="review-block">
                    <p><strong>Ваш отзыв:</strong>{{ $app->review->text }}</p>
                </div>
                @else
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="application_id" value="{{ $app->id }}">

                    <label for="text-{{ $app->id }}">Оставьте отзыв о мероприятии</label>
                    <textarea name="text" id="text-{{ $app->id }}" rows="2" required></textarea>

                    <button type="submit">Отправить отзыв</button>
                </form>
                @endif
            @endif
        </div>
        @empty
        <p>У вас пока нет заявок. <a href="{{ route('applications.create') }}">Создайте первую!</a></p>
        @endforelse
    </div>
</div>
@endsection
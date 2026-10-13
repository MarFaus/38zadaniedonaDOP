@extends('layouts.app')

@section('title', 'Список мероприятий')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Мероприятия</h1>
        <a href="{{ route('events.create') }}" class="btn">Создать мероприятие</a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('events.index') }}" class="flex-row">
        <input 
            type="text" 
            name="search" 
            placeholder="Поиск мероприятия по названию..." 
            value="{{ request('search') }}"
        >
        <button type="submit" class="btn">Найти</button>
    </form>

    <hr style="border: 0; border-top: 1px solid var(--border); margin: 20px 0;">

    @forelse($events as $event)
        <div class="card">
            <h2>{{ $event->name }}</h2>
            <p><strong>Дата проведения:</strong> {{ $event->event_date }}</p>
            <p><strong>Цена:</strong> {{ number_format($event->price, 2, '.', ' ') }} ₸</p>
            @if($event->description)
                <p><strong>Описание:</strong> {{ $event->description }}</p>
            @endif
        </div>
    @empty
        <p style="text-align: center; color: #64748b;">Мероприятий пока нет.</p>
    @endforelse
@endsection
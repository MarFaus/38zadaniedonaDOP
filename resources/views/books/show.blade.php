@extends('layouts.app')

@section('content')
    <h2>{{ $book->title }}</h2>
    <p><strong>Автор:</strong> {{ $book->author }}</p>
    <p><strong>Жанр:</strong> {{ $book->genre ?? 'Не указан' }}</p>
    <p><strong>Год:</strong> {{ $book->year ?? 'Не указан' }}</p>
    <p><strong>ISBN:</strong> {{ $book->isbn ?? 'Не указан' }}</p>
    <p><strong>Статус:</strong> {{ $book->available ? 'Доступна' : 'Выдана' }}</p>
    <br>
    <a href="{{ route('books.edit', $book) }}">Редактировать</a>
    <a href="{{ route('books.index') }}">Назад</a>
@endsection

@extends('layouts.app')

@section('content')
    <a href="{{ route('books.create') }}" class="btn">+ Добавить книгу</a>

    <form method="GET" action="{{ route('books.index') }}" style="margin-top: 20px;">
        <input type="text" name="search" placeholder="Поиск по названию..." value="{{ request('search') }}">
        <button type="submit" class="btn">Найти</button>
    </form>

    @if($books->count())
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Жанр</th>
                <th>Год</th>
                <th>Доступность</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre ?? '—' }}</td>
                    <td>{{ $book->year ?? '—' }}</td>
                    <td>{{ $book->available ? 'Доступна' : 'Выдана' }}</td>
                    <td>
                        <a href="{{ route('books.show', $book) }}">Просмотр</a>
                        <a href="{{ route('books.edit', $book) }}">Изменить</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Удалить книгу?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Книги пока отсутствуют.</p>
    @endif
@endsection

@extends('layouts.app')

@section('content')
    <h2>Редактирование книги</h2>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Название</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" required>

        <label>Автор</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}" required>

        <label>Жанр</label>
        <input type="text" name="genre" value="{{ old('genre', $book->genre) }}">

        <label>Год</label>
        <input type="number" name="year" value="{{ old('year', $book->year) }}">

        <label>ISBN</label>
        <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}">

        <label>
            <input type="checkbox" name="available" value="1" @checked($book->available)>
            Книга доступна
        </label>
        <br><br>
        <button type="submit" class="btn">Сохранить изменения</button>
    </form>
@endsection

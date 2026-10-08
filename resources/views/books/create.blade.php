@extends('layouts.app')

@section('content')
    <h2>Добавление книги</h2>

    @if($errors->any())
        <div>
            <strong>Ошибки:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Название книги</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label>Автор</label>
            <input type="text" name="author" value="{{ old('author') }}" required>
        </div>
        <div class="form-group">
            <label>Жанр</label>
            <input type="text" name="genre" value="{{ old('genre') }}">
        </div>
        <div class="form-group">
            <label>Год издания</label>
            <input type="number" name="year" value="{{ old('year') }}">
        </div>
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" value="{{ old('isbn') }}">
        </div>
        <div>
            <label>
                <input type="checkbox" name="available" value="1" checked>
                Книга доступна
            </label>
        </div>
        <br>
        <button type="submit" class="btn">Сохранить</button>
        <a href="{{ route('books.index') }}">Отмена</a>
    </form>
@endsection

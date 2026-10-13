<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Validation\ValidationException;

class BookService
{
    public function getAll(?string $search = null)
    {
        return Book::with('author')
            ->search($search, ['title', 'genre', 'isbn'])
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }

    public function create(array $data): Book
    {
        return Book::create($data);
    }

    public function update(Book $book, array $data): Book
    {
        $book->update($data);
        return $book;
    }

    public function delete(Book $book): void
    {
        $hasActiveBorrowings = $book->borrowings()
            ->where('status', 'borrowed')
            ->exists();

        if ($hasActiveBorrowings) {
            throw ValidationException::withMessages([
                'book' => 'Нельзя удалить книгу, которая выдана читателю.',
            ]);
        }

        $book->delete();
    }
}
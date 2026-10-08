<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $books = $query->latest()->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'nullable|string|max:100',
            'year' => 'nullable|integer|min:1000|max:2100',
            'isbn' => 'nullable|string|max:50',
        ]);

        $validated['available'] = $request->has('available');

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Книга успешно добавлена!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'nullable|string|max:100',
            'year' => 'nullable|integer|min:1000|max:2100',
            'isbn' => 'nullable|string|max:50',
        ]);

        $validated['available'] = $request->has('available');

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Книга успешно обновлена!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Книга удалена!');
    }
}
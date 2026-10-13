<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        private BookService $bookService
    ) {}

    public function index(Request $request)
    {
        $books = $this->bookService->getAll($request->input('search'));
        $authors = Author::orderBy('name')->get();
        $genres = Book::whereNotNull('genre')->where('genre', '!=', '')->distinct()->pluck('genre');

        return view('books.index', compact('books', 'authors', 'genres'));
    }

    public function create()
    {
        $authors = Author::orderBy('name')->get();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'author_id'   => 'required|exists:authors,id',
            'genre'       => 'nullable|string|max:255',
            'year'        => 'nullable|integer',
            'isbn'        => 'nullable|string|max:20',
            'quantity'    => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $this->bookService->create($data);

        return redirect()->route('books.index')->with('success', 'Книга добавлена!');
    }

    public function show(Book $book)
    {
        $book->load(['author', 'borrowings.reader']);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('name')->get();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'author_id'   => 'required|exists:authors,id',
            'genre'       => 'nullable|string|max:255',
            'year'        => 'nullable|integer',
            'isbn'        => 'nullable|string|max:20',
            'quantity'    => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $this->bookService->update($book, $data);

        return redirect()->route('books.index')->with('success', 'Книга обновлена!');
    }

    public function destroy(Book $book)
    {
        $this->bookService->delete($book);

        return redirect()->route('books.index')->with('success', 'Книга удалена!');
    }
}
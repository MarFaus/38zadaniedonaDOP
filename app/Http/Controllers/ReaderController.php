<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use App\Services\ReaderService;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function __construct(
        private ReaderService $readerService
    ) {}

    public function index(Request $request)
    {
        $readers = $this->readerService->getAll($request->input('search'));
        return view('readers.index', compact('readers'));
    }

    public function create()
    {
        return view('readers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name'  => 'required|string|max:255',
            'phone'      => 'nullable|string|max:30',
            'email'      => 'nullable|email|max:255',
            'birth_date' => 'nullable|date',
        ]);

        $this->readerService->create($data);

        return redirect()
            ->route('readers.index')
            ->with('success', 'Читатель успешно добавлен!');
    }

    public function show(Reader $reader)
    {
        $reader->load('borrowings.book');
        return view('readers.show', compact('reader'));
    }

    public function edit(Reader $reader)
    {
        return view('readers.edit', compact('reader'));
    }

    public function update(Request $request, Reader $reader)
    {
        $data = $request->validate([
            'full_name'  => 'required|string|max:255',
            'phone'      => 'nullable|string|max:30',
            'email'      => 'nullable|email|max:255',
            'birth_date' => 'nullable|date',
        ]);

        $this->readerService->update($reader, $data);

        return redirect()
            ->route('readers.index')
            ->with('success', 'Данные читателя обновлены!');
    }

    public function destroy(Reader $reader)
    {
        $this->readerService->delete($reader);

        return redirect()
            ->route('readers.index')
            ->with('success', 'Читатель удалён!');
    }
}
<?php

namespace App\Services;

use App\Models\Reader;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ReaderService
{
    /**
     * Получение всех читателей с учетом поиска и пагинацией
     */
    public function getAll(?string $search = null): LengthAwarePaginator
    {
        return Reader::search($search, ['full_name', 'phone', 'email'])
            ->withCount('borrowings')
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }

    /**
     * Создание нового читателя
     */
    public function create(array $data): Reader
    {
        return Reader::create($data);
    }

    /**
     * Обновление данных читателя
     */
    public function update(Reader $reader, array $data): Reader
    {
        $reader->update($data);
        return $reader;
    }

    /**
     * Удаление читателя
     */
    public function delete(Reader $reader): void
    {
        $reader->delete();
    }

    /**
     * Поиск читателя по email (Задание студенту)
     */
    public function findByEmail(string $email): ?Reader
    {
        return Reader::where('email', $email)->first();
    }
}
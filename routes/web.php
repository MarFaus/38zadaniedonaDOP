<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReaderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('readers', ReaderController::class);

Route::resource('borrowings', BorrowingController::class)->except(['edit', 'update']);
Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');
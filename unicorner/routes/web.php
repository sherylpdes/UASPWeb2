<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::resource('books', BookController::class);
Route::resource('reviews', ReviewController::class);
Route::post('books/{book}/beli', [BookController::class, 'beli'])->name('books.beli');
Route::post('/books/{book}/reviews', [BookController::class, 'storeReview'])->name('books.storeReview');
Route::get('/laporan', [LaporanController::class, 'generatePDF'])->name('laporan.pdf');

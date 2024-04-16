<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('welcome');
});

Route::view('book-page' , 'book-page' )->name('book-page');

Route::view('services' , 'services' )->name('services');

Route::view('contact-us' , 'contact-us' )->name('contact-us');

Route::view('about-us' , 'about-us' )->name('about-us');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

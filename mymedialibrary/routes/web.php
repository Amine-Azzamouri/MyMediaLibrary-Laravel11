<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/upload', function () {
    return view('library.dashboard-upload');
})->middleware(['auth', 'verified'])->name('upload');

Route::get('/library', [PhotoController::class, 'showLibrary'])
    ->middleware(['auth', 'verified'])
    ->name('library');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/products', [PhotoController::class, 'store'])->name('products.store');
Route::get('/dashboard-upload', function () {
    return view('library.dashboard-upload');
})->name('dashboard-upload');

Route::get('/previous.page', function () {
    return view('dashboard');
})->name('previous.page');


require __DIR__.'/auth.php';

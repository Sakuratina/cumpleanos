<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Para fotos
use App\Http\Controllers\ImageController;
Route::post('/upload-image', [ImageController::class, 'store'])->name('upload.image');
//***********

Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');

Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::patch('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');


require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('movies.index'));

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('movies/{movie}/toggle-featured', [MovieController::class, 'toggleFeatured'])
    ->middleware('auth')
    ->name('movies.toggleFeatured');
Route::resource('movies', MovieController::class)
    ->middlewareFor(
        ['create', 'store', 'edit', 'update', 'destroy'],
        'auth'
    );
Route::middleware('auth')->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::post('/admin/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])
        ->name('admin.users.toggle');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

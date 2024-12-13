<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Public access to view articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Show a specific article (also publicly accessible)
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Public registration routes
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);


// Protected routes (restricted to authenticated users)
Route::middleware('auth')->group(function () {
    
    // Protected routes for article management (creating, editing, deleting)
    Route::get('/create', [ArticleController::class, 'createNew'])->name('articles.createNew');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Homepage route (public)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (restricted to authenticated and verified users)
Route::get('/dashboard', [ArticleController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Authentication routes (login, password reset, etc.)
require __DIR__.'/auth.php';

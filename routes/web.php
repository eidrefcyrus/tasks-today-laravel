<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [TaskController::class, 'welcome'])->name('welcome');
Route::get('/about', [TaskController::class, 'about'])->name('about');
Route::get('/profile', [TaskController::class, 'profile'])->name('profile.public');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Breeze dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Task management: login required
Route::resource('tasks', TaskController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth');

// Breeze account profile: login required
Route::middleware('auth')->group(function () {
    Route::get('/account/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';